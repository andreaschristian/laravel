<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\mainmenu;
use App\boxoffice;
use DB;
use helper;
use Redirect;
class boxofficecontroller extends Controller
{
  public function show(){
    $boxoffice = DB::table('boxoffices')->orderBy('id', 'desc')->get();
    $mainmenu = mainmenu::all();
    $tvseries = DB::table('tvseries')->get();
    return view('welcome',compact('boxoffice','mainmenu','tvseries'));
  }

}
