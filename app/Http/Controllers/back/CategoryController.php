<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function getSubCategories(Request $request)
  {
    $category = Category::findOrFail($request->id);
    $response = array();
    if(!empty($category))
    {
      $response['subCategories'] = $category->subCategories;
      $response['success'] = 1;
    }else
    {
      $response['success'] = 0;
    }
    return $response;

  }
}
