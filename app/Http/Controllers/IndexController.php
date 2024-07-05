<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheloaiTruyen;
use App\Models\Truyen;
use App\Models\User;
use App\Models\Binhluan;
use App\Models\Chuong;
use App\Models\Info;
use Storage;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // tim kiem nang cao
    public function timkiem_ajax(Request $request){
        $data = $request->all();
        if($data['keywords']){
            $truyen = Truyen::where('kichhoat',0)->where('tentruyen','LIKE','%'.$data['keywords'].'%')->get();
            $output = '<ul class="dropdown-menu" style="display:block;padding: 10px">';
            foreach($truyen as $key => $tr){
                $output .= '<li class="li_search_ajax" style="margin-top: 10px; margin-bottom: 10px"><a href="'.url('xem-truyen/'.$tr->slug_truyen).'" style="color: #000; text-transform: uppercase">'.$tr->tentruyen.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
    
    public function home() {
        $theloai = TheloaiTruyen::orderBy('id','DESC')->get();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat', 0)->paginate(6);
        $truyen_hay = Truyen::orderBy('luotxem', 'DESC')->where('kichhoat', 0)->take(10)->get();
        return view('pages.home')->with(compact('theloai', 'truyen', 'truyen_hay'));
    }
    public function theloai($slug) {
        $theloai = TheloaiTruyen::orderBy('id','DESC')->get();
        $theloai_id = TheloaiTruyen::where('slug_theloai', $slug)->first();
        $tentheloai = $theloai_id->tentheloai;
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat', 0)->where('theloai_id', $theloai_id->id)->get();
        return view('pages.theloai')->with(compact('theloai', 'truyen', 'tentheloai'));
    }
    public function xemtruyen($slug) {
        $theloai = TheloaiTruyen::orderBy('id','DESC')->get();
        $truyen = Truyen::with('theloaitruyen')->where('slug_truyen', $slug)->where('kichhoat', 0)->first();
        $truyen->luotxem++;
        $truyen->save();
        $chuong = Chuong::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->get();
        $truyen_hay = Truyen::orderBy('luotxem', 'DESC')->where('kichhoat', 0)->take(3)->get();
        $chuong_dau = Chuong::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->first();
        $chuong_moi = Chuong::with('truyen')->orderBy('id', 'DESC')->where('truyen_id', $truyen->id)->first();
        $cungtheloai = Truyen::with('theloaitruyen')->where('theloai_id',$truyen->theloaitruyen->id)->whereNotIn('id',[$truyen->id])->paginate(5);
        $lastReadChapterSlug = isset($_COOKIE['lastReadChapter']) ? $_COOKIE['lastReadChapter'] : null;
        if ($lastReadChapterSlug) {
          $lastReadChapter = Chuong::with('truyen')->where('slug_chuong', $lastReadChapterSlug)->where('truyen_id', $truyen->id)->first();
          if ($lastReadChapter) {
            return redirect()->to('xem-chuong/'.$lastReadChapterSlug);
          }
        }
        return view('pages.truyen')->with(compact('theloai', 'truyen', 'chuong', 'cungtheloai', 'chuong_dau', 'truyen_hay', 'chuong_moi'));
    }
    public function xemchuong($slug){
        $theloai = TheloaiTruyen::orderBy('id','DESC')->get();
        $truyen = Chuong::where('slug_chuong',$slug)->first();
        $user = User::orderBy('id', 'DESC')->get();
        $comment = Binhluan::with('user', 'chuong')->orderBy('id', 'ASC')->where('chuong_id', $truyen->id)->get();
        $chuong = Chuong::with('truyen')->where('slug_chuong', $slug)->where('truyen_id', $truyen->truyen_id)->first();
        $all_chuong = Chuong::with('truyen')->orderBy('id','ASC')->where('truyen_id', $truyen->truyen_id)->get();
        $next_chuong = Chuong::where('truyen_id',$truyen->truyen_id)->where('id','>',$chuong->id)->min('slug_chuong');
        $prev_chuong = Chuong::where('truyen_id',$truyen->truyen_id)->where('id','<',$chuong->id)->max('slug_chuong');
        $max_id = Chuong::where('truyen_id',$truyen->truyen_id)->orderBy('id', 'DESC')->first();
        $min_id = Chuong::where('truyen_id',$truyen->truyen_id)->orderBy('id', 'ASC')->first();
        $truyen_bread = Truyen::with('theloaitruyen')->where('id', $truyen->truyen_id)->first();
        $lastReadChapterSlug = $slug;
        setcookie('lastReadChapter', $lastReadChapterSlug, time() + (86400 * 30), "/"); // set the cookie to expire in 30 days
        return view('pages.chuong')->with(compact('theloai', 'chuong', 'all_chuong', 'next_chuong', 'prev_chuong', 'max_id','min_id','truyen_bread', 'comment'));
    }
    //tim kiem
    public function timkiem(Request $request){
        $data = $request->all();
        $theloai = TheloaiTruyen::orderBy('id','DESC')->get();
        $tukhoa = $data['tukhoa'];
        $truyen = Truyen::with('theloaitruyen')->where('tentruyen', 'LIKE', '%' .$tukhoa. '%')->orWhere('tomtat', 'LIKE', '%' .$tukhoa. '%')->orWhere('tacgia', 'LIKE', '%' .$tukhoa. '%')->get();
        return view('pages.timkiem')->with(compact('theloai','truyen','tukhoa'));
    }
    //tag
    public function tag($tag){
        $theloai = TheloaiTruyen::orderBy('id','DESC')->get();
        $tags = explode("-", $tag);
        $truyen = Truyen::where(
            function ($query) use($tags) {
                for ($i = 0; $i < count($tags); $i++) {
                    $query->orwhere('tukhoa', 'LIKE', '%'. $tags[$i] .'%');
                }
            }
        )->paginate(10);
        return view('pages.tag')->with(compact('theloai','truyen','tag'));
    }
 
}
