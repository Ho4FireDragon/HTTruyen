<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheloaiTruyen;

class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloaitruyen = TheloaiTruyen::orderBy('id','DESC')->get();
        return view('admincp.theloaitruyen.index')->with(compact('theloaitruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.theloaitruyen.create');
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
                'tentheloai' => 'required|unique:theloai|max:255',
                'slug_theloai' => 'required|unique:theloai|max:255',
                'kichhoat' => 'required',
            ],
            [
                'tentheloai.required' => 'Vui lòng nhập tên thể loại',
                'tentheloai.unique' => 'Tên thể loại đã tồn tại vui lòng điền tên khác',
                'slug_theloai.required' => 'Vui lòng nhập slug thể loại',
                'slug_theloai.unique' => 'Slug thể loại đã tồn tại vui lòng điền slug khác',
            ]
        );
        // $data = $request->all();
        $theloaitruyen = new TheloaiTruyen();
        $theloaitruyen->tentheloai = $data['tentheloai'];
        $theloaitruyen->slug_theloai = $data['slug_theloai'];
        $theloaitruyen->kichhoat = $data['kichhoat'];
        $theloaitruyen->save();
        return redirect()->back()->with('status','Thêm thể loại thành công');
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
        $theloai = TheloaiTruyen::find($id);
        return view('admincp.theloaitruyen.edit')->with(compact('theloai'));
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
                'tentheloai' => 'required|max:255',
                'slug_theloai' => 'required|max:255',
                'kichhoat' => 'required',
            ],
            [
                'tentheloai.required' => 'Vui lòng nhập tên thể loại',
                'slug_theloai.required' => 'Vui lòng nhập slug thể loại',
            ]
        );
        // $data = $request->all();
        $theloaitruyen = TheloaiTruyen::find($id);
        $theloaitruyen->tentheloai = $data['tentheloai'];
        $theloaitruyen->slug_theloai = $data['slug_theloai'];
        $theloaitruyen->kichhoat = $data['kichhoat'];
        $theloaitruyen->save();
        return redirect()->back()->with('status','Cập nhật thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TheloaiTruyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa thể loại thành công');
    }
    public function timkiem(Request $request){
        $tukhoa = $request->input('tukhoa', ''); 
        $theloaitruyen = TheloaiTruyen::orderBy('id','DESC')->get();
        if ($tukhoa !== '') {
            $theloaitruyen = TheloaiTruyen::where('tentheloai', 'LIKE', '%'.$tukhoa.'%')->get();
        }
        return view('admincp.theloaitruyen.index')->with(compact('theloaitruyen','tukhoa'));
    }
}
