<?php

namespace App\Services\Request;

use App\Models\File;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;

class RequestService
{
    public function create(Request $request, $data)
    {

        $data['user_id'] = auth()->user()->id;

        $data['status_id'] = 1;

        $paths = $data['files'];

        unset($data['files']);

        if ($request->is('technical-support/create')) {

            $data['type_id'] = 1;

            $folderPath = 'request/tt-';

        }

        if ($request->is('other/create')) {

            $data['type_id'] = 2;

            $folderPath = 'other/tt-';

        }

        $ModelsRequest = ModelsRequest::firstOrCreate($data);

        $files['request_id'] = $ModelsRequest->id;

        foreach ($paths as $path) {

            $files['name'] = $path->getClientOriginalName();

            $files['extension'] = $path->extension();

            $files['path'] = Storage::disk('local')->put($folderPath . $files['request_id'], $path);

            File::create($files);

        }

        return $ModelsRequest;

    }
}
