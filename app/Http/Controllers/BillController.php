<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;

class BillController extends Controller
{
  public function index() {
    return Bill::get();
  }

  public function show($id) {
      if (Bill::where('id', $id)->exists()) {
          return Bill::find($id);
      } else {
          return response()->json([
              "message" => "Bill not found"
          ], 404);
      }
  }

  public function store(Request $request) {
      $bill = new Bill($request->all());
      $bill->save();
      return response()->json([
          "message" => "Bill added successfully"
      ], 200);
  }

  public function update(Request $request, $id) {
      if (Bill::where('id', $id)->exists()) {
          $bill = Bill::find($id);
          $bill->no = is_null($request->no) ? $bill->no : $request->no;
          $bill->date = is_null($request->date) ? $bill->date : $request->date;
          $bill->client_id = is_null($request->client_id) ? $bill->client_id : $request->client_id;
          $bill->count = is_null($request->count) ? $bill->count : $request->count;
          $bill->invoice_id = is_null($request->invoice_id) ? $bill->invoice_id : $request->invoice_id;
          $bill->cost = is_null($request->cost) ? $bill->cost : $request->cost;
          $bill->discount = is_null($request->discount) ? $bill->discount : $request->discount;
          $bill->amount = is_null($request->amount) ? $bill->amount : $request->amount;
          $bill->payment = is_null($request->payment) ? $bill->payment : $request->payment;
          $bill->status = is_null($request->status) ? $bill->status : $request->status;
          $bill->save();

          return response()->json([
              "message" => "Bill updated successfully"
          ], 200);
      } else {
      return response()->json([
          "message" => "Bill not found"
      ], 404);
          
      }
  }

  public function destroy($id) {
      if (Bill::where('id', $id)->exists()) {
          $bill = Bill::find($id);
          $bill->delete();
          return response()->json([
              "message" => "Bill removed successfully"
          ], 200);
      } else {
      return response()->json([
          "message" => "Bill not found"
          ], 404);
      }
  }
}
