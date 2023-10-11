<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
  public function getCities(Request $request)
  {
    $state = State::findOrFail($request->id);
    $response = array();
    if (!empty($state)) {
      $response['cities'] = $state->cities;
      $response['success'] = 1;
    } else {
      $response['success'] = 0;
    }
    return $response;
  }
}
