<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afectations;
use Illuminate\Support\Facades\DB;
use DataTables;
class AffectationsController extends Controller
{

 
     public function index()
    {
        
         $afectations = Afectations::select("*", DB::raw("CONCAT('E',afectations.num_etg,'-',afectations.num_rayon,'-',afectations.num_bloc) as Emp"))
        ->get();
  
    return view('afectation', compact('afectations'));


    }
     
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Afectations::create([
                'nom_dom' => $request->nom_dom,
        'num_etg' => $request->num_etg,
        'num_rayon' => $request->num_rayon,
         'num_bloc' => $request->num_bloc,
        'statu' => $request->statu,
        'nb_etiq' => $request->nb_etiq
        ]); 

    return response()->json([
            'success' => 'ouvrage saved successfully.'
        ]);  
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function edit(Afectations $afectation)
    {
//          $domaine = Domaines::find($id);
        return response()->json($afectation);
    }

    public function update(Request $request, $id)
    {

        $v = Afectations::find($id);

        $v->nom_dom = $request->nom_dom;
        $v->num_etg = $request->num_etg;
        $v->num_rayon = $request->num_rayon;
         $v->num_bloc = $request->num_bloc;
        $v->statu = $request->statu;
        $v->nb_etiq = $request->nb_etiq;



        $v->save();
        return response()->json([
            'success' => true,
            'message' => 'update successfully'
        ]);
    }

    public function destroy(Afectations $afectation)
    {

        $afectation->delete();

        return redirect()->back()->with('success', 'empouv was deleted');
    }
}



