<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreRequest;
use App\Models\Request as ModelsRequest;
use App\Services\Comment\CommentService;

class CommentController extends Controller
{
    public function __construct(private CommentService $commentServices){}

    public function store(ModelsRequest $request, StoreRequest $storeRequest)
    {

        $data = $storeRequest->validated();

        $this->commentServices->create($data, $request);

        return redirect()->back();

    }
}
