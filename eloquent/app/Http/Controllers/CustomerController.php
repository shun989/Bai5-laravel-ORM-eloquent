<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
//        $customers = DB::table('customers')->get()->where('country', 'USA');
//        $customers = DB::table('customers')->skip(9)->take(10)->get();
//        $customers = Customer::all()->take(10);
//        return view('customers.list', compact('customers'));

//        $data = Customer::all()->take(10);
        $data = Customer::paginate(10);
        return  view('customers.list', ['customers'=>$data]);

//        $user = DB::table('customers')->where('country', 'USA')->first();
//        $user = DB::table('customers')->where('country', 'USA')->value('postalCode');
//        $user = DB::table('customers')->where('country', 'USA')->pluck('postalCode');
//        $user = DB::table('customers')->pluck('postalCode', 'country');
//        $user = DB::table('customers')->count();
//        $user = DB::table('customers')->max('creditLimit');
//        $user = DB::table('customers')->where('country', 'USA')->avg('creditLimit');
//        $user = DB::table('customers')->where('country', 'USA')->sum('creditLimit');
//        $user = DB::table('customers')->select('country', 'customerName as country_customerName')->get();
//        $user = DB::table('customers')->distinct()->get();

//        $user = DB::table('customers')->select(DB::raw('count(*) as customer_count, country'))
//        ->where('country', '<>', 1)
//        ->groupBy('country')
//        ->get();
//
//        dd($user);

    }

    public function createCustomerForm()
    {
        return view('customers.create');
    }

    public function createCustomer(Request $request)
    {
        $customer = new Customer();
//        $customer->customerNumber=$request->number;
        $customer->customerName=$request->name;
        $customer->contactLastName=$request->lastname;
        $customer->contactFirstName=$request->firstname;
        $customer->phone=$request->phone;
        $customer->addressLine1=$request->address;
        $customer->city=$request->city;
        $customer->country=$request->country;
        $customer->save();
        return redirect()->route('customers.list');
    }
}
