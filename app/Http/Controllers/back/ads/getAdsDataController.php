<?php

namespace App\Http\Controllers\back\ads;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class getAdsDataController extends Controller
{
  public function getActiveAds()
  {
    $data = Ads::with([
      'city',
      'category' => function ($query) {
        $query->with([
          'category'
        ]);
      }
    ])->where('is_approved', '=', 1)->where('is_active', '=', 1);
    $ads = DataTables::eloquent($data)->addIndexColumn()
      ->addColumn('action', function ($row) {
        return " <div class='btn-icon-list btn-list'>
                                       <a class='btn btn-icon btn-dark' href='" . route('front.ads.show', $row->id) . "' target='_blank'><i class='fe fe-eye'></i></a>
                                       <button
                                       type='button'
                                       class='modal-effect btn btn-icon  btn-primary editRecord'
                                       data-effect='effect-scale'
                                       data-toggle='modal'
                                       href='#modaldemo8'
                                       data-id='" . $row->id . "'
                                       >
                                      <i class='fe fe-edit'></i></button>
                                      <button
                                       type='button'
                                       class=' btn btn-icon  btn-danger deleteRecord'
                                       data-effect='effect-scale'
                                       data-id='" . $row->id . "'
                                       >
                                      <i class='fe fe-trash'></i></button>

                                      </div>";
      })
      ->rawColumns(['action'])
      ->make();
    return $ads;
  }
  public function getInactiveAds()
  {
    $data = Ads::with([
      'city',
      'category' => function ($query) {
        $query->with([
          'category'
        ]);
      }
    ])->where('is_active', '=', 0)->whereDate('expire_at', '<', DB::raw('CURRENT_TIMESTAMP'));
    $ads = DataTables::eloquent($data)->addIndexColumn()
      ->addColumn('action', function ($row) {
        return " <div class='btn-icon-list btn-list'>
                                       <a class='btn btn-icon btn-dark' href='" . route('front.ads.show', $row->id) . "' target='_blank'><i class='fe fe-eye'></i></a>
                                       <button
                                       type='button'
                                       class='modal-effect btn btn-icon  btn-primary editRecord'
                                       data-effect='effect-scale'
                                       data-toggle='modal'
                                       href='#modaldemo8'
                                       data-id='" . $row->id . "'
                                       >
                                      <i class='fe fe-edit'></i></button>
                                      <button
                                       type='button'
                                       class=' btn btn-icon  btn-danger deleteRecord'
                                       data-effect='effect-scale'
                                       data-id='" . $row->id . "'
                                       >
                                      <i class='fe fe-trash'></i></button>

                                      </div>";
      })
      ->rawColumns(['action'])
      ->make();
    return $ads;
  }

  public function getUnderReviewAds()
  {
    $data = Ads::with([
      'city',
      'category' => function ($query) {
        $query->with([
          'category'
        ]);
      }
    ])->where('is_approved', '=', 0);
    $ads = DataTables::eloquent($data)->addIndexColumn()
      ->addColumn('action', function ($row) {
        return " <div class='btn-icon-list btn-list'>
                                       <button
                                       type='button'
                                       class=' btn btn-icon  btn-success approveRecord'
                                       data-effect='effect-scale'
                                       data-id='" . $row->id . "'
                                       >
                                      <i class='fe fe-check'></i></button>
                                       <a class='btn btn-icon btn-dark' href='" . route('front.ads.show', $row->id) . "' target='_blank'><i class='fe fe-eye'></i></a>
                                       <button
                                       type='button'
                                       class='modal-effect btn btn-icon  btn-primary editRecord'
                                       data-effect='effect-scale'
                                       data-toggle='modal'
                                       href='#modaldemo8'
                                       data-id='" . $row->id . "'
                                       >
                                      <i class='fe fe-edit'></i></button>
                                      <button
                                       type='button'
                                       class=' btn btn-icon  btn-danger deleteRecord'
                                       data-effect='effect-scale'
                                       data-id='" . $row->id . "'
                                       >
                                      <i class='fe fe-trash'></i></button>

                                      </div>";
      })
      ->rawColumns(['action'])
      ->make(true);
    return $ads;
  }

  public function getAllAds()
  {
    $data = Ads::with([
      'city',
      'category' => function ($query) {
        $query->with([
          'category'
        ]);
      }
    ]);
    $ads = DataTables::eloquent($data)->addIndexColumn()
      ->addColumn('action', function ($row) {
        return " <div class='btn-icon-list btn-list'>
                                       <a class='btn btn-icon btn-dark' href='" . route('front.ads.show', $row->id) . "' target='_blank'><i class='fe fe-eye'></i></a>
                                       <button
                                       type='button'
                                       class='modal-effect btn btn-icon  btn-primary editRecord'
                                       data-effect='effect-scale'
                                       data-toggle='modal'
                                       href='#modaldemo8'
                                       data-id='" . $row->id . "'
                                       >
                                      <i class='fe fe-edit'></i></button>
                                      <button
                                       type='button'
                                       class=' btn btn-icon  btn-danger deleteRecord'
                                       data-effect='effect-scale'
                                       data-id='" . $row->id . "'
                                       >
                                      <i class='fe fe-trash'></i></button>

                                      </div>";
      })
      ->rawColumns(['action'])
      ->make(true);
    return $ads;
  }

  public function getAd(Request $request)
  {
    $ad = Ads::findOrFail($request->post('id'));
    $state_id = $ad->city->state->id;
    $main_id = $ad->category->category->id;
//    $response = array();
    if (!empty($ad)) {
      $response = $ad;
      $response['state_id'] = $state_id;
      $response['main_id'] = $main_id;
      $response['success'] = 1;
    } else {
      $response['success'] = 0;
    }

    return response()->json($response);
  }
}
