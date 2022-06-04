<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Interview;
use Illuminate\Database\QueryException;

class ApplicationsController extends Controller
{
    public function index()
    {
        $applications = Application::join('portifolios', 'portifolios.user_id', '=', 'applications.user_id')
            ->join('c_v_s', 'c_v_s.user_id', '=', 'applications.user_id')
            ->join('vacancies', 'vacancies.id', '=', 'applications.vacancy_id')
            ->select('applications.id', 'applications.status', 'portifolios.firstname', 'portifolios.lastname', 'vacancies.position', 'c_v_s.filename')
            ->get();

        return view('admin.applications', [
            'applications'=>$applications
        ]);
    }

    public function interview($id)
    {
        $application = Application::join('portifolios', 'portifolios.user_id', '=', 'applications.user_id')
            ->join('c_v_s', 'c_v_s.user_id', '=', 'applications.user_id')
            ->join('vacancies', 'vacancies.id', '=', 'applications.vacancy_id')
            ->where('applications.id', '=', $id)
            ->select('applications.id', 'applications.status', 'portifolios.firstname', 'portifolios.lastname', 'vacancies.position', 'c_v_s.filename')
            ->first();

        return view('admin.interview', [
            'application'=>$application
        ]);
    }

    public function invite(Request $request)
    {
        $request->validate([
            'application_id'=>'required|numeric',
            'idate'=>'required|date',
            'itime'=>'required'
        ]);
        $app = Application::find($request->application_id);

        if(is_null($app))
        {
            return redirect()->back()->with('error', 'Application not found');
        }

        $int = Interview::where('application_id',$request->application_id)->first();

        if(!is_null($int))
        {
            return redirect()->back()->with('error', 'applicant already accepted');
        }

        try{
            $app->status = "accepted";

            $new = new Interview();
            $new->application_id = $request->application_id;
            $new->interview_date = $request->idate;
            $new->interview_time = $request->itime;
            $new->save();

            $app->save();
        }catch(QueryException $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'successfull accepted applicant');
    }

    public function decline($id)
    {
        $app = Application::find($id);

        if(is_null($app))
        {
            return redirect()->back()->with('error', 'Application not found');
        }

        try{
            $app->status = "declined";
            $app->save();
        }catch(QueryException $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'successfull declined applicant');
    }
}
