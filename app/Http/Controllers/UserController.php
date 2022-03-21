<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view("index", compact("data"));
    }
    public function create()
    {
        return view("create");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        if ($validator->fails()) {
            return redirect(route("create"));
        }

        $image = $request->file("image");
        $extension = $image->getClientOriginalExtension();
        $name = uniqid() . "." . $extension;
        $image->move(public_path("upload"), $name);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "address" => $request->address,
            "phone" => $request->phone,
            "age" => $request->age,
            "image" => $name,
        ]);

        return redirect(route("index"));

        // $validator = Validator::make($request->all(), [
        //     "name" => "required",
        //     "email" => "required",
        //     "password" => "required"
        // ]);

        // if ($validator->fails()) {
        //     return redirect(route("create"));
        // }
        // $data = new User();
        // $data->name = $request->name;
        // $data->email = $request->email;
        // $data->password = $request->password;
        // $data->address = $request->address;
        // $data->phone = $request->phone;

        // // move
        // $image = $request->file("image");
        // $extension = $image->getClientOriginalExtension();
        // $name = uniqid() . "." . $extension;
        // $image->move(public_path("upload"), $name);

        // $data->image = $name;
        // $data->age = $request->age;
        // $data->save();
        // return redirect(route("index"));
    }

    public function show($id)
    {
        $data = User::find($id);
        return view("show", compact("data"));
    }

    public function edit($id)
    {
        if(User::find($id))
        {
            $data = User::find($id);
            return view("edit", compact("data"));
        }else{
            return redirect("index");
        }
    }

    public function update(Request $request)
    {

        $image = $request->file("image");
        $extension = $image->getClientOriginalExtension();
        $name = uniqid() . "." . $extension;
        $image->move(public_path("upload"), $name);

        User::findOrFail($request->id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "address" => $request->address,
            "phone" => $request->phone,
            "age" => $request->age,
            "image" => $name,
        ]);

        return redirect(route("index"));

    }
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        if($data->image !== null){
            unlink(public_path("upload/") . $data->image);
        }
        $data->delete();
        return redirect("/index");
    }
}
