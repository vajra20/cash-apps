<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Sale;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            if (Auth::user()->role == 'Admin') {
                return redirect(route('admin'));
            } elseif (Auth::user()->role == 'User') {
                return redirect(route('user'));
            }
        } else {
            return redirect()->back()->with('error-message', 'Invalid Email or Password ');
        }
    }

    public function store(Request $request)
    {
        $users = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:dns|unique:users,email',
            'role' => 'required',
            'password' => 'required|min:3',
        ]);

        $users['password'] = Hash::make($users['password']);
        $users['role'] = 'User';

        User::create($users);
        // User::create([
        //     'name' => $request('name'),
        //     'email' => $request('email'),
        //     'role' => $request('role'),
        //     'password' => $request('password'),
        // ]);

        return redirect(route('register'))->with('success-message', "Register Success");
    }

    public function update(Request $request, string $id)
    {
        $sales = User::findorfail($id);
        $sales->update($request->all());

        return redirect('admin')->with('success-message', 'Update Success');
    }

    public function delete(string $id)
    {
        $sales = User::find($id);
        $sales->delete();

        return redirect('admin')->with('delete-message', 'Delete Success');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function admin(Request $request)
    {
        $years = DB::table('sales')->min(DB::raw('YEAR(date_sale)'));
        $month = $request->input('month');
        $year = $request->input('year');

        $users = User::all();
        $sales = Sale::all();

        if ($month && $year) {
            $filteredSales = $sales->filter(function ($sale) use ($year, $month) {
                // Assuming date_sale is a proper date attribute in your Sale model
                $dateSale = Carbon::parse($sale->date_sale);

                // dd($dateSale);
                return $dateSale->year == $year && $dateSale->month == $month;
            });
            $grossProfit = $filteredSales->sum(function ($sale) {
                // Assuming you have cost_price and total_price columns in your Sale model
                return $sale->total_price;
            });
        } else {
            $grossProfit = $sales->sum(function ($sale) {
                // Assuming you have cost_price and total_price columns in your Sale model
                return $sale->total_price;
            });
        }




        return view('page.admin.dashboard', compact('users', 'years', 'grossProfit'));
    }

    public function user()
    {
        return view('page.user.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
