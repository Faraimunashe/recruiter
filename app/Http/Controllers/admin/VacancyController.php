<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use Illuminate\Database\QueryException;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::all();

        return view('admin.vacancies', [
            'vacancies'=>$vacancies
        ]);
    }

    public function add()
    {
        return view('admin.add-vacancy');
    }

    public function post(Request $request)
    {
        $request->validate([
            'position'=>'required|string',
            'department' => 'required|string'
        ]);

        try{
            $new = new Vacancy();

            $new->ref = rand(000000,999999);
            $new->position = $request->position;
            $new->department = $request->department;

            $new->save();
        }catch(QueryException $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Successfully added a new vacancy');
    }

    public function delete($id)
    {
        $vaca = Vacancy::find($id);
        if(is_null($vaca))
        {
            return redirect()->back()->with('error', 'Vacancy not found');
        }

        try{
            $vaca->delete();
        }catch(QueryException $e)
        {
            return redirect()->back()->with('error', $e);
        }

        return redirect()->back()->with('success', 'Successfully deleted vacancy');
    }
}
