<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationsController extends Controller
{
    public function index()
    {
        $applications = Application::all();

        return view('admin.applications', [
            'applications'=>$applications
        ]);
    }

    public function invite($id)
    {

    }
}
