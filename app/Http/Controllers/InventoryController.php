<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class InventoryController extends Controller
{
  public function index() {
    return Inventory::get();
  }

  public function show($id) {
      if (Inventory::where('id', $id)->exists()) {
          return Inventory::find($id);
      } else {
          return response()->json([
              "message" => "Inventory entry not found"
          ], 404);
      }
  }

  public function store(Request $request) {
      $data = new Inventory($request->all());
      $data->save();
      return response()->json([
          "message" => "Inventory entry added successfully"
      ], 200);
  }

  public function update(Request $request, $id) {
      if (Inventory::where('id', $id)->exists()) {
          $data = Inventory::find($id);
          $data->date = is_null($request->date) ? $data->date : $request->date;
          $data->trans = is_null($request->trans) ? $data->trans : $request->trans;
          $data->batch = is_null($request->batch) ? $data->batch : $request->batch;
          $data->count = is_null($request->count) ? $data->count : $request->count;
          $data->amount = is_null($request->amount) ? $data->amount : $request->amount;
          $data->save();

          return response()->json([
              "message" => "Inventory entry updated successfully"
          ], 200);
      } else {
      return response()->json([
          "message" => "Inventory entry not found"
      ], 404);
          
      }
  }

  public function destroy($id) {
      if (Inventory::where('id', $id)->exists()) {
          $data = Inventory::find($id);
          $data->delete();
          return response()->json([
              "message" => "Inventory entry removed successfully"
          ], 200);
      } else {
      return response()->json([
          "message" => "Inventory entry not found"
          ], 404);
      }
  }
}
