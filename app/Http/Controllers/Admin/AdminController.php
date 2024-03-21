<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $countUsers = User::all()->count();

        $countRequests = ModelsRequest::where('type_id', 1)->get()->count();

        $countOtherRequests = ModelsRequest::where('type_id', 2)->get()->count();

        $countComplaints = Complaint::all()->count();

        return view('admin.index', compact('countUsers', 'countRequests', 'countOtherRequests', 'countComplaints'));
    }
}
