<?php

namespace App\Http\Controllers;

use File;

use App\Admin;

use App\Music;

use App\Topic;

use App\Album;

use App\Singer;

use App\Music_singer;

use App\Album_singer;

use App\Type_music;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth as Auth;

use Validator;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    function getHome(){
        $admin=Auth::guard("admin")->user();
        return view('admin/admin/home',["admin"=>$admin]);
    }

    function getAddSong(){
        return view('admin/song/add');
    }

    function getListSong(){
        $songs=Music::where("status",1)->get();
        return view('admin/song/list',["songs"=>$songs]);
    }

    function getEditSong($id){
        $song=Music::find($id);
        return view('admin/song/edit',["song"=>$song]);
    }

    function postAddSong(Request $request){
        $validator=Validator::make($request->all(), 
            [
                "singer"=>"required",
                "song"=>"required",
                "image"=>"required",
                "topic"=>"required"
            ], 
            [
                "singer.required"=>"Chưa chọn ca sĩ",
                "song.required"=>"Chưa chọn bài hát",
                "image.required"=>"Chưa chọn ảnh",
                "topic.required"=>"Chưa chọn thể loại"
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $id_song=Music::max("id")+1;
        $song= $request->song;
        $image=$request->image;
        $title=\changeTitle($request->name." ".$id_song);
        Music::addMusic($id_song,"nhaccuachungtui", $request->name, $title, 1, $request->lyric, "media/".$title.".".$song->getClientOriginalExtension(), $request->musician,
        "images/".$title.".".$image->getClientOriginalExtension(), $request->album);   
        foreach ($request->singer as $value) {
            Music_singer::musicSingerAdd($id_song, Singer::id($value));
        }   
        foreach ($request->topic as $value) {
            Type_music::musicTopicAdd($id_song, Topic::id($value));
        }      
        $song->move(base_path('public/media'),$title.".".$song->getClientOriginalExtension());
        $image->move(base_path('public/images'),$title.".".$image->getClientOriginalExtension());
        return redirect()->back()->with("thongbao","Thêm thành công");
    }

    function postEditSong(Request $request, $id){
        $song=Music::find($id);
        $validator=null;
        if($song->name!=$request->name){
            global $validator;
            $validator=Validator::make($request->all(), 
                [
                    "name"=>"unique:musics,name",
                    "singer"=>"required",
                    "topic"=>"required"
                ], 
                [
                    "name.unique"=>"Album đã tồn tại",
                    "singer.required"=>"Chưa chọn ca sĩ",
                    "topic.required"=>"Chưa chọn thể loại"
                ]);
        }
        else{
            global $validator;
            $validator=Validator::make($request->all(), 
                [
                    "singer"=>"required",
                    "topic"=>"required"
                ], 
                [
                    "singer.required"=>"Chưa chọn ca sĩ",
                    "topic.required"=>"Chưa chọn thể loại"
                ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }  
        $song->name=$request->name;
        $title=changeTitle($request->name." ".$id);
        $song->title=$title;
        foreach ($song->music_singer as $value) {
            $a=Music_singer::where("id_music",$value->id_music);
            $a->delete();
        }  
        foreach ($request->singer as $value) {
            Music_singer::musicSingerAdd($id, Singer::id($value));
        }   
        foreach ($song->music_topic as $value) {
            $a=Type_music::where("id_music",$value->id_music);
            $a->delete();
        }  
        foreach ($request->topic as $value) {
            Type_music::musicTopicAdd($id, Topic::id($value));
        }   
        if($request->image!=null){
            $image=$request->image;
            File::delete("images/".$song->image);
            $image->move(base_path('public/images'),$title.".".$image->getClientOriginalExtension());
            $song->image="images/".$title.".".$image->getClientOriginalExtension();
        }
        if($request->song!=null){
            $song1=$request->song;
            File::delete($song->link);
            $song1->move(base_path('public/media'),$title.".".$song1->getClientOriginalExtension());
            $song->link="media/".$title.".".$song1->getClientOriginalExtension();
        }
        $song->save();
        return redirect()->back()->with("thongbao","Sửa thành công");
    }

    function deleteSong($id){
        $song=Music::find($id);
        $song->status=2;
        $song->save();
        return redirect()->back()->with("thongbao","Xóa thành công");
    }

    function getApproveSong(){
        return view('admin/song/approve');
    }
    
    function getAddSinger(){
        return view('admin/singer/add');
    }

    function getListSinger(){
        $singers=Singer::where("status","=","1")->get();
        return view('admin/singer/list',["singers"=>$singers]);
    }

    function getEditSinger($id){
        $singer=Singer::find($id);
        return view('admin/singer/edit',["singer"=>$singer]);
    }

    function postAddSinger(Request $request){
        $validator=Validator::make($request->all(), 
            [
                "singer"=>"unique:singers,name",
                "image"=>"required",
            ], 
            [
                "singer.unique"=>"Ca sĩ đã tồn tại",
                "image.required"=>"Chưa chọn ảnh",
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $image=$request->image;
        $title=\changeTitle($request->singer);
        Singer::addSinger($request->singer,changeTitle($request->singer),1,"images/".$title.".".$image->getClientOriginalExtension());
        $image->move(base_path('public/images'),$title.".".$image->getClientOriginalExtension());
        return redirect()->back()->with("thongbao","Thêm thành công");
    }

    function postEditSinger(Request $request, $id){
        $singer=Singer::find($id);
        $validator=null;
        if($singer->name!=$request->name){
            global $validator;
            $validator=Validator::make($request->all(), 
                [
                    "name"=>"unique:singers,name",
                ], 
                [
                    "name.unique"=>"Album đã tồn tại",
                ]);
        }
        else{
            global $validator;
            $validator=Validator::make($request->all(), 
                [
                    "name"=>"required"
                ], 
                [
                    "name.required"=>"aaa"
                ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }  
        $singer->name=$request->name;
        $singer->title=changeTitle($request->name);
        $singer->save();
        return redirect()->back()->with("thongbao","Sửa thành công");
    }

    function deleteSinger($id){
        $singer=Singer::find($id);
        $singer->status=2;
    }
    
    function getAddAlbum(){
        return view('admin/album/add');
    }

    function getListAlbum(){
        $albums=Album::where("status","1")->get();
        return view('admin/album/list',["albums"=>$albums]);
    }

    function getEditAlbum($id){
        $album=Album::find($id);
        return view('admin/album/edit',["album"=>$album]);
    }

    function postAddAlbum(Request $request){

        $idAlbum=Album::max("id")+1;
        $validator=Validator::make($request->all(), 
            [
                "name"=>"unique:albums,name",
                "image"=>"required",
                "singer"=>"required"
            ], 
            [
                "name.unique"=>"Album đã tồn tại",
                "image.required"=>"Chưa chọn ảnh",
                "singer.required"=>"Chưa chọn ca sĩ"
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $title=changeTitle($request->name);
        $image=$request->image;
        Album::addAlbum($idAlbum, $request->name,$title,"images/album-".$title.".".$image->getClientOriginalExtension(),1);
        foreach ($request->singer as $value) {
            Album_singer::albumSingerAdd($idAlbum, Singer::id($value));
        }   
        $image->move(base_path('public/images'),"album-".$title.".".$image->getClientOriginalExtension());
        return redirect()->back()->with("thongbao","Thêm thành công");
    }

    function postEditAlbum(Request $request, $id){
        $album=Album::find($id);
        $validator=null;
        if($album->name!=$request->name){
            global $validator;
            $validator=Validator::make($request->all(), 
                [
                    "name"=>"unique:albums,name",
                    "singer"=>"required"
                ], 
                [
                    "name.unique"=>"Album đã tồn tại",
                    "singer.required"=>"Chưa chọn ca sĩ"
                ]);
        }
        else{
            global $validator;
            $validator=Validator::make($request->all(), 
                [
                    "singer"=>"required"
                ], 
                [
                    "singer.required"=>"Chưa chọn ca sĩ"
                ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }  
        $album->name=$request->name;
        $title=changeTitle($request->name);
        $album->title=$title;
        foreach ($album->album_singer as $value) {
            $a=Album_singer::where("id_album",$value->id_album);
            $a->delete();
        }  
        foreach ($request->singer as $value) {
            Album_singer::albumSingerAdd($id, Singer::id($value));
        }   
        if($request->image!=null){
            $image=$request->image;
            File::delete("images/".$album->image);
            $image->move(base_path('public/images'),"album-".$title.".".$image->getClientOriginalExtension());
            $album->image="images/album-".$title.".".$image->getClientOriginalExtension();
        }
        $album->save();
        return redirect()->back()->with("thongbao","Sửa thành công");
    }

    function deleteAlbum($id){
        $album=Album::find($id);
        $album->status=2;
        $album->save();
        return redirect()->back()->with("thongbao","Xóa thành công");
    }

    function getAddTopic(){
        return view('admin/topic/add');
    }

    function getListTopic(){
        $topics=Topic::where("status","1")->get();
        return view('admin/topic/list',["topics"=>$topics]);
    }

    function getEditTopic(Request $request){
        $id=$request->id;
        $topic=Topic::find($id);
        return view('admin/topic/edit',["topic"=>$topic]);
    }

    function postAddTopic(Request $request){
        $validator=Validator::make($request->all(), 
            [
                "name"=>"unique:topic,name",
            ], 
            [
                "name.unique"=>"Thể loại đã tồn tại",
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        Topic::addTopic($request->name);
        return redirect()->back()->with("thongbao","Thêm thành công");
    }

    function postEditTopic(Request $request, $id){
        $validator=Validator::make($request->all(), 
            [
                "topic"=>"unique:topic,name"
            ], 
            [
                "topic.unique"=>"Thể loại đã tồn tại"
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $topic=Topic::find($id);
        $topic->name=$request->topic;
        $topic->save();
        return redirect()->back()->with("thanhcong","Sửa thành công");
    }

    function deleteTopic($id){
        $topic=Topic::find($id);
        $topic->status=2;
        $topic->save();
        return redirect()->back()->with("xoa","Xóa thành công");
    }
    
    function ajaxSearch(Request $request){
        $str=$request->str;
        $arr=json_decode($request->arr);
        $singer=Singer::all();
        $result=array();
        foreach ($singer as $value) {
            if (preg_match(strtolower('/.*'.$str.'.*/'),strtolower($value->name))){
                array_push($result,$value->name);
            }
        }

        if (count($result)==0) echo "Không tìm thấy";
        else {
            $a=count($result);
            foreach ($result as $value) {
                if(array_search($value, $arr)===false) echo "<p class='result'>".$value."</p>";
                else $a--;
            }
            if($a==0) echo "Không tìm thấy";    
        }
    }

    function ajaxSearchTopic(Request $request){
        $str=$request->str;
        $arr=json_decode($request->arr);
        $topic=Topic::all();
        $result=array();
        foreach ($topic as $value) {
            if (preg_match(strtolower('/.*'.$str.'.*/'),strtolower($value->name))){
                array_push($result,$value->name);
            }
        }

        if (count($result)==0) echo "Không tìm thấy";
        else {
            $a=count($result);
            foreach ($result as $value) {
                if(array_search($value, $arr)===false) echo "<p class='resultTopic'>".$value."</p>";
                else $a--;
            }
            if($a==0) echo "Không tìm thấy";    
        }
    }

    function ajaxAlbum(Request $request){
        $album= Album::all();
        if($request->id==null){
            foreach ($album as $value) {
                echo '<option value="'.$value->id.'">'.$value->name.'</option>';
            }
        }
        else{
            foreach ($album as $value) {
                if($request->id!=$value->id) echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                else echo '<option selected value="'.$value->id.'">'.$value->name.'</option>';
            }
        }
    }

    function logout(){
        Auth::guard("admin")->logout();
        return redirect("admin/login");
    }

    function insertAdmin(){
        Admin::insert("admin","123456","admin@gmail.com","admin","1");
    }
}
