<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\DiaDanh;
use App\Models\BaiViet;
use App\Models\DeXuat;
use App\Models\HinhDiaDiem;
use App\Models\LoaiDiaDanh;
use App\Models\Mien;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

class ThongKeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baiViet = BaiViet::whereNull('deleted_at')->count("id");
        $diaDanh = DiaDanh::whereNull('deleted_at')->count("id");
        $loaiDiaDanh = LoaiDiaDanh::whereNull('deleted_at')->count("id");
        $taiKhoan = LoaiDiaDanh::whereNull('deleted_at')->count("id");
        $deXuat = DeXuat::whereNull('deleted_at')->count("id");
        $allLoai = LoaiDiaDanh::all();
        $allMien = Mien::all();
        $tkBaiViet = BaiViet::thongkebaiviettheongay();
    //    dd($tkBaiViet);
        return view('thong_ke',compact('baiViet','diaDanh','loaiDiaDanh','taiKhoan','deXuat','allLoai','allMien','tkBaiViet'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,DiaDanh $dsDiaDanh)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        //
    }


    
}
