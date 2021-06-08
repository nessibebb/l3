<?php

namespace App\Http\Controllers;
use App\Models\Domaines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class DomainesController extends Controller
{
   
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $domaines = Domaines::latest()->get();
        
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
      
        return view('domaine',compact('domaines')) ;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Domaines::updateOrCreate(['id' => $request->domaine_id],
                ['nom' => $request->nom, 'idParent' => $request->parent]);        
   
        return response()->json(['success'=>'domaine saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          
     }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $domaine = Domaines::find($id);
        return response()->json($domaine);    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
    {
        Domaines::find($id)->delete();
     
        return response()->json(['success'=>'Book deleted successfully.']);
    }
}

