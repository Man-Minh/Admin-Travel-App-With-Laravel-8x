<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\DiaDanh;
use App\Models\Mien;
use App\Models\PhanVung;
use App\Models\LoaiDiaDanh;
use App\Models\HinhDiaDiem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL; // Man create
use Illuminate\Http\File;
use Illuminate\Pagination\Paginator;

class DiaDanhController extends Controller
{

    protected function fixImage(HinhDiaDiem $imgDiaDanh) 
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
        $dsDiaDanh = DiaDanh::searchdiadanh()->paginate(8);
        return view('dia_danh', ['dsDiaDanh'=>$dsDiaDanh]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dsLoaiDiaDanh = LoaiDiaDanh::orderBy('ten_Loai','ASC')->select('id','ten_Loai')->get();
        $dsMien =  Mien::all();
        $dsPhanVung = PhanVung::all();
        return view('qlDiaDanh.them_dia_danh', compact('dsLoaiDiaDanh','dsMien', 'dsPhanVung'));
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
            'loai_dia_danh_id.required' => 'Loại địa danh bắt buộc nhập',
            'loai_dia_danh_id.min' => 'Tối thiểu 4 ký tự',
            'loai_dia_danh_id.max' => 'Tối đa 20 ký tự',
            'phan_vung_id.required' =>  'Vùng bắt buộc nhập',
            'mien_id.required' =>  'Miền bắt buộc nhập',
            'ten_dia_danh.required' =>  'Tên địa danh bắt buộc nhập',
            'mo_Ta.required' =>  'Mô tả địa danh bắt buộc nhập',
            'kinh_Do.required' =>  'Kinh độ địa danh bắt buộc nhập',
            'vi_Do.required' =>  'Vĩ độ địa danh bắt buộc nhập',
            'images.required' => 'Hình ảnh địa danh phải có'
         ];

        $data = $request->validate([
            'loai_dia_danh_id'=>'required|min:4|max:20',
            'phan_vung_id'=>'required',
            'mien_id' => 'required',
            'ten_dia_danh'=>'required',
            'mo_Ta'=>'required',
            'kinh_Do'=>'required',
            'vi_Do'=>'required',
            'images' => 'required',
        ], $messages);

       $diaDanh = new DiaDanh;
       $diaDanh->fill([
        'loai_dia_danh_id' =>$request->input('loai_dia_danh_id'),
        'mien_id' => $request->input('mien_id'),
        'phan_vung_id' => $request->input('phan_vung_id'),
        'ten_dia_danh' => $request->input('ten_dia_danh'),
        'ten_Goi_Khac' => $request->input('ten_Goi_Khac'),
        'mo_Ta' => $request->input('mo_Ta'),
        'kinh_Do' => $request->input('kinh_Do'),
        'vi_Do' => $request->input('vi_Do')
       ]);

       $diaDanh->save();

       $id = DiaDanh::all()->last();

       $image = array();
       if($files = $request->file('images')){
           foreach ($files as $file) {
               $image_url = $file->store('hinh_dia_diems','public');
            // $file->move($upload_path, $image_full_name);
               $hinhDiaDanh = new HinhDiaDiem;
            //    $image[] = $image_url;
            $hinhDiaDanh->fill([
                'img'=> $image_url,
                'dia_danh_id'=> $id->id,
                'diem_luu_tru_id' =>  $id->id,
            ]);
            $hinhDiaDanh->save();
           }
       }

       

        return redirect()->route('admin.diadanh')->with('notification','Thêm thành công');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chiTiet = DiaDanh::where('id', $id)->first();
        $hinhAnh = $chiTiet->thongTinHinh;
        foreach($hinhAnh as $anh)
        {
            $this->fixImage($anh);
        }
        // dd($hinhAnh);
        // dd($chiTiet);
        return view('chi_tiet_dia_danh', compact('chiTiet','hinhAnh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dsDiaDanh = DiaDanh::where('id',$id)->first();
        $dsMien =  Mien::all();
        $dsPhanVung = PhanVung::all();
        $dsLoaiDiaDanh = LoaiDiaDanh::all();
        return view('qlDiaDanh.cap_nhat_dia_danh', compact('dsDiaDanh','dsMien', 'dsPhanVung', 'dsLoaiDiaDanh') );
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
        // $diaDanh = DiaDanh::where('id',$id)->get();
        $dsDiaDanh->fill([
            'loai_dia_danh_id' =>$request->input('loai_dia_danh_id'),
            'mien_id' => $request->input('mien_id'),
            'phan_vung_id' => $request->input('phan_vung_id'),
            'ten_dia_danh' => $request->input('ten_dia_danh'),
            'ten_Goi_Khac' => $request->input('ten_Goi_Khac'),
            'mo_Ta' => $request->input('mo_Ta'),
            'kinh_Do' => $request->input('kinh_Do'),
            'vi_Do' => $request->input('vi_Do')
           ]);
        $dsDiaDanh->save();
        return redirect()->route('admin.diadanh')->with('notification','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        DiaDanh::find($id)->delete();
        return redirect()->route('admin.diadanh')->with('notification','Đã xóa');
    }

    public function getHinhDiaDanh($id)
    {
        $dsHinh = HinhDiaDiem::where('dia_danh_id',$id)->get();
        foreach ($dsHinh as $hinh) {
            $this->fixImage($hinh);
        }
        return view('hinh_dia_danh',['dsHinh'=>$dsHinh]);
    }
    
}
