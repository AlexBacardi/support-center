<?php

namespace App\View\Composers\Admin;

use App\Models\Request;
use Illuminate\View\View;

class CountAllOtherRequestComposer
{
    public function compose(View $view)
    {

        if(auth()->check()){

        $otherRequestCount = Request::where('type_id', 2)->where('status_id', 1)->count();

        $view->with('otherRequestCount', $otherRequestCount);

        }

    }
}
