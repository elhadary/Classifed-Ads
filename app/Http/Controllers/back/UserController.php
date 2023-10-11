<?php

namespace App\Http\Controllers\back;

use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
  public function index()
  {
    $enum = User::getPossibleEnumValues('users', 'rank');
    return view('back.users.index',compact('enum'));
  }


  public function getAllUsers()
  {
    $data = User::select('id', 'name', 'email', 'phone', 'rank', 'created_at', 'updated_at');
    $users = \Yajra\DataTables\Facades\DataTables::eloquent($data)->addIndexColumn()
      ->addColumn('action', function ($row) {
        return " <div class='btn-icon-list btn-list'>
                                       <button
                                       type='button'
                                       class='modal-effect btn btn-icon  btn-primary updateUser'
                                       data-effect='effect-scale'
                                       data-toggle='modal'
                                       href='#modaldemo8'
                                       data-id='" . $row->id . "'
                                       >
                                      <i class='fe fe-edit'></i></button>
                                      <button
                                       type='button'
                                       class='modal-effect btn btn-icon  btn-danger deleteUser'
                                       data-effect='effect-scale'
                                       data-toggle='modal'
                                       href='#modaldemo8'
                                       data-id='" . $row->id . "'
                                       >
                                      <i class='fe fe-trash'></i></button>

                                      </div>";
      })->rawColumns(['action'])
      ->make(true);
    return $users;
  }

  public function getUser(Request $request)
  {

    ## Read POST data
    $id = $request->post('id');

    $user = User::find($id);

    $response = array();
    if (!empty($user)) {

      $response['name'] = $user->name;
      $response['email'] = $user->email;
      $response['phone'] = $user->phone;
      $response['rank'] = $user->rank;

      $response['success'] = 1;
    } else {
      $response['success'] = 0;
    }

    return response()->json($response);

  }

  public function update(Request $request)
  {
    $id = $request->post('id');
    $user = User::find($id);
    $response = array();
    if (!empty($user)) {
      $validator = Validator::make($request->post(), [
        'name' => 'required|min:5|max:55',
        'email' => 'required|email',
        'phone' => 'required|numeric|max:999999999999',
      ]);
      if ($validator->fails()) {
        return response()->json(['status' => 0,'error' => $validator->errors()->toArray()]);
      }
      $data['name'] = $request->post('name');
      $data['email'] = $request->post('email');
      $data['phone'] = $request->post('phone');
      $data['rank'] = $request->post('rank');
      if ($user->update($data)) {
        $response['success'] = 1;
        $response['msg'] = 'Update successfully';
      } else {
        $response['success'] = 0;
        $response['msg'] = 'Record not updated';
      }

    } else {
      $response['success'] = 0;
      $response['msg'] = 'Invalid ID.';
    }

    return response()->json($response);
  }

  public function delete(Request $request)
  {
    $id = $request->post('id');
    $user = User::find($id);
    if ($user->delete()) {
      $response['success'] = 1;
      $response['msg'] = 'تم الحذف بنجاح';
    } else {
      $response['success'] = 0;
      $response['msg'] = 'لا يوجد مستخدم بهذا الرقم.';
    }

    return response()->json($response);
  }
}
