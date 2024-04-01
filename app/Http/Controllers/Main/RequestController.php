<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Other\StoreRequest as OtherStoreRequest;
use App\Http\Requests\Request\StoreRequest;
use App\Http\Requests\Request\UpdateRequest;
use App\Models\Priority;
use App\Models\Request;
use App\Models\Satellite;
use App\Services\Request\RequestService;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{

    public function __construct(private RequestService $requestServece){}

    public function index()
    {

        $allUserRequest = Request::where('user_id', auth()->user()->id)->latest('created_at')->get();

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

        $this->requestServece->create($request, $data);

        return redirect()->route('servicedesk.all-request');

    }


    public function createOtherRequest()
    {

        $priorities = Priority::all();

        return view('main.other', compact('priorities'));

    }


    public function storeOtherRequest(OtherStoreRequest $request)
    {

        $data = $request->validated();

        $this->requestServece->create($request, $data);

        return redirect()->route('servicedesk.all-request');

    }

    public function show(Request $request, HttpRequest $httprequest)
    {

        $this->authorize('view', $request);

        $comments = $request->comments()->latest('created_at')->get();

        $files = $request->files;

        $view = $this->requestServece->getView($httprequest, $request);

        return view($view, compact('request', 'comments', 'files'));

    }


    public function adminAllRequest(HttpRequest $request)
    {
        $type = $request->type ?? 1;

        $requests = Request::where('type_id', $type)->oldest('status_id')->get();

        return view('admin.all_requests', compact('requests'));

    }

    public function update(Request $request, UpdateRequest $updateRequest)
    {

        if($this->requestServece->update($request, $updateRequest)) {

            return redirect()->back()->with('status', 'Заявка отменена');

        }

    }

}
