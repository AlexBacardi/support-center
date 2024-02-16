<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Other\StoreRequest as OtherStoreRequest;
use App\Http\Requests\Request\StoreRequest;
use App\Models\Priority;
use App\Models\Request;
use App\Models\Satellite;

class RequestController extends Controller
{

    public function index()
    {

        $allUserRequest = Request::where('user_id', auth()->user()->id)->get();

        return view('main.all_request', compact('allUserRequest'));

    }

    public function createSupportRequest()
    {

        $satellites = Satellite::all();

        $priorities = Priority::all();

        return view('main.technical_support', compact('satellites', 'priorities'));

    }

    public function storeSupportRequest(StoreRequest $request)
    {

        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        $data['status_id'] = 1;

        $data['type_id'] = 1;

        if(is_null($data['files'][0])){

            unset($data['files']);

        }

        Request::firstOrCreate($data);

        return redirect()->route('techical-support.all-request');

    }


    public function createOtherRequest()
    {

        $priorities = Priority::all();

        return view('main.other_questions', compact('priorities'));

    }


    public function storeOtherRequest(OtherStoreRequest $request)
    {

        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        $data['status_id'] = 1;

        $data['type_id'] = 2;

        if(is_null($data['files'][0])){

            unset($data['files']);

        }

        Request::firstOrCreate($data);

        return redirect()->route('techical-support.all-request');

    }

    public function show(Request $request)
    {

        return view('main.show_request', compact('request'));

    }
}
