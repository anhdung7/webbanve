<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hoadon;
use DB;

class APIController extends Controller
{
    //
    public function infohoadon()
    {
    	$dshoadon=DB::select('select * from hoadons');
    	$apihoadon=array();
    	foreach ($dshoadon as $key => $value) {
    		$apihoadon[$value->id]=array("id" =>$value->id,"phone" =>$value->phone,"thanhtien" =>$value->thanhtien,"tinhtrang" =>$value->tinhtrang,"create_at" =>$value->created_at);
    	}
    	$jsonhoadon=json_encode($apihoadon);
    	return View('apitest.apihd')->with('jsonhoadon',$jsonhoadon);
    }

    public function loginGG()
    {

    }

    public function logoutGG()
    {
    	
    }
}
