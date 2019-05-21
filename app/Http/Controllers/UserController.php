<?php

namespace App\Http\Controllers;
use App\Music;
use App\Album;
use App\Singer;
use App\Playlist;
use App\PlaylistMusic;
use App\Music_singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Pagination\Paginator;
use App\User;
use Validator;

class UserController extends Controller
{
    function getSinger($title){
        $singer=Singer::where([["title",$title],["status",1]])->get()->first();
        if (Auth::check()) $user=User::find(Auth::user()->id);
        else $user=null;
        return view("user/singer",["singer"=>$singer,"user"=>$user]);
    }

    function postUpload(Request $request){
        $validator=Validator::make($request->all(), 
            [
                "singer"=>"required",
                "song"=>"required",
                "image"=>"required"
            ], 
            [
                "singer.required"=>"Chưa chọn ca sĩ",
                "song.required"=>"Chưa chọn bài hát",
                "image.required"=>"Chưa chọn ảnh"
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $song1= $request->song;
        $image=$request->image;
        if($image->getClientOriginalExtension()!="jpg" && $image->getClientOriginalExtension()!="png")
            return redirect()->back()->with("errimage","Ảnh không đúng định dạng");
        if($song1->getClientOriginalExtension()!="mp3" && $song1->getClientOriginalExtension()!="ogg" && $song1->getClientOriginalExtension()!="wav")
            return redirect()->back()->with("errsong","Bài hát không đúng định dạng"); 
        $user=User::find(Auth::user()->id);
        $id_song=Music::max("id")+1;
        $song= $request->song;
        $image=$request->image;
        $title=\changeTitle($request->name." ".$id_song);
        Music::addMusic($id_song,$user->username, $request->name, $title, 2, $request->lyric, "media/".$title.".".$song->getClientOriginalExtension(), $request->musician,
        "images/".$title.".".$image->getClientOriginalExtension(), $request->album);   
        foreach ($request->singer as $value) {
            Music_singer::musicSingerAdd($id_song, Singer::id($value));
        }   
        $song->move(base_path('public/media'),$title.".".$song->getClientOriginalExtension());
        $image->move(base_path('public/images'),$title.".".$image->getClientOriginalExtension());
        return redirect()->back()->with("thongbao","Thêm thành công");
    }

    function getUpload(){
        if (Auth::check()) {
            $user=User::find(Auth::user()->id);
            $id=$user->id;
        }
        else {
            $user=null;
            $id=null;
        }
        return view("user/upload",["user"=>$user,"id"=>$id]);
    }

    function search($str){
        $str=changeTitle($str," ");
        $musics=Music::where("status","1")->get();
        $music=array();
        $i=0;
        foreach ($musics as $a) {
            if($i<=2 && (strpos(changeTitle($a->name," "), $str) !== false)){
                array_push($music,$a);
                $i++;
            }
        }
        $albums=Album::where("status","1")->get();
        $album=array();
        $i=0;
        foreach ($albums as $a) {
            if($i<=2 && strpos(changeTitle($a->name," "), $str) !== false){
                array_push($album,$a);
                $i++;
            }
        }
        $singers=Singer::where("status","1")->get();
        $singer=array();
        $i=0;
        foreach ($singers as $a) {
            if($i<=2 && strpos(changeTitle($a->name," "), $str) !== false){
                array_push($singer,$a);
                $i++;
            }
        }
        if(count($music)>0){
            echo "<div style='background:linear-gradient(to right, #eaeaea 0%,#fafafa 100%);height:40px;line-height:40px;padding-left:20px'>Bài hát</div>";
            echo "<div >";
            foreach ($music as $value) {
                echo "<div style='height:60px;border-bottom:1px solid #b9c0c5;padding-left:20px;padding-top:10px;padding-bottom:10px'>";
                echo "<div>";
                echo "<a href='bai-hat/".$value->title."'>".$value->name."</a>";
                echo "</div>";
                echo "<div>";
                for($i=0;$i<count($value->music_singer);$i++){
                    if($i==0) {
                       echo '<a href="nghe-si/'.$value->music_singer[$i]->singer->title.'" style="display:inline;font-size:0.8em" href="">'.$value->music_singer[$i]->singer->name.'</a>';
                    }
                    
                    else{
                        echo ', <a href="nghe-si/'.$value->music_singer[$i]->singer->title.'" style="display:inline;font-size:0.8em" href="">'.$value->music_singer[$i]->singer->name.'</a>';
                    }
                    
                }
                 echo "</div>";   
                    
                echo "</div>";
            }
            echo "</div>";
        }
        if(count($album)>0){
            echo "<div style='background:linear-gradient(to right, #eaeaea 0%,#fafafa 100%);height:40px;line-height:40px;padding-left:20px'>Album</div>";
            echo "<div >";
            foreach ($album as $value) {
                echo "<div style='height:60px;border-bottom:1px solid #b9c0c5;padding-left:20px;padding-top:10px;padding-bottom:10px'>";
                echo "<div>";
                echo "<a href='album/".$value->title."'>".$value->name."</a>";
                echo "</div>";
                echo "<div>";
                for($i=0;$i<count($value->album_singer);$i++){
                    if($i==0) {
                       echo '<a href="nghe-si/'.$value->album_singer[$i]->singer->title.'" style="display:inline;font-size:0.8em" href="">'.$value->album_singer[$i]->singer->name.'</a>';
                    }
                    
                    else{
                        echo ', <a href="nghe-si/'.$value->album_singer[$i]->singer->title.'" style="display:inline;font-size:0.8em" href="">'.$value->album_singer[$i]->singer->name.'</a>';
                    }
                    
                }
                 echo "</div>";   
                    
                echo "</div>";
            }
            echo "</div>";
        }
        if(count($singer)>0){
            echo "<div style='background:linear-gradient(to right, #eaeaea 0%,#fafafa 100%);height:40px;line-height:40px;padding-left:20px'>Ca sĩ</div>";
            foreach ($singer as $value) {
                echo "<div style='display:flex;border-bottom:1px solid #b9c0c5;padding-left:20px;padding-top:2px;padding-bottom:2px'>";
                echo "<a href='nghe-si/".$value->title."'><img src='".$value->image."' height='50px'></a>";
                echo "<a href='nghe-si/".$value->title."'>".$value->name."</a>";
                echo "</div>";
            }
            echo "</div>";
        }
    }

    function getSearch($str){
        if (Auth::check()) {
            $user=User::find(Auth::user()->id);
            $id=$user->id;
        }
        else {
            $user=null;
            $id=null;
        }
        $newMusics=Music::getNewMusics(); 
        $mostViewMusics=Music::getMostViewMusics();
        $newAlbums=Album::getNewAlbums();
        $mostViewAlbums=Album::getMostViewAlbums();
        $str1=$str;
        $str=changeTitle($str," ");
        $musics=Music::where("status","1")->get();
        $music=array();
        foreach ($musics as $a) {
            if((strpos(changeTitle($a->name," "), $str) !== false)){
                array_push($music,$a);
            }
        }
        $albums=Album::where("status","1")->get();
        $album=array();
        foreach ($albums as $a) {
            if(strpos(changeTitle($a->name," "), $str) !== false){
                array_push($album,$a);
            }
        }
        $singers=Singer::where("status","1")->get();
        $singer=array();
        foreach ($singers as $a) {
            if(strpos(changeTitle($a->name," "), $str) !== false){
                array_push($singer,$a);
            }
        }
        return view("user/search",["music"=>$music,"singer"=>$singer,"album"=>$album,"user"=>$user,'newMusics'=>$newMusics,'mostViewMusics'=>$mostViewMusics,'newAlbums'=>$newAlbums,'mostViewAlbums'=>$mostViewAlbums,"str"=>$str1,"id"=>$id]);
    }

    function searchSong($str){
        if (Auth::check()) {
            $user=User::find(Auth::user()->id);
            $id=$user->id;
        }
        else {
            $user=null;
            $id=null;
        }
        $newMusics=Music::getNewMusics(); 
        $mostViewMusics=Music::getMostViewMusics();
        $newAlbums=Album::getNewAlbums();
        $mostViewAlbums=Album::getMostViewAlbums();
        $str1=$str;
        $str=changeTitle($str," ");
        $musics=Music::where("status","1")->get();
        $music=array();
        foreach ($musics as $a) {
            if((strpos(changeTitle($a->name," "), $str) !== false)){
                array_push($music,$a);
            }
        }
        usort($music, function($a, $b) {
            return $b->views - $a->views;
        });
        return view("user/searchSong",["music"=>$music,"user"=>$user,'newMusics'=>$newMusics,'mostViewMusics'=>$mostViewMusics,'newAlbums'=>$newAlbums,'mostViewAlbums'=>$mostViewAlbums,"str"=>$str1,"id"=>$id]);
    }

    function searchAlbum($str){
        if (Auth::check()) {
            $user=User::find(Auth::user()->id);
            $id=$user->id;
        }
        else {
            $user=null;
            $id=null;
        }
        $newMusics=Music::getNewMusics(); 
        $mostViewMusics=Music::getMostViewMusics();
        $newAlbums=Album::getNewAlbums();
        $mostViewAlbums=Album::getMostViewAlbums();
        $str1=$str;
        $str=changeTitle($str," ");
        $albums=Album::where("status","1")->get();
        $album=array();
        foreach ($albums as $a) {
            if(strpos(changeTitle($a->name," "), $str) !== false){
                array_push($album,$a);
            }
        }
        usort($album, function($a, $b) {
            return $b->views - $a->views;
        });
        return view("user/searchAlbum",["album"=>$album,"user"=>$user,'newMusics'=>$newMusics,'mostViewMusics'=>$mostViewMusics,'newAlbums'=>$newAlbums,'mostViewAlbums'=>$mostViewAlbums,"str"=>$str1,"id"=>$id]);
    }

    function searchSinger($str){
        if (Auth::check()) {
            $user=User::find(Auth::user()->id);
            $id=$user->id;
        }
        else {
            $user=null;
            $id=null;
        }
        $newMusics=Music::getNewMusics(); 
        $mostViewMusics=Music::getMostViewMusics();
        $newAlbums=Album::getNewAlbums();
        $mostViewAlbums=Album::getMostViewAlbums();
        $str1=$str;
        $str=changeTitle($str," ");
        $singers=Singer::where("status","1")->get();
        $singer=array();
        foreach ($singers as $a) {
            if(strpos(changeTitle($a->name," "), $str) !== false){
                array_push($singer,$a);
            }
        }
        return view("user/searchSinger",["singer"=>$singer,"user"=>$user,'newMusics'=>$newMusics,'mostViewMusics'=>$mostViewMusics,'newAlbums'=>$newAlbums,'mostViewAlbums'=>$mostViewAlbums,"str"=>$str1,"id"=>$id]);
    }

    function postSearch(Request $request){
        $str=$request->search;
        return redirect("search/".$str);
    }

    function update($name){
            $user=User::find(Auth::user()->id);
            $user->name=$name;
            $user->save();
            echo $name;
    }

    function change(){
        dd(Music::getRandomMusic(10));
    }

    function getHome(){
        if (Auth::check()) $user=User::find(Auth::user()->id);
        else $user=null;
        $newMusics=Music::getNewMusics(); 
        $mostViewMusics=Music::getMostViewMusics();
        $newAlbums=Album::getNewAlbums();
        $mostViewAlbums=Album::getMostViewAlbums();
        return view('user/index',['newMusics'=>$newMusics,'mostViewMusics'=>$mostViewMusics,'newAlbums'=>$newAlbums,'mostViewAlbums'=>$mostViewAlbums,"user"=>$user]);
    }

    

    function insertUser(){
        User::insert("nhaccuachungtui","123456","nhaccuachungtui@gmail.com","Nhạc của chúng tôi");
        echo "Insert succesfully!";
    }

    function listSinger(){
         if (Auth::check()) $user=User::find(Auth::user()->id);
        else $user=null;
        $singers=Singer::where("status","1")->get();
        return view("user/listsinger",["singers"=>$singers,"user"=>$user]);
    }

    function getPlaylist(){
        if (Auth::check()) $user=User::find(Auth::user()->id);
        else $user=null;
        return view("user/listPlaylist",["user"=>$user]);
    }

    function changePass(Request $request){
        $validator=Validator::make($request->all(), 
            [
                "currentpass"=>"required",
                "password"=>"required|confirmed",
                "password_confirmation"=>"required"
            ],  
            [
                "currentpass.required"=>"Chưa nhập mật khẩu hiện tại",
                "password.required"=>"Chưa nhập mật khẩu",
                "password.confirmed"=>"Mật khẩu không trùng khớp",
                "password_confirmation.required"=>"Chưa nhập xác nhận mật khẩu"
            ]);
        $user=User::find(Auth::user()->id);
        if ($validator->fails()) {
            return response()->json([
                    'error' => true,
                    'message' => $validator->errors()
                ], 200);
        }
        else if(!Auth::attempt(["username"=>$user->username, "password"=>$request->currentpass])){
             return response()->json([
                    'error' => true,
                    'message' => "loi"
                ], 200);
        }
        $user->password=bcrypt($request->password);
        $user->save();
        return response()->json([
                'error' => false,
                'message' => 'success'
            ], 200);
    }

    function playlist($id){
        if (Auth::check()) {
            $user=User::find(Auth::user()->id);
            $id1=$user->id;
        }
        else {
            $user=null;
            $id1=null;
        }
        $randomMusics=Music::getRandomMusic(10);
        $playlist=Playlist::find($id);
        return view("user/playlist",["playlist"=>$playlist,"mostViewMusics"=>$randomMusics,"user"=>$user,"id"=>$id1]);
    }
    function getAlbum($id){
        $music=Music::find($id);
        $a=array();
        for($i=0;$i<count($music->music_singer);$i++){
            array_push($a,$music->music_singer[$i]->singer->name);
        }
        $music->singer=$a;
        echo json_encode($music);
    }

    function getSongPlaylist($id){
        $music=Music::find($id);
        $a=array();
        for($i=0;$i<count($music->music_singer);$i++){
            array_push($a,$music->music_singer[$i]->singer->name);
        }
        $music->singer=$a;
        echo json_encode($music);
    }

    function ajaxPlaylist($id, $song){
        $playlistsong=PlaylistMusic::where([["id_playlist",$id],["id_music",$song]])->get()->first();
        if ($playlistsong==null){
            PlaylistMusic::add($id,$song);
            echo "1";
        }
        else echo "Đã tồn tại bài hát này trong playlist";
    }

    function ajaxCreatePLaylist($playlist, $song){
        $user=User::find(Auth::user()->id);
        $a=Playlist::where([["name",$playlist],["id_user",$user->id]])->get()->first();
        if($a==null){
            Playlist::add($playlist,$user->id);
            $id=Playlist::where("name",$playlist)->get()->first()->id;
            PlaylistMusic::add($id,$song);
        }
        else{
            echo "1";
        }
    }

    function ajaxGetPlaylist($id){
        $user=User::find($id);
        echo json_encode($user->playlist);
    }
}
