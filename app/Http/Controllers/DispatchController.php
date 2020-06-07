<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dispatch;

class DispatchController extends Controller
{
  public function index() {
    return Dispatch::get();
  }

  public function show($id) {
      if (Dispatch::where('id', $id)->exists()) {
          return Dispatch::find($id);
      } else {
          return response()->json([
              "message" => "Dispatch not found"
          ], 404);
      }
  }

  public function store(Request $request) {
      $data = new Dispatch($request->all());
      $data->save();
      return response()->json([
          "message" => "Dispatch added successfully"
      ], 200);
  }

  public function update(Request $request, $id) {
      if (Dispatch::where('id', $id)->exists()) {
          $data = Dispatch::find($id);
          $data->dispatchcode = is_null($request->dispatchcode) ? $data->dispatchcode : $request->dispatchcode;
          $data->date = is_null($request->date) ? $data->date : $request->date;
          $data->van_id = is_null($request->van_id) ? $data->van_id : $request->van_id;
          $data->count = is_null($request->count) ? $data->count : $request->count;
          $data->worth = is_null($request->worth) ? $data->worth : $request->worth;
          $data->save();

          return response()->json([
              "message" => "Dispatch updated successfully"
          ], 200);
      } else {
      return response()->json([
          "message" => "Dispatch not found"
      ], 404);
          
      }
  }

  public function destroy($id) {
      if (Dispatch::where('id', $id)->exists()) {
          $data = Dispatch::find($id);
          $data->delete();
          return response()->json([
              "message" => "Dispatch removed successfully"
          ], 200);
      } else {
      return response()->json([
          "message" => "Dispatch not found"
          ], 404);
      }
  }
}
