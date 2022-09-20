<?php

namespace App\Http\Controllers\Frontuser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use DB;
class ProfileController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:fuser');
    }
    public function Profile(){
       $vp=Invoice::where('fuser_id',auth()->user()->id)->sum('vp');
       if($vp>=10 and  $vp<50){
           $package="Rising";
       }elseif($vp>49 and $vp<=179){
           $package="Basic";
       }elseif($vp>=180){
           $package="Professional";
       }else{
           $package="Inactive";
       }
        // dd($package);
     	return view('frontend.profile.profile',compact('vp','package'));
    }
}
