<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use Twilio\Rest\Client;

class BillController extends Controller
{
  public function index() {
    return Bill::with('client.area.city')->get();
  }

  public function show($id) {
      if (Bill::where('id', $id)->exists()) {
          return Bill::with('delivery.client.area.city')->find($id);
      } else {
          return response()->json([
              "message" => "Bill not found"
          ], 404);
      }
  }

  public function sendSMS($recipient, $message) {
    $account_sid = getenv("TWILIO_SID");
    $auth_token = getenv("TWILIO_AUTH_TOKEN");
    $twilio_number = getenv("TWILIO_NUMBER");
    $client = new Client($account_sid, $auth_token);
    //$recipient = "+923215176024";
    $client->messages->create($recipient, 
            ['from' => $twilio_number,
            'body' => $message] );
  }

  public function notifyBillDelivery($bill) {
    $client = $bill->delivery->client;
    $pay = "";
    if ($bill->payment == 'cash') {
      $pay = sprintf("An amount of %.2f has been received.", $bill->amount);
    } else {
      $pay = sprintf("A bill amount of %.2f has been generated.", $bill->amount);
    }
    
    $message = sprintf(
      "Dear %s, Watel delivered %d bottles at your place. %s. Thank you for using our service", 
      $client->name, $bill->count, $pay);

    $this->sendSMS($client->mobile, $message);
  }

  public function store(Request $request) {
      $bill = new Bill($request->all());
      $bill->save();

      $this->notifyBillDelivery($bill);

      return response()->json([
          "message" => "Bill added successfully",
          "bill_id" => $bill->id
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
