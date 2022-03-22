<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\LoaiDiaDanh;


class NhuCauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsNhuCau = LoaiDiaDanh::searchloaidiadanh()->paginate(6);
        return view('nhu_cau', ['dsNhuCau'=> $dsNhuCau]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qlnhucau.them_nhu_cau');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'ten_Loai.required' => 'Loại địa danh bắt buộc nhập',
            'ten_Loai.min' => 'Tối thiểu 4 ký tự',
            'ten_Loai.max' => 'Tối đa 20 ký tự'
            ];

        $data = $request->validate([
            'ten_Loai'=>'required|min:4|max:20'
        ],$messages);

       $nhuCau = new LoaiDiaDanh;

       $nhuCau->fill([
        'ten_Loai' =>$request->input('ten_Loai'),
        'status'=>1
       ]);

       $nhuCau->save();
        return redirect()->route('admin.nhucau')->with('notification','Thêm thành công');
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
        $nhuCau = LoaiDiaDanh::where('id',$id)->get();
        return view('qlnhucau.sua_nhu_cau',['nhuCau'=>$nhuCau]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LoaiDiaDanh $nhuCau)
    {
        $messages = [
            'ten_Loai.required' => 'Loại địa danh bắt buộc nhập',
            'ten_Loai.min' => 'Tối thiểu 3 ký tự',
            'ten_Loai.max' => 'Tối đa 40 ký tự'
            ];

        $data = $request->validate([
            'ten_Loai'=>'required|min:3|max:40'
        ],$messages);

        // $diaDanh = DiaDanh::where('id',$id)->get();
        $nhuCau->fill([
            'ten_Loai' =>$request->input('ten_Loai'),
            'status' => 1,
           ]);
        $nhuCau->save();
        return redirect()->route('admin.nhucau')->with('notification','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        LoaiDiaDanh::find($id)->delete();
        return redirect()->route('admin.nhucau')->with('notification','Đã xóa');
    }
    
}
