<?php

namespace App\View\Composers\Admin;

use App\Models\Request;
use Illuminate\View\View;

class CountAllRequestComposer
{
    public function compose(View $view)
    {

        if(auth()->check()){

        $requestCount = Request::where('type_id', 1)->where('status_id', 1)->count();

        $view->with('requestCount', $requestCount);

        }

    }
}
