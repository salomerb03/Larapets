<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adopts = Adoption::orderBy('id', 'DESC')->paginate(20);
        //dd($adopts->toArray());
        return view('adoptions.index')->with('adopts', $adopts);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $adopt = Adoption::find($request->id);
        return view('adoptions.show')->with('adopt', $adopt );
    }

    public function search(Request $request) {
        $adopts = Adoption::names($request->q)->orderBy('id', 'DESC')->paginate(20);
       return view('adoptions.search')->with('adopts', $adopts);    
    }



}