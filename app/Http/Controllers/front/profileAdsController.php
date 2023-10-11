<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Category;
use App\Models\City;
use App\Models\State;
use App\Models\SubCategory;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic;

class profileAdsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

  }


  public function index()
  {
    $user = Auth::user();
    $allAds = Ads::where('user_id', '=', $user->id)->with([
      'category' => function ($query) {
        $query->select()->with('category');
      },
      'city' => function ($query) {
        $query->select()->with('state');
      }
    ])->latest();
    $ads = $allAds->paginate(12);
    $count = $allAds->count();
    $active = 'ads.index';
    return view('front.profile.ads.index',compact(['user','ads','count','active']));

  }

  public function create()
  {
    $user = Auth::user();
    $categories = Category::all();
    $cities = City::all();
    $states = State::all();
    $allAds = Ads::where('user_id', '=', $user->id);
    $count = $allAds->count();
    $active = 'ads.create';
    return view('front.profile.ads.create', compact(['user', 'categories', 'cities','count','active','states']));
  }



  public function store(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'title' => 'required|string|min:3|max:255',
      'main_category' => 'required|integer',
      'sub_category' => 'required|integer',
      'state' => 'required',
      'city' => 'required',
      'price' => 'required|numeric|max:2147483646',
      'description' => 'required|string|min:5|max:500',
      'image' => 'nullable|image|max:20480' // 20MB
    ], [], [
      'title' => 'العنوان',
      'sub_category' => 'التصنيف الفرعي',
      'price' => 'السعر',
      'description' => 'الوصف',
      'main_category' => 'التصنيف الرئيسي',
      'state' => 'المحافظة',
      'city' => 'المدينة'
    ]);

    if ($validator->fails()) {
     return response()->json(['status' => 0, 'errors' => $validator->errors()]);
    }

    $validated = $validator->validated();
    if (isset($validated['image'])) {

      $image = $request->file('image');
      $imageName = rand(1, 99999) . time() . '.' . $request->image->extension();
      $filepath = public_path('/public');
      $img = ImageManagerStatic::make($image->path())->orientate();
      $canvas = ImageManagerStatic::canvas(380, 270);
      $img->resize(380, 270, function ($const) {
        $const->aspectRatio();
      });
      $canvas->insert($img, 'center');
      $canvas->save($filepath . '/ads/' . $imageName);

      $data['image_path'] = 'public/ads/' . $imageName;
    }
    /// If user manipulated these values (of nonexistent city or sub category) then stop script and don't give him any response
    $sub = SubCategory::findOrFail($validated['sub_category']);
    $city = City::findOrFail($validated['city']);

    $data['title'] = $validated['title'];
    $data['sub_category_id'] = $validated['sub_category'];
    $data['city_id'] = $validated['city'];
    $data['price'] = $validated['price'];
    $data['description'] = $validated['description'];
    $data['is_negotiable'] = 1;
    $data['user_id'] = Auth::id();

    if(Ads::create($data)){
      $response['status'] = 1;
    }else {
      $response['status'] = 0;
    }
    return response()->json(['status' => $response['status']]);
  }

  public function getSubCategories(Request $request)
  {
    $id = $request->cat_id;
    $subCategories = Category::where('id',$id)->with('subCategories')->get();
    return response()->json([
      'subcategories' => $subCategories
    ]);
  }

  public function getCities(Request $request)
  {
    $id = $request->state_id;
    $cities = State::where('id',$id)->with('cities')->get();
    return response()->json([
      'cities' => $cities
    ]);
  }

  public function edit($id)
  {
    //
  }


  public function update(Request $request, $id)
  {
    //
  }


  public function destroy($id)
  {

    $ad = Ads::findOrFail($id);

    if(!empty($ad))
    {
      $ad->delete();
      return \redirect()->back();
    }
  }

  public function show()
  {

  }
}
