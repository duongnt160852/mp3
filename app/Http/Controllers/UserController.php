<?php

namespace App\Http\Controllers;
use App\Music;
use App\Album;
use App\Singer;
use App\Playlist;
use App\PlaylistMusic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Pagination\Paginator;
use App\User;
use Validator;

class UserController extends Controller
{

    function search($str){
        $str=changeTitle($str," ");
        $musics=Music::all();
        $music=array();
        $i=0;
        foreach ($musics as $a) {
            if($i<=2 && (strpos(changeTitle($a->name," "), $str) !== false)){
                array_push($music,$a);
                $i++;
            }
        }
        $albums=Album::all();
        $album=array();
        $i=0;
        foreach ($albums as $a) {
            if($i<=2 && strpos(changeTitle($a->name," "), $str) !== false){
                array_push($album,$a);
                $i++;
            }
        }
        $singers=Singer::all();
        $singer=array();
        $i=0;
        foreach ($singers as $a) {
            if($i<=2 && strpos(changeTitle($a->name," "), $str) !== false){
                array_push($singer,$a);
                $i++;
            }
        }
        // $x=[$music,$album,$singer];
        // echo json_encode($x);
        if(count($music)>0){
            echo "<div style='background:linear-gradient(to right, #eaeaea 0%,#fafafa 100%);height:40px;line-height:40px;padding-left:20px'>Bài hát</div>";
            echo "<div >";
            foreach ($music as $value) {
                echo "<div style='border-bottom:1px solid #b9c0c5;padding-left:20px;padding-top:10px;padding-bottom:10px'>";
                echo "<div>";
                echo "<a href='bai-hat/".$value->title."'>".$value->name."</a>";
                echo "</div>";
                echo "<div>";
                for($i=0;$i<count($value->music_singer);$i++){
                    if($i==0) {
                       echo '<a href="ca-si/'.$value->music_singer[$i]->singer->title.'" style="display:inline;font-size:0.8em" href="">'.$value->music_singer[$i]->singer->name.'</a>';
                    }
                    
                    else{
                        echo ', <a href="ca-si/'.$value->music_singer[$i]->singer->title.'" style="display:inline;font-size:0.8em" href="">'.$value->music_singer[$i]->singer->name.'</a>';
                    }
                    
                }
                 echo "</div>";   
                    
                echo "</div>";
            }
            echo "</div>";
        }
        if(count($album)>0){
            echo "<div style='background:linear-gradient(to right, #eaeaea 0%,#fafafa 100%);height:40px;line-height:40px;padding-left:20px'>Album</div>";
            
            foreach ($album as $value) {
                echo "<div style='border-bottom:1px solid #b9c0c5;padding-left:20px;padding-top:10px;padding-bottom:10px'>";
                echo "<a href='album/".$value->title."'>".$value->name."</a>";
                echo "</div>";
            }
            echo "</div>";
        }
        if(count($singer)>0){
            echo "<div style='background:linear-gradient(to right, #eaeaea 0%,#fafafa 100%);height:40px;line-height:40px;padding-left:20px'>Ca sĩ</div>";
            foreach ($singer as $value) {
                echo "<div style='border-bottom:1px solid #b9c0c5;padding-left:20px;padding-top:10px;padding-bottom:10px'>";
                echo "<a href='album/".$value->title."'>".$value->name."</a>";
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
        $musics=Music::all();
        $music=array();
        foreach ($musics as $a) {
            if((strpos(changeTitle($a->name," "), $str) !== false)){
                array_push($music,$a);
            }
        }
        $albums=Album::all();
        $album=array();
        foreach ($albums as $a) {
            if(strpos(changeTitle($a->name," "), $str) !== false){
                array_push($album,$a);
            }
        }
        $singers=Singer::all();
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
        $musics=Music::all();
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
        $albums=Album::all();
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
        $singers=Singer::all();
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
        $a="Nguyễn Tùng Dương 123456";
        $a=changeTitle($a);
        echo $a;
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
        $newAlbums=Album::getNewAlbums(24);
        $mostViewAlbums=Album::getMostViewAlbums(12);
        return view("user/listsinger",["newAlbums"=>$newAlbums,"mostViewAlbums"=>$mostViewAlbums,"user"=>$user]);
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
        $mostViewMusics=Music::getMostViewMusics();
        $playlist=Playlist::find($id);
        return view("user/playlist",["playlist"=>$playlist,"mostViewMusics"=>$mostViewMusics,"user"=>$user,"id"=>$id1]);
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
