<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;

class InvoiceController extends Controller
{
  public function index() {
    return Invoice::get();
  }

  public function show($id) {
      if (Invoice::where('id', $id)->exists()) {
          return Invoice::find($id);
      } else {
          return response()->json([
              "message" => "Invoice not found"
          ], 404);
      }
  }

  public function store(Request $request) {
      $data = new Invoice($request->all());
      $data->save();
      return response()->json([
          "message" => "Invoice added successfully"
      ], 200);
  }

  public function update(Request $request, $id) {
      if (Invoice::where('id', $id)->exists()) {
          $data = Invoice::find($id);
          $data->invoicecode = is_null($request->invoicecode) ? $data->invoicecode : $request->invoicecode;
          $data->date = is_null($request->date) ? $data->date : $request->date;
          $data->month = is_null($request->month) ? $data->month : $request->month;
          $data->no = is_null($request->no) ? $data->no : $request->no;
          $data->client_id = is_null($request->client_id) ? $data->client_id : $request->client_id;
          $data->bill_id = is_null($request->bill_id) ? $data->bill_id : $request->bill_id;
          $data->count = is_null($request->count) ? $data->count : $request->count;
          $data->amount = is_null($request->amount) ? $data->amount : $request->amount;
          $data->due_date = is_null($request->due_date) ? $data->due_date : $request->due_date;
          $data->status = is_null($request->status) ? $data->status : $request->status;
          $data->save();

          return response()->json([
              "message" => "Invoice updated successfully"
          ], 200);
      } else {
      return response()->json([
          "message" => "Invoice not found"
      ], 404);
          
      }
  }

  public function destroy($id) {
      if (Invoice::where('id', $id)->exists()) {
          $data = Invoice::find($id);
          $data->delete();
          return response()->json([
              "message" => "Invoice removed successfully"
          ], 200);
      } else {
      return response()->json([
          "message" => "Invoice not found"
          ], 404);
      }
  }
}
