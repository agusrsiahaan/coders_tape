<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

class CustomersController extends Controller
{
    public function index()
    {
        //$activeCustomers = Customer::where('active', 1)->get();
        //$inactiveCustomers = Customer::where('active', 0)->get();
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        $companies = Company::all();

    	$customers = Customer::all();
  		//$customers = [
		// 'Agus',
		// 'Ronaldo',
		// 'Siahaan',
		// 'Agus Ronaldo Siahaan',
		// ];

		return view('customers.index', [
			'customers' => $customers,
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers,
            'companies' => $companies,
		]);
    }

    public function create()
    {
        $companies = Company::all();
        return view('customers.create', compact('companies'));
    }

    public function store()
    {
    	$data = request()->validate([
    		'name' => 'required|min:3',
    		'email' => 'required|email',
            'active' => 'required|numeric',
            'company_id' => 'required|numeric',
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

    	//return back();
        return redirect('customers');
    }

    // public function show($customer)
    // {
    //     //$customer = Customer::find($customer);
    //     $customer = Customer::where('id', $customer)->firstOrFail();
    //     return view('customers.show', compact('customer'));
    // }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }
}
