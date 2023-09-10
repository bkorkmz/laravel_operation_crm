<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCutomersRequest;
use App\Http\Requests\UpdateCutomersRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCutomersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $cutomers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $cutomers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCutomersRequest $request, Customer $cutomers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $cutomers)
    {
        //
    }
}
