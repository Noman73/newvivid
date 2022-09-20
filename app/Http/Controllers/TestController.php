<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fuser;
use App\Models\DCommision;
use App\Models\GCommision;
// use Artisan;
// use App\Http\Traits\GenerationCronTrait;
use App\Http\Traits\GcronTrait;
use App\Http\Traits\WalletBalanceTrait;
use App\Http\Traits\RefferalTestTrait;
use App\Http\Traits\TestTrait2;

class TestController extends Controller
{
   // use GenerationCronTrait;
   use TestTrait2,WalletBalanceTrait,RefferalTestTrait;
   public function __construct(){
      $this->middleware('auth:fuser');
   }
   public function Test(){
    //   $output = [];
    //     \Artisan::call('make:command TestCron', $output);
    //   dd($output);
    //   return $this->getRefferal();
    //   $user=Fuser::all();
    //   foreach($user as $u){
    //      $singleUser= $this->GetGeneration($u->id);
    //      foreach($singleUser as $keys=>$value){
    //       if($keys!='total'){
    //          // print_r($singleUser[$keys]);
    //          $insert=new GCommision;
    //          $insert->fuser_id=$u->id;
    //          $insert->gen=substr($keys,3);
    //          $insert->comission=floatVal($singleUser[$keys]['ammount']);
    //          $insert->generation=floatVal($singleUser[$keys]['count']);
    //          $insert->save();
    //      }
            
    //      }
    //   }
    //   return 'ok';
      // return $this->WalletBalance();
      // return strtotime(date('d-m-Y'));
    //   return $this->GetGeneration(359);
    return false;
   }

   public function getRefferal(){
              


      $user=Fuser::all();
      foreach($user as $u){
            $commision=new DCommision;
            $commision->ammount=floatval($this->GetRefarralIncome($u->id)['current'][0]->total);
            $commision->user_id=$u->id;
            $commision->date=strtotime(date("d-m-Y 00:00:00"));
            $commision->author_id=auth()->user()->id;
            $commision->save();  
      }
      return 'ok';
   }
}
