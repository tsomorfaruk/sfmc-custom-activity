<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomActivityController extends Controller
{
    public function config()
    {
        return response()->json([
            "workflowApiVersion" => "1.1",
            "metaData" => [
                "icon" => url('/images/icon.png'),
                "category" => "message"
            ],
            "type" => "REST",
            "lang" => [
                "en-US" => [
                    "name" => "SFMC Custom Activity",
                    "description" => "Send data to External system"
                ]
            ],
            "arguments" => [
                "execute" => [
                    "inArguments" => [],
                    "url" => url('/custom-activity/execute'),
                    "verb" => "POST"
                ]
            ],
            "configurationArguments" => [
                "applicationExtensionKey" => "6c998e75-c288-4d7a-bd2e-877429140c61",
                "save" => [
                    "url" => url('/custom-activity/save'),
                    "verb" => "POST"
                ],
                "publish" => [
                    "url" => url('/custom-activity/publish'),
                    "verb" => "POST"
                ]
            ]
        ]);
    }

    public function execute(Request $request)
    {
        $data = $request->all();

        // Example: get contact data
        $contact = $data['inArguments'][0] ?? [];

        // Your Laravel logic here

        return response()->json([
            "status" => "success"
        ]);
    }

    public function save(Request $request)
    {
        \Log::info('Save called', $request->all());

        return response()->json([
            'status' => 'saved'
        ]);
    }

    public function publish(Request $request)
    {
        \Log::info('Publish called', $request->all());

        return response()->json([
            'status' => 'published'
        ]);
    }
}
