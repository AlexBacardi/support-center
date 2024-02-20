<?php

namespace App\Services\Request;

use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestService
{
    public function create(Request $request, $data)
    {

        $data['user_id'] = auth()->user()->id;

        $data['status_id'] = 1;

        if(is_null($data['files'][0])){

            unset($data['files']);

        }

        if ($request->is('technical-support/create')) {

            $data['type_id'] = 1;

        }

        if ($request->is('other-question/create')) {

            $data['type_id'] = 2;

        }

        $ModelsRequest = ModelsRequest::firstOrCreate($data);

        return $ModelsRequest;

    }
}
