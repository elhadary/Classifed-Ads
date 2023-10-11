<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Ads;

class AdminController extends Controller
{
    public function index()
    {
      $allAds = Ads::count();
      $activeAds = Ads::where('is_active','=',1)->where('is_approved','=',1)->count();
      $inactiveAds = Ads::where('is_active','=',0)->where('is_approved','=',1)->count();
      $pendingAds = Ads::where('is_active','=',0)->where('is_approved','=',0)->count();
      return view('back.dashboard',compact(['allAds','activeAds','inactiveAds','pendingAds']));
    }
}
