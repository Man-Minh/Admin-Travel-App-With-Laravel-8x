<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\BaiViet;
use App\Models\HinhBaiViets;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL; // Man create
use Illuminate\Http\File;

class BaiVietController extends Controller
{
    protected function fixImage( $imgDiaDanh) 
    {
        if(Storage::disk('public')->exists($imgDiaDanh->img)) {
            $imgDiaDanh->img = Storage::url($imgDiaDanh->img);
        }
        else {
            $imgDiaDanh->img = '/images/no_img.jpg';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($dsBaiViet = BaiViet::searchbaiviet() != null)
        {
            $dsBaiViet = BaiViet::searchbaiviet()->paginate(8);
        }
        if(!$key = request()->key)
        {
            $dsBaiViet = BaiViet::paginate(8);
        }
    
        return view('bai_viet',['dsBaiViet'=>$dsBaiViet]);
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
    public function store(Request $request, $id)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chiTietBaiViet = BaiViet::where('id',$id)->first();
        $fullData = $chiTietBaiViet->thongTinHinhAnh; // danh sach hinh dua tuong ung ds bai viet
        // dd($fullData);
        $this->fixImage($fullData[0]);
      
        return view('chi_tiet_bai_viet',['chiTiet'=>$chiTietBaiViet,'hinhAnh'=>$fullData]);
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
    public function update(Request $request, $id)
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
        BaiViet::find($id)->delete();
        return redirect()->route('admin.baiviet')->with('notification','Đã xóa');
    }

    public function UnblockAndBlock($id, int $status)
    {
        $baiViet =  BaiViet::where('id',$id)->first();
        $baiViet->fill([
            'status' => $status
        ]);
        $baiViet->save();
        return redirect()->route('admin.baiviet')->with('notification','Đã xử lý');
    }
   
}
