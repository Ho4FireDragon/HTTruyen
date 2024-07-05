<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chuong;
use App\Models\User;
use App\Models\Binhluan;

class BinhluanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Binhluan::orderBy('id', 'DESC')->get();
        return view('admincp.binhluan.index')->with(compact('comment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::orderBy('id', 'DESC')->get();
        $chuong = Chuong::orderBy('id', 'DESC')->get();
        return view('pages.chuong')->with(compact('user', 'chuong'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'noidung' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'chuong_id' => 'required|exists:chuong,id',
        ], [
            'noidung.required' => 'Vui lòng nhập nội dung bình luận',
            'user_id.exists' => 'Người dùng không tồn tại',
            'chuong_id.exists' => 'Chương không tồn tại',
        ]);
    
        $binhluan = new Binhluan;
        $binhluan->noidung = $data['noidung'];
        $binhluan->user_id = $data['user_id'];
        $binhluan->chuong_id = $data['chuong_id'];
        $binhluan->save();
    
        return redirect()->back()->with('status', 'Thêm bình luận thành công');
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
        $data = $request->validate([
            'noidung' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'chuong_id' => 'required|exists:chuong,id',
        ], [
            'noidung.required' => 'Vui lòng nhập nội dung bình luận',
            'user_id.exists' => 'Người dùng không tồn tại',
            'chuong_id.exists' => 'Chương không tồn tại',
        ]);
    
        $binhluan = Binhluan::find($id);
        $binhluan->noidung = $data['noidung'];
        $binhluan->user_id = $data['user_id'];
        $binhluan->chuong_id = $data['chuong_id'];
        $binhluan->save();
    
        return redirect()->back()->with('status', 'Cập nhật bình luận thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Binhluan::find($id)->delete();
        return redirect()->back()->with('status','Xóa bình luận thành công');
    }
}
