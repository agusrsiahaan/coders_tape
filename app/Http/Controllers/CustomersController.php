<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    public function list()
    {
    	$customers = Customer::all();
  		//$customers = [
		// 'Agus',
		// 'Ronaldo',
		// 'Siahaan',
		// 'Agus Ronaldo Siahaan',
		// ];

		return view('customers', [
			'customers' => $customers,
		]);
    }
}
