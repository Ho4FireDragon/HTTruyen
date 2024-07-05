<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheloaiTruyen;
use App\Models\Truyen;
class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_truyen = Truyen::with('theloaitruyen')->orderBy('id', 'DESC')->paginate(3);
        return view('admincp.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = TheloaiTruyen::orderBy('id', 'DESC')->get();
        return view('admincp.truyen.create')->with(compact('theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tentruyen' => 'required|unique:truyen|max:255',
                'slug_truyen' => 'required|unique:truyen|max:255',
                'tacgia' => 'required',
                'slug_tacgia' => 'required',
                'tukhoa' => 'required',
                'tomtat' => 'required',
                'theloai' => 'required',
                'kichhoat' => 'required',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            ],
            [
                'tentruyen.required' => 'Vui lòng nhập tên truyện',
                'tacgia.required' => 'Vui lòng nhập tên tác giả',
                'tukhoa.required' => 'Vui lòng nhập từ khóa tìm kiếm',
                'tacgia.required' => 'Vui lòng nhập tên tác giả',
                'tentruyen.unique' => 'Tên truyện đã tồn tại vui lòng điền tên khác',
                'slug_truyen.required' => 'Vui lòng nhập slug truyện',
                'slug_truyen.unique' => 'Slug truyện đã tồn tại vui lòng điền slug khác',
                'tomtat.required' => 'Vui lòng nhập tóm tắt truyện',
                'hinhanh.required' => 'Vui lòng thêm hình ảnh',
                'hinhanh.image' => 'File tải lên không phải là hình ảnh',
                'hinhanh.mimes' => 'Chỉ chấp nhận file hình ảnh định dạng: jpg, png, jpeg, gif, svg',
                'hinhanh.dimensions' => 'Kích thước hình ảnh không hợp lệ',
            ]
        );
        // $data = $request->all();
        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->slug_tacgia = $data['slug_tacgia'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->tukhoa = $data['tukhoa'];
        $truyen->luotxem = 0;
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move(public_path($path), $new_image);
        $truyen->hinhanh = $new_image;
        $truyen->save();
        return redirect()->back()->with('status','Thêm truyện thành công');
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
        $truyen = Truyen::find($id);
        $theloai = TheloaiTruyen::orderBy('id','DESC')->get();
        return view('admincp.truyen.edit')->with(compact('truyen', 'theloai'));
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
        $data = $request->validate(
            [
                'tentruyen' => 'required|max:255',
                'slug_truyen' => 'required|max:255',
                'tacgia' => 'required',
                'slug_tacgia' => 'required',
                'tomtat' => 'required',
                'theloai' => 'required',
                'kichhoat' => 'required',
                'tukhoa' => 'required',
            ],
            [
                'tentruyen.required' => 'Vui lòng nhập tên truyện',
                'tacgia.required' => 'Vui lòng nhập tên tác giả',
                'tukhoa.required' => 'Vui lòng nhập từ khóa tìm kiếm',
                'slug_truyen.required' => 'Vui lòng nhập slug truyện',
                'tomtat.required' => 'Vui lòng nhập tóm tắt truyện',
                'hinhanh.image' => 'File tải lên không phải là hình ảnh',
                'hinhanh.mimes' => 'Chỉ chấp nhận file hình ảnh định dạng: jpg, png, jpeg, gif, svg',
                'hinhanh.dimensions' => 'Kích thước hình ảnh không hợp lệ',
            ]
        );
        $truyen = Truyen::find($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->slug_tacgia = $data['slug_tacgia'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->tukhoa = $data['tukhoa'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->tomtat = $data['tomtat'];
        $get_image = $request->hinhanh;
        if($get_image){
            $path = 'public/uploads/truyen/'.$truyen->hinhanh;
            if(file_exists($path)){
                unlink($path);
            }
            $path = 'public/uploads/truyen/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(public_path($path), $new_image);
            $truyen->hinhanh = $new_image;
        }
        $truyen->save();
        return redirect()->back()->with('status','Cập nhật truyện thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = Truyen::find($id);
        $path = 'public/uploads/truyen/'.$truyen->hinhanh;
        if(file_exists($path)){
            unlink($path);
        }
        Truyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa truyện thành công');
    }
    public function timkiem(Request $request){
        $theloai = TheloaiTruyen::orderBy('id','DESC')->get();
        $list_truyen = Truyen::with('theloaitruyen')->orderBy('id', 'DESC')->paginate(4);
        $tukhoa = $request->input('tukhoa', ''); 
        if ($tukhoa !== '') {
            $list_truyen = Truyen::with('theloaitruyen')->where('tentruyen', 'LIKE', '%' .$tukhoa. '%')->orWhere('tomtat', 'LIKE', '%' .$tukhoa. '%')->orWhere('tacgia', 'LIKE', '%' .$tukhoa. '%')->paginate(4);
        }
        return view('admincp.truyen.index')->with(compact('theloai','list_truyen','tukhoa'));
    }
}
