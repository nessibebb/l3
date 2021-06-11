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
        /* $domaines = Domaines::latest()->get();

        if ($request->ajax()) {
            $data = Domaines::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook"><span class="glyphicon glyphicon-pencil"></span></a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook"><span class="glyphicon glyphicon-trash"></span></a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('domaine',compact('domaines')) ;*/

        return view('afectations', [
            'afectations' => Afectations::all(),

        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        'statu' => $request->statu

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


        $v->save();
        return response()->json([
            'success' => true,
            'message' => 'update successfully'
        ]);
    }

    public function destroy(Afectations $afectation)
    {

        $bloc->delete();

        return redirect()->back()->with('success', 'empouv was deleted');
    }
}



