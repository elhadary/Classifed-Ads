<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Category;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class showAdsController extends Controller
{

  public function index()
  {
    return redirect(route('index'));
  }

  public function show($id)
  {
    $ad = Ads::findOrFail($id);

    return view('front.ads.show', compact(['ad']));
  }

  public function ads(int $page = 1)
  {

    $ads = Ads::query()
      ->select('id', 'title', 'price', 'updated_at', 'sub_category_id', 'city_id','image_path')
      ->with([
        'category' => function ($query) {
          $query->select('id', 'name', 'category_id')->with('category');
        },
        'city' => function ($query) {
          $query->select('id', 'name', 'state_id')->with('state');
        }
      ])
      ->where('is_approved','=',1)->where('is_active','=',1)
      ->latest("updated_at")
      ->paginate(9, '*');
    if ($ads->lastPage() < $ads->currentPage()) {
      return redirect()->action([profileAdsController::class, 'ads'], ['page' => 1]);
    }

    return view('front.ads.index', compact(['ads']));
  }

  public function mainCategoryAds($id, Request $request)
  {
    $categories = Category::all();

    $ads = Category::findOrFail($id)->ads() ->where('is_approved','=',1)->where('is_active','=',1)->latest('updated_at')->with([
      'category' => function($query) {
        $query->select()->with('category');
      },
      'city' => function($query) {
        $query->select()->with('state');
      }
    ])->paginate(9);

    if ($ads->lastPage() < $ads->currentPage()) {
      return redirect()->action([profileAdsController::class, 'ads'], ['page' => 1]);
    }

    return view('front.ads.index', compact(['categories', 'ads']));
  }

  public function subCategoryAds($id, int $page = 1)
  {
    $categories = Category::all();
    $ads = Ads::query()
      ->with([
        'category',
        'city' => function ($query) {
          $query->select('id', 'name', 'state_id')->with('state');
        }
      ])
      ->where('is_approved','=',1)->where('is_active','=',1)
      ->where('sub_category_id', $id)
      ->latest('updated_at')
      ->paginate(9, '*');
    if ($ads->lastPage() < $ads->currentPage()) {
      return redirect()->action([profileAdsController::class, 'ads'], ['page' => 1]);
    }

    return view('front.ads.index', compact(['categories', 'ads']));
  }

  public function stateAds($id)
  {
    $categories = Category::all();
    $ads = State::findOrFail($id)->ads() ->where('is_approved','=',1)->where('is_active','=',1)->latest('updated_at')->with([
      'category' => function($query) {
      $query->select()->with('category');
      },
      'city' => function($query) {
        $query->select()->with('state');
      }
      ])->paginate(9);

    if ($ads->lastPage() < $ads->currentPage()) {
      return redirect()->action([profileAdsController::class, 'ads'], ['page' => 1]);
    }

    return view('front.ads.index', compact(['categories', 'ads']));
  }

  public function cityAds($id)
  {
    $categories = Category::all();

    $ads = City::findOrFail($id)->ads()->where('is_approved','=',1)->where('is_active','=',1)->latest('updated_at')->with([
      'category' => function($query) {
        $query->select()->with('category');
      },
      'city' => function($query) {
        $query->select()->with('state');
      }
    ])->paginate(9);

    if ($ads->lastPage() < $ads->currentPage()) {
      return redirect()->action([profileAdsController::class, 'ads'], ['page' => 1]);
    }

    return view('front.ads.index', compact(['categories', 'ads']));
  }


}
