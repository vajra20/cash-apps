<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sale;
use App\Models\DetailSale;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Customer()
    {
        $sales = Sale::latest()->first();
        $detail_sale = DetailSale::where('sales_id', $sales->id)
            ->with('product')
            ->get();

        // dd($detail_sale);
        return view('page.user.payment.customer', compact('detail_sale', 'sales'));
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'telp' => 'required',
        ]);

        $customer = Customer::create([
            'name' => request('name'),
            'address' => request('address'),
            'telp' => request('telp'),
        ]);

        $sale = Sale::latest()->first();
        if ($sale) {
            $sale->update(['customers_id' => $customer->id]);
        }

        return redirect(route('payment.user'))->with('success-message', 'Data Has Been Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, string $id)
    {
        $sale = Sale::find($id);
        DetailSale::where('sales_id', $sale->id)->delete();
        $sale->customer()->delete();
        $sale->delete();

        return redirect()->back()->with('delete-message', 'Delete Success');
    }
}
