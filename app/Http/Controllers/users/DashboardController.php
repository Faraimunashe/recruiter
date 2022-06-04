<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\Application;
use App\Models\CV;
use App\Models\Portifolio;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::all();
        return view('users.vacancies', [
            'vacancies'=>$vacancies
        ]);
    }

    public function apply($id)
    {
        $port = Portifolio::where('user_id', Auth::id())->first();
        if(is_null($port))
        {
            return redirect()->back()->with('error', 'User must fill in portifolio first');
        }

        $cv = CV::where('user_id', Auth::id())->first();
        if(is_null($cv))
        {
            return redirect()->back()->with('error', 'User must upload cv first');
        }

        $vac = Vacancy::find($id);
        if(is_null($vac))
        {
            return redirect()->back()->with('error', 'vacancy was not found');
        }

        try{
            $app = new Application();

            $app->user_id = Auth::id();
            $app->vacancy_id = $vac->id;

            $app->save();
        }catch(QueryException $e)
        {
            return redirect()->back()->with('error', $e);
        }

        return redirect()->back()->with('success', 'successfully applied for this job');
    }
}
