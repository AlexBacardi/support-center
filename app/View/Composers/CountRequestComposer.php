<?php

namespace App\View\Composers;

use App\Models\Request;
use Illuminate\View\View;

class CountRequestComposer
{
    public function compose(View $view)
    {

        if(auth()->check()){

        $requestCount = Request::where('user_id', auth()->user()->id)->whereBetween('status_id', [1, 2])->count();

        $view->with('requestCount', $requestCount);

        }

    }
}
