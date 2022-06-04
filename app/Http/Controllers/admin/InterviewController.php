<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Application::join('portifolios', 'portifolios.user_id', '=', 'applications.user_id')
        ->join('vacancies', 'vacancies.id', '=', 'applications.vacancy_id')
        ->join('interviews', 'interviews.application_id', '=', 'applications.id')
        ->select('applications.id', 'applications.status', 'portifolios.firstname', 'portifolios.lastname', 'vacancies.position', 'interviews.interview_date', 'interviews.interview_time')
        ->get();
        return view('admin.interviews', [
            'interviews'=>$interviews
        ]);
    }
}
