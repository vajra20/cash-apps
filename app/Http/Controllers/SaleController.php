<?php

namespace App\Http\Controllers;

use App\Models\DetailSale;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Exports\SaleExport;
use Maatwebsite\Excel\Facades\Excel;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $years = DB::table('sales')->min(DB::raw('YEAR(created_at)'));
        // dd($year);

        $searchTerm = $request->input('search');
        $month = $request->input('month');
        $year = $request->input('year');

        $salesQuery = Sale::with('customer', 'detailsale.product');

        // Filter by search term if provided
        if ($searchTerm) {
            $salesQuery->whereHas('customer', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
                ->orWhere('total_price', 'like', '%' . $searchTerm . '%')
                ->orWhere('created_by', 'like', '%' . $searchTerm . '%')
                ->orWhere('date_sale', 'like', '%' . $searchTerm . '%');
        }


        if ($month && $year) {
            $salesQuery->whereYear('created_at', $year)
                ->whereMonth('created_at', $month);
        }
        $sales = $salesQuery->get();
        return view('page.admin.sale', compact('sales', 'years'));
    }

    public function filterSales(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $sales = Sale::with('customer', 'detailsale.product')
            ->whereYear('date_sale', $year)
            ->whereMonth('date_sale', $month)
            ->get();

        return view('sales.index', ['sales' => $sales]);
    }

    public function paymentUser()
    {
        $sales = Sale::with('customer', 'detailSale.product')->get();
        return view('page.user.payment.payment', compact('sales'));
    }

    public function paymentDetail()
    {
        $products = Product::all();
        return view('page.user.payment.detailpayment', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function DetailStore(Request $request)
    {
        $hasOrder = false;
        foreach ($request->total_product as $order) {
            if ($order > 0) {
                $hasOrder = true;
                break;
            }
        }

        if (!$hasOrder) {
            return redirect()->back()->with('order-message', 'Add Order First!');
        }

        try {
            DB::beginTransaction();

            $total_price = 0;
            $sale = Sale::create([
                'date_sale' => Carbon::now(),
                'total_price' => $total_price,
                'customers_id' => 0,
                'created_by' => auth()->user()->name,
            ]);

            foreach ($request->total_product as $products_id => $jumlah_order) {
                if ($jumlah_order == 0) {
                    continue;
                }

                $product = Product::find($products_id);

                if ($product->stock < $jumlah_order) {
                    DB::rollback();
                    return redirect()->back()->with('stock-message', 'Stock Not Available');
                }

                $total_price += $jumlah_order * $product->price;

                Product::find($products_id)->update([
                    'stock' => $product->stock - $jumlah_order,
                ]);

                DetailSale::create([
                    'sales_id' => $sale->id,
                    'products_id' => $product->id,
                    'total_product' => $jumlah_order,
                    'subtotal' => $jumlah_order * $product->price,
                ]);
            }

            $sale->update([
                'total_price' => $total_price,
            ]);

            DB::commit();
            return redirect(route('customer.form'))->with('success-message', 'Order Success');
            dd(Sale::find($sale->id)->get(), DetailSale::where('sales_id', $sale->id)->get(), Product::where('id', $product->id)->get());
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message', $e->getMessage());
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function export()
    {
        return Excel::download(new SaleExport(), Carbon::now() . '-sales.xlsx');
    }
    public function pdf()
    {
        return Excel::download(new SaleExport(), Carbon::now() . '-sales.pdf');
    }
}
