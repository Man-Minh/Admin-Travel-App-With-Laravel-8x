<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\DeXuat;
use App\Models\LoaiDiaDanh;
use App\Models\User;
use App\Models\Mien;
use App\Models\PhanVung;
use App\Models\DiaDanh;
use App\Models\HinhDiaDiem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL; // Man create
use Illuminate\Http\File;

class DeXuatController extends Controller
{
    protected function fixImage(DeXuat $img) 
    {
        if(Storage::disk('public')->exists($img->img)) {
            $img->img = Storage::url($img->img);
        }
        else {
            $img->img =  $img->img;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsDeXuat = DeXuat::searchdexuat()->paginate(8);
        return view('de_xuat', compact('dsDeXuat'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $deXuat = DeXuat::where('id',$id)->first();
 
        $this->fixImage($deXuat);
        
        $dsLoaiDiaDanh = LoaiDiaDanh::all();
        $dsMien = Mien::all();
        $dsPhanVung = PhanVung::all();
        return view('qldexuat.them_de_xuat',compact('deXuat','dsLoaiDiaDanh','dsMien','dsPhanVung'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $DeXuat = DeXuat::where('id',$id)->first(); // Lấy cái đề xuất của người ta 
        $str = $DeXuat->img;
        $subPath = explode('/', $str); // Nó sẽ cắt những chổ / ra arr;
        $Path = $subPath[4].'/'.$subPath[5].'/'.$subPath[6]; 
        $newPath = str_replace('de_xuats/','',$Path); // Thay thế de_xuát thành rổng


        Storage::move('public/'.$Path, 'public/'.$newPath);// di chuyển tệp mà người ta đề xuất lên 
        // Storage::move('public/hinh_dia_diems/de_xuats/1.png', 'public/hinh_dia_diems/1.png');    

        // chua rang buoc !   
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

        $id = DiaDanh::all()->last(); // Lấy cái id địa danh mình đã save để lưu cho đúng hình

         
        $hinhDiaDanh = new HinhDiaDiem; // Trước khi thêm hình ảnh của ad bổ sung thì xử lý cái ta đề xuất
            $hinhDiaDanh->fill([
                'img'=>  $newPath,
                'dia_danh_id'=> $id->id,
                'diem_luu_tru_id' =>  $id->id,
            ]);
            $hinhDiaDanh->save();

        if($request->hasFile('images')){ // Lưu hình ảnh nếu mà ta upload thêm (Nếu có - sẽ ràng buộc sau)
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
       }   
        DeXuat::find($id)->delete();    
        return redirect()->route('admin.diadanh')->with('notification','Đã duyệt thành công');
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
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        DeXuat::find($id)->delete();
        return redirect()->route('admin.dexuat')->with('notification','Đã xóa');
    }
  
  
}
