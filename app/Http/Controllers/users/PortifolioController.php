<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portifolio;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Exception;

class PortifolioController extends Controller
{
    public function index()
    {
        $portifolio = Portifolio::where('user_id', Auth::id())->first();
        if(is_null($portifolio))
        {
            return redirect()->back()->with('error', 'There is no data for this user');
        }
        return view('users.portifolio', [
            'portifolio' => $portifolio
        ]);
    }

    public function add()
    {
        return view('users.add-portifolio');
    }

    public function post(Request $request)
    {
        $request->validate([
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'gender'=>'required|string',
            'phone'=>'required|digits:10',
            'address'=>'required|string',
            'dob'=>'required|date'
        ]);

        try{
            $portifolio = new Portifolio();

            $portifolio->user_id = Auth::id();
            $portifolio->firstname = $request->firstname;
            $portifolio->lastname = $request->lastname;
            $portifolio->gender = $request->gender;
            $portifolio->phone = $request->phone;
            $portifolio->address = $request->address;
            $portifolio->dob = $request->dob;

            $portifolio->save();
        }catch(QueryException $e){
            return redirect()->back()->with('error', $e);
        }

        return redirect()->back()->with('success', 'You have successfully added your details');
    }

    public function uploadCV(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $fileName = time().'.'.$request->file->extension();
        try{
            $request->file->move(public_path('cvs'), $fileName);
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e);
        }

        try{
            $cv = new CV();

            $cv->user_id = Auth::id();
            $cv->filename = $fileName;

            $cv->save();
        }catch(QueryException $e)
        {
            return redirect()->back()->with('error', $e);
        }

        return redirect()->back()->with('success','You have successfully uploaded your cv');
    }
}
