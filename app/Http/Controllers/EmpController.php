<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpController extends Controller
{
    public function index()
    {
         $afectations = Afectations::select("*", DB::raw("CONCAT(afectations.num_etg,' ',afectations.num_rayon,'',afectations.num_bloc) as Empl"))
        ->get();
  
    return view('afectation', compact('afectations'));
    }
}
