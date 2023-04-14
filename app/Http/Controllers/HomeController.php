<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Month;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function add_user_index()
    {
        return view('adduser');
    }
    public function add_user(Request $request)
    {
        dd($request->all());
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'password' => 'required',
            ],
            [
                'name.required'  => 'The name field is required.',
                'phone.required'  => 'The phone field is required.',
                'password.required'  => 'The password field is required.',
            ]
        );
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role_id' => '2',
        ]);
        if ($user != null)
            return response()->json(['success' => true, 'message' => 'User created successfully']);
        else
            return response()->json(['success' => false, 'message' => 'Error in creating new user']);
    }
    public function rentals_index()
    {
        $months = Month::all();
        $invoices = Invoice::all();
        return view('rentalsindex',compact('months','invoices'));
    }
    public function add_rental(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'unit_price' => 'required',
                'number' => 'required',
                'loan' => 'required',
                'month' => 'required',
            ],
            [
                'name.required'  => 'The name field is required.',
                'unit_price.required'  => 'The unit price field is required.',
                'number.required'  => 'The number field is required.',
                'loan.required'  => 'The loan field is required.',
                'month.required'  => 'The month field is required.',
            ]
        );
        $rental = Invoice::create([
            'name' => $request->name,
            'unit_price' => $request->unit_price,
            'number' =>$request->number,
            'loan' => $request->loan,
            'month' =>$request->month,
        ]);
        if ($rental != null){
            return response()->json([
                'success' => true,
                'message' => 'Invoice created successfully',
                'data' =>$rental
            ]);
        }else{
            return response()->json(['success' => false, 'message' => 'Error in creating new invoice']);
        }
    }
    public function get_invice($id)
    {
        $invoice = Invoice::find($id);
        return response()->json([
            'data'=>$invoice
        ]);
    }
    public function expenses_index()
    {
        $months = Month::all();
        $invoices = Invoice::all();
        return view('expenses',compact('months','invoices'));
    }
}
