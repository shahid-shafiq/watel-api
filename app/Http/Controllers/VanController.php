<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Van;

class VanController extends Controller
{
    public function index() {
        return Van::get();
    }

    public function show($id) {
        if (Van::where('id', $id)->exists()) {
            $van = Van::find($id);
            return $van;
        } else {
            return response()->json([
                "message" => "Van not found"
            ], 404);
        }
    }

    public function store(Request $request) {
        $van = new Van($request->all());
        $van->save();
        return response()->json([
            "message" => "Van added successfully"
        ], 200);
    }

    public function update(Request $request, $id) {
        if (Van::where('id', $id)->exists()) {
            $van = Van::find($id);
            $van->title = is_null($request->title) ? $van->title : $request->title;
            $van->description = is_null($request->description) ? $van->description : $request->description;
            $van->licenseplate = is_null($request->licenseplate) ? $van->licenseplate : $request->licenseplate;
            $van->capacity = is_null($request->capacity) ? $van->capacity : $request->capacity;
            $van->drivername = is_null($request->drivername) ? $van->drivername : $request->drivername;
            $van->drivermobile = is_null($request->drivermobile) ? $van->drivermobile : $request->drivermobile;
            $van->loadername = is_null($request->loadername) ? $van->loadername : $request->loadername;
            $van->loadermobile = is_null($request->loadermobile) ? $van->loadermobile : $request->loadermobile;
            $van->helpername = is_null($request->helpername) ? $van->helpername : $request->helpername;
            $van->helpermobile = is_null($request->helpermobile) ? $van->helpermobile : $request->helpermobile;

            $van->save();
    
            return response()->json([
                "message" => "Van updated successfully"
            ], 200);
        } else {
        return response()->json([
            "message" => "Van not found"
            ], 404);
        }
    }

    public function destroy($id) {
        if (Van::where('id', $id)->exists()) {
            $van = Van::find($id);
            $van->delete();
            return response()->json([
                "message" => "Van removed successfully"
            ], 200);
        } else {
        return response()->json([
            "message" => "Van not found"
            ], 404);
        }
    }
}
