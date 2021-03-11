<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Customer[]
     */
    public function index()
    {
        return Customer::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        return Customer::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return Customer
     */
    public function show(Customer $customer)
    {
        return $customer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return Customer
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return int
     */
    public function destroy(Customer $customer)
    {
        $id = $customer->id;
        if(Customer::destroy($customer->id))
        {
            return $id;
        }
        else
        {
            return 0;
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function search(Request $request)
    {
        if($request->ajax())
        {
            return DB::table('customers')
                ->where('name', 'like', '%'.$request->queryText.'%')
                ->orWhere('address', 'like', '%'.$request->queryText.'%')
                ->orWhere('city', 'like', '%'.$request->queryText.'%')
                ->orWhere('country', 'like', '%'.$request->queryText.'%')
                ->get();
        }
    }
}
