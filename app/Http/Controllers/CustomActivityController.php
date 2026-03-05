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
                "save" => [
                    "url" => url('/custom-activity/save'),
                ],
                "publish" => [
                    "url" => url('/custom-activity/publish'),
                ],
                "validate" => [
                    "url" => url('/custom-activity/validate'),
                ],
                "stop" => [
                    "url" => url('/custom-activity/stop'),
                ]
            ],
            "userInterfaces"=> [
                "configModal" => [
                    "height"=> 450,
                    "width"=> 800,
                    "fullscreen"=> false
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

    public function validate(Request $request)
    {
        \Log::info('Validate called', $request->all());

        return response()->json([
            'status' => 'validate'
        ]);
    }

    public function stop(Request $request)
    {
        \Log::info('Stop called', $request->all());

        return response()->json([
            'status' => 'stopped'
        ]);
    }
}
