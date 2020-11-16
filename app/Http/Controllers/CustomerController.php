<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CustomerValidate;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request['search']){
            $customers = $this->search($request['search']);
        }else{
            $customers = Customer::paginate(15);
        }
        return view('index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerValidate $request)   
    {
        $customer = Customer::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'address' => $request['address'],
        ]);
        $customer->save();
        session::flash('create', 'Create Success');
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('CRUD.edit')->with('customer',$customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerValidate $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update([
            $customer->name = $request['name'],
            $customer->email = $request['email'],
            $customer->address = $request['address'],
        ]);
        $customer->save();
        session::flash('update','update success');
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        session::flash('delete','delete success');
        return redirect()->back();
    }
    public function search($search)
    {
        $search = '%'.$search.'%';
        $customers = Customer::where('name','LIKE',$search)->paginate();
        return $customers;
    }
}
