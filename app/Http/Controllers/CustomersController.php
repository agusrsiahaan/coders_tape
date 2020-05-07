<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {
    	$customers = [
		'Agus',
		'Ronaldo',
		'Siahaan',
		'Agus Ronaldo Siahaan',
		];

		return view('customers', [
			'customers' => $customers,
		]);
    }
}
