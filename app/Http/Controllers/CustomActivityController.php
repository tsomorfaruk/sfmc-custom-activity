<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomActivityController extends Controller
{

    public function index()
    {
        return view('custom-activity.index');
    }

    public function upload_image(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $file = $request->file('image');

        $name = time().'_'.$file->getClientOriginalName();

        $path = $file->storeAs('activity_images',$name,'public');

        $url = asset('storage/'.$path);

        return response()->json([
            'url' => $url
        ]);

    }


    public function save(Request $request)
    {
        return response()->json([
            "status" => "saved"
        ]);
    }

    public function publish(Request $request)
    {
        return response()->json([
            "status" => "published"
        ]);
    }

    public function validateConfig(Request $request)
    {
        return response()->json([
            "status" => "validated"
        ]);
    }

    public function stop(Request $request)
    {
        return response()->json([
            "status" => "stopped"
        ]);
    }

    public function execute(Request $request)
    {
        \Log::info('Journey Data', $request->all());

        return response()->json([
            "status" => "success"
        ]);
    }
}
