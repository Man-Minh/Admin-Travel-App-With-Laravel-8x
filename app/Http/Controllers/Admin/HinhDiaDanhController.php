<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\HinhDiaDiem;
use App\Models\DiaDanh;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL; // Man create
use Illuminate\Http\File;

class HinhDiaDanhController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'images'=>'required'
        ]);

        $image = array();
       if($files = $request->file('images')){
           foreach ($files as $file) {
               $image_url = $file->store('hinh_dia_diems/','public');
            // $file->move($upload_path, $image_full_name);
               $hinhDiaDanh = new HinhDiaDiem;
            //    $image[] = $image_url;
            $hinhDiaDanh->fill([
                'img'=> $image_url,
                'dia_danh_id'=> $id,
                'diem_luu_tru_id' =>  $id,
            ]);
            $hinhDiaDanh->save();
           }
       }

       return redirect()->route('admin.hinhdiadanh',['id'=>$id])->with('notification','Thêm thành công');
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
        // fix xoa file !!! chua co fix nhe
        $hinh = HinhDiaDiem::where('id',$id)->get();

        Storage::disk('public')->delete('hinh_dia_diems/{{$hinh->img}}');
      
        HinhDiaDiem::find($id)->delete();
        return redirect()->route('admin.hinhdiadanh',['id'=>$hinh[0]->dia_danh_id])->with('notification','Đã xóa');
    }
}
