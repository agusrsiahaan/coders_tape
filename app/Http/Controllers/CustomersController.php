<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;
use App\Events\NewCustomerRegisteredEvent;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{

    //cara lain dalam membuat middleware auth selain di route web.php
    public function __construct()
    {
        //you can use 'except' and 'only' 
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        //$activeCustomers = Customer::where('active', 1)->get();
        //$inactiveCustomers = Customer::where('active', 0)->get();
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        $companies = Company::all();

    	$customers = Customer::with('company')->paginate(15);
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
        $this->authorize('create', Customer::class);

        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {


    	// $data = request()->validate([
    	// 	'name' => 'required|min:3',
    	// 	'email' => 'required|email',
     //        'active' => 'required|numeric',
     //        'company_id' => 'required|numeric',
     //        //'random' => '',
    	// ]);

        //dd($data);

        $customer = Customer::create($this->validateRequest());

        $this->storeImage($customer);

        event(new NewCustomerRegisteredEvent($customer));

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

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        // $data = request()->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email',
        //     'active' => 'required',
        //     'company_id' => 'required',
        // ]);

        $customer->update($this->validateRequest());

        $this->storeImage($customer);

        return redirect('customers/'. $customer->id);
    }

    public function destroy(Customer $customer)
    {   
        $this->authorize('delete', $customer);

        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest()
    {
        // return request()->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email',
        //     'active' => 'required',
        //     'company_id' => 'required',
        // ]);

        // $validatedData = request()->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email',
        //     'active' => 'required',
        //     'company_id' => 'required',
        // ]);

        // if (request()->hasFile('image')) {
        //     request()->validate([
        //         'image' => 'file|image|max:5000',
        //     ]);
        // }
        // return $validatedData;



        // return tap (request()->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email',
        //     'active' => 'required',
        //     'company_id' => 'required',
        // ]), function(){

        //     if (request()->hasFile('image')) {
        //         request()->validate([
        //             'image' => 'file|image|max:5000',
        //         ]);
        //     }
        // });

        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);
    }

    private function storeImage($customer)
    {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage/'. $customer->image))->fit(300, 300);
            $image->save();
        }
    }

}
