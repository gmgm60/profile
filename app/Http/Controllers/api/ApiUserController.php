<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiUserController extends Controller
{

    // show all user
    public function index()
    {
        // $data = User::all();
        $data = User::select("name", "email")->get();
        if(count($data) > 0){
            return response()->json(["data" => $data, "message" => "success", "status" => 200]);
        }
        return response()->json(["message" => "error"]);
    }

    // create new user
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
            "image" => "nullable|image",
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors());
        }

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->age = $request->age;

        $image = $request->file("image");
        $extension = $image->getClientOriginalExtension();
        $image_name = uniqid() . "." . $extension;
        $image->move(public_path("upload"), $image_name);

        $data->image = $image_name;
        $data->save();
        return response()->json(["data" => $data, "message" => "success", "status" => 200]);
    }

    // show one user
    public function profile(Request $request)
    {
        $data = JWTAuth::authenticate($request->token);
        if(!is_null($data)){
            return response()->json(["data" => $data, "message" => "success", "status" => 200]);
        }
        return response()->json(["message" => "error"]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
            "image" => "nullable|image",
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors());
        }

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->age = $request->age;

        if($request->hasFile("image"))
        {
            if($data->image !== null){
                unlink(public_path("upload/") . $data->image);
            }

            $image = $request->file("image");
            $extension = $image->getClientOriginalExtension();
            $image_name = uniqid() . "." . $extension;
            $image->move(public_path("upload/"), $image_name);
        }

        $data->image = $image_name;
        $data->save();
        return response()->json(["data" => $data, "message" => "success", "status" => 200]);
    }

    // delete one user
    public function delete($id)
    {
        if(User::find($id)){
            $data = User::find($id);
            if($data->image !== null){
                unlink(public_path("upload/") . $data->image);
            }
            $data->delete();
            return response()->json(["message" => "success", "status" => 200]);
        }
        return response()->json(["message" => "not  found"]);
    }
}
