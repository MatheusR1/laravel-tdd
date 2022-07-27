<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoregroupRequest;
use App\Http\Requests\UpdategroupRequest;
use App\Models\group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoregroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoregroupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdategroupRequest  $request
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdategroupRequest $request, group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(group $group)
    {
        //
    }
}
