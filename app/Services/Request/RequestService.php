<?php

namespace App\Services\Request;

use App\Models\File;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RequestService
{
    public function create(Request $request, $data)
    {

        $data['user_id'] = auth()->user()->id;

        $data['status_id'] = 1;

        if(isset($data['files'])) {

            $paths = $data['files'];

            unset($data['files']);
        }


        if ($request->is('technical-support/create')) {

            $data['type_id'] = 1;

            $folderPath = 'request/tt-';

        }

        if ($request->is('other/create')) {

            $data['type_id'] = 2;

            $folderPath = 'other/tt-';

        }

        $ModelsRequest = ModelsRequest::firstOrCreate($data);

        if (isset($paths)) {

            $files['request_id'] = $ModelsRequest->id;

            foreach ($paths as $path) {

                $files['name'] = $path->getClientOriginalName();

                $files['extension'] = $path->extension();

                $files['path'] = Storage::disk('public')->put($folderPath . $files['request_id'], $path);

                File::create($files);

            }

        }


        return $ModelsRequest;

    }

    public function getView(Request $request, ModelsRequest $ModelsRequest)
    {
        if ($request->is('admin-panel/requests/*')) {

            $this->setStatus($ModelsRequest);

            return 'admin.show_request';

        }

        return 'main.show_request';

    }

    private function setStatus(ModelsRequest $ModelsRequest)
    {

        if ($ModelsRequest->status_id == 1) {

            $ModelsRequest->update(['status_id' => 2]);

        }

    }

    public function update($ModelRequest, $request)
    {

        $data = $request->validated();

        if ($request->is('servicedesk/*')) {

            $data['status_id'] = 4;

        }

        return $ModelRequest->update($data);

    }
}
