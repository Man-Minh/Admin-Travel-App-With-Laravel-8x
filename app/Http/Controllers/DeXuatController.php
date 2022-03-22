<?php

namespace App\Http\Controllers;

use App\Models\DeXuat;
use Illuminate\Http\Request; // Man update 07/01/2022 :12:20:46 | su dung de nhan request tu client 
use Illuminate\Support\Facades\Auth; // Man update 07/01/2022 :12:20:46 
use App\Http\Requests\StoreDeXuatRequest;
use App\Http\Requests\UpdateDeXuatRequest;
use App\Http\Controllers\Controller; // Man update 07/01/2022 :12:20:46 
use Illuminate\Support\Facades\Storage; // Man create
use Illuminate\Http\File; // man create

class DeXuatController extends Controller
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
     * @param  \App\Http\Requests\StoreDeXuatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {                                          // Path luu trong file system
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function edit(DeXuat $deXuat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeXuatRequest  $request
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeXuatRequest $request, DeXuat $deXuat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeXuat $deXuat)
    {
        //
    }

    
    public function duyetDeXuat($id)
    {
        //
    }

}
