<?php

namespace App\Http\Controllers\back\ads;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Category;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $categories = Category::all();
    $states = State::all();
    return view('back.ads.index', compact(['categories', 'states']));
  }

  public function active()
  {
    $categories = Category::all();
    $states = State::all();
    return view('back.ads.active', compact(['categories', 'states']));
  }

  public function inactive()
  {
    $categories = Category::all();
    $states = State::all();
    return view('back.ads.inactive', compact(['categories', 'states']));
  }

  public function underReview()
  {
    $categories = Category::all();
    $states = State::all();
    return view('back.ads.underReview', compact(['categories', 'states']));
  }

  public function approve(Request $request)
  {
    $ad = Ads::findOrFail($request->id);
    if (!empty($ad)) {
      $ad->is_approved = 1;
      $ad->is_active = 1;
      $ad->expire_at = time() + 604800;
      $ad->save();
    }

  }


  public function update(Request $request)
  {

    $ad = Ads::where('id', $request->all('id'))->first();
    if (empty($ad)) {
      $response['status'] = 0;
      $response['error'] = 0;
      return $response;
    }
    $validator = Validator::make($request->post(), [
      'title' => 'required|string|min:3|max:255',
      'main_category_id' => 'required|integer',
      'sub_category_id' => 'required|integer',
      'state_id' => 'required|integer',
      'city_id' => 'required|integer',
      'price' => 'required|numeric|max:99999999',
      'description' => 'required|string|min:5|max:1000',
    ], [], [
      'title' => 'العنوان',
      'sub_category_id' => 'التصنيف الفرعي',
      'price' => 'السعر',
      'description' => 'الوصف',
      'main_category_id' => 'التصنيف الرئيسي',
      'state_id' => 'المحافظة',
      'city_id' => 'المدينة'
    ]);
    if ($validator->fails()) {
      return response()->json(['error' => 1, 'errors' => $validator->errors()]);
    }

    if ($ad->update($validator->validated())) {
      $response['status'] = 1;
      $response['error'] = 0;
    }
    return $response;

  }


  public function destroy(Request $request)
  {
    $ad = Ads::find($request->post('id'));
    if ($ad->delete()) {
      $response['success'] = 1;
      $response['msg'] = 'تم الحذف بنجاح';
    } else {
      $response['success'] = 0;
      $response['msg'] = 'لا يوجد إعلان بهذا الرقم.';
    }
    return response()->json($response);

  }


}
