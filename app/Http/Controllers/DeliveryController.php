<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delivery;

class DeliveryController extends Controller
{
  public function index() {
    return Delivery::get();
  }

  public function show($id) {
      if (Delivery::where('id', $id)->exists()) {
          return Delivery::find($id);
      } else {
          return response()->json([
              "message" => "Delivery not found"
          ], 404);
      }
  }

  public function store(Request $request) {
      $delivery = new Delivery($request->all());
      $delivery->save();
      return response()->json([
          "message" => "Delivery added successfully and bill generated"
      ], 200);
  }

  public function update(Request $request, $id) {
      if (Delivery::where('id', $id)->exists()) {
          $delivery = Delivery::find($id);
          $delivery->date = is_null($request->date) ? $delivery->date : $request->date;
          $delivery->client_id = is_null($request->client_id) ? $delivery->client_id : $request->client_id;
          $delivery->count = is_null($request->count) ? $delivery->count : $request->count;
          $delivery->dispatch_id = is_null($request->dispatch_id) ? $delivery->dispatch_id : $request->dispatch_id;
          $delivery->status = is_null($request->status) ? $delivery->status : $request->status;
          $delivery->save();

          return response()->json([
              "message" => "Delivery updated successfully"
          ], 200);
      } else {
      return response()->json([
          "message" => "Delivery not found"
      ], 404);
          
      }
  }

  public function destroy($id) {
      if (Delivery::where('id', $id)->exists()) {
          $delivery = Delivery::find($id);
          $delivery->delete();
          return response()->json([
              "message" => "Delivery removed successfully"
          ], 200);
      } else {
      return response()->json([
          "message" => "Delivery not found"
          ], 404);
      }
  }
}
