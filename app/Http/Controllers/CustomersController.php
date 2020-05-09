<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    public function list()
    {
        //$activeCustomers = Customer::where('active', 1)->get();
        //$inactiveCustomers = Customer::where('active', 0)->get();
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        
    	$customers = Customer::all();
  		//$customers = [
		// 'Agus',
		// 'Ronaldo',
		// 'Siahaan',
		// 'Agus Ronaldo Siahaan',
		// ];

		return view('customers', [
			'customers' => $customers,
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers,
		]);
    }

    public function store()
    {
    	$data = request()->validate([
    		'name' => 'required|min:3',
    		'email' => 'required|email',
            'active' => 'required|numeric',
            //'random' => '',
    	]);

        //dd($data);

        $customer = Customer::create($data);
    	//dd(request('name'));
    	// $customer = new Customer();
    	// $customer->name = request('name');
    	// $customer->email = request('email');
     //    $customer->active = request('active');
    	// $customer->save();

    	return back();
    }
}
