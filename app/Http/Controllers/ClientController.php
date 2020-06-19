<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function index() {
        return Client::with('area.city')->get();
    }

    public function show($id) {
        if (Client::where('id', $id)->exists()) {
            return Client::with('area.city')->find($id);
        } else {
            return response()->json([
                "message" => "Client not found"
            ], 404);
        }
    }

    public function store(Request $request) {
        $client = new Client($request->all());
        $client->save();
        return response()->json([
            "message" => "Client added successfully",
            "client_id" => $client->id
        ], 200);
    }

    public function update(Request $request, $id) {
        if (Client::where('id', $id)->exists()) {
            $client = Client::find($id);
            $client->name = is_null($request->name) ? $client->name : $request->name;
            $client->address = is_null($request->address) ? $client->address : $request->address;
            $client->street = is_null($request->street) ? $client->street : $request->street;
            $client->mobile = is_null($request->mobile) ? $client->mobile : $request->mobile;
            $client->email = is_null($request->email) ? $client->email : $request->email;
            $client->demand = is_null($request->demand) ? $client->demand : $request->demand;
            $client->area_id = is_null($request->area_id) ? $client->area_id : $request->area_id;

            $client->city_id = is_null($request->city_id) ? $client->city_id : $request->city_id;
            $client->save();
    
            return response()->json([
                "message" => "Client updated successfully"
            ], 200);
        } else {
        return response()->json([
            "message" => "Client not found"
        ], 404);
            
        }
    }

    public function destroy($id) {
        if (Client::where('id', $id)->exists()) {
            $client = Client::find($id);
            $client->delete();
            return response()->json([
                "message" => "Client removed successfully"
            ], 200);
        } else {
        return response()->json([
            "message" => "Client not found"
            ], 404);
        }
    }
}
