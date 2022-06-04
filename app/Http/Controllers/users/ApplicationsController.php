<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
    public function index()
    {
        $app = Application::join('vacancies', 'vacancies.id', '=', 'applications.vacancy_id')
            ->where('applications.user_id', '=', Auth::id())
            ->select('applications.id', 'applications.status', 'vacancies.position')
            ->get();

        return view('users.applications', [
            'applications'=>$app
        ]);
    }
}
