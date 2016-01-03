<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;

class mastercontroller extends Controller
{
    public function home(){
      return view('master');
    }
    public function index(){
        return view ('master');
    }
    public function boxoffice(){
       $boxoffice = DB::table('boxoffices')->get();
     return view('boxoffice',compact ('boxoffice'));
    }
    public function saverecord(){
     $post = Input::all();
     $data = array(
        'nama_film' =>$post['namafilm'],
        'link_download_film' =>$post['linkdownloadfilm'],
        'kualitas' =>$post['kualitas']
     );
     $check = DB::table('boxoffices')->insert($data);
      if($check > 0){
       return 0;
      } else{
       return 1;
      }
    }
   public function updaterecord(){
    $post = Input::all();
    $data = array(
       'nama_film' =>$post['namafilm'],
       'link_download_film' =>$post['linkdownloadfilm'],
       'kualitas' =>$post['kualitas']
    );
    $check = DB::table('boxoffices')->where('id',$post['id'])->update($data);
    if($check > 0)
    {
      return 0;

    }
    else
    {
      return 1;
   }
  }
  public function display()
  {
    $display = "";
    $data = DB::table('boxoffices')->get();
    foreach($data as $key ){
    $display .="
                <tr>
                      <td>$key->id</td>
                      <td>$key->nama_film</td>
                      <td>$key->link_download_film</td>
                      <td>$key->kualitas</td>
                      <td>$key->gambar</td>
                      <td>
                        <a data-id='$key->id' href='#' class='edit' >Edit</a>  | <a data-id='$key->id' href='#' class='delete' > Delete</a>
                        </td>
                  </tr>";
    }
        return $display;
  }

  public function edit()
  {
    $postedit = Input::all();
    $id       = $postedit['id'];
    $data = DB::table('boxoffices')->where('id',$id)->first();

    header("Content-type: text/x-json");
    echo json_encode($data);
    exit();
  }
  public function delete()
  {
    $postedit = Input::all();
    $id       = $postedit['id'];
    $data     = DB::table('boxoffices')->where('id',$id)->delete();
    if($data>0){
      return 0;
    }else{
      return 1;
    }
    exit();
  }
}
