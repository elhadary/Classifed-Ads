<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\City;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nafezly\Payments\Classes\KashierPayment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
      $categories = Category::withCount('ads')->with([
        'subCategories' => function($query) {
          $query->select()->withCount('ads');
        }
      ])->get();
      $cities = City::withCount('ads')->get();
      return view('welcome',compact(['categories','cities']));
    }

    public function test()
    {

      $payment = new KashierPayment();
      $response = $payment
        ->setAmount(100)
        ->setSource('card')
        ->pay();
      dd($response['html']);
        return ;
    }

}
