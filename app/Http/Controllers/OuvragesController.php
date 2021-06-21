<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrages;
use App\Models\Afectations;
use DB;
class OuvragesController extends Controller
{

    public function index()
    {
  

        return view('ouvrage', [
            'ouvrages' => Ouvrages::all(),

        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()

    {
       
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {   
    	$ouvrages= Ouvrages::all();
          foreach ($ouvrages as $ouvrage){

      if($ouvrage->type_ouvrage == $request->type_ouvrage and 
      	$ouvrage->code==  $request->code and
        $ouvrage->date_edition ==  $request->date_edition and
        $ouvrage->editeur == $request->editeur and
         $ouvrage->nbrpage ==  $request->nbrpage and
         $ouvrage->titre == $request->titre and
         $ouvrage->annee_universitaire == $request->annee_universitaire){

       ?>
       <script>
       	alert("cet ouvrage existe deja veuillez le saisir comme exemplaire ");
       </script>
       <?php
   }

      else{
 $nm=$request->nom_dom;
        $l= DB::table("afectations")->select(DB::raw(" distinct CONCAT('E',afectations.num_etager,' -',afectations.num_rayon,'-',afectations.num_bloc) as emp"))
           ->join('ouvrages','ouvrages.nom_dom','=','afectations.nom_dom')
            ->where('statu',1 ,'afectations.nom_dom','=','$nm') 
          ->get()  ;
           $emp=$l;

        Ouvrages::create([
        	      'nom_dom'=> $request->nom_dom,
                 'type_ouvrage' => $request->type_ouvrage,
                 'code'=> $request->code,
                 'date_edition' => $request->date_edition,
                 'editeur'=> $request->editeur,
                'nbrpage' => $request->nbrpage,
                'titre'=> $request->titre,
                 'annee_universitaire' => $request->annee_universitaire,
                 
        ]); 

    return response()->json([
            'success' => 'ouvrage saved successfully.'
        ]);     
  }}
}

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
 
    public function emp($nom_dom)
    {
    	$afectations=Afectations::all();

        $aff= DB::select('select  nom_dom,num_etg,num_rayon,num_bloc from afectations where nom_dom=',$nom_dom ,'statu=', '1' );
        dd($aff);
       return $aff;
    }

    public function show($id)
    {

    }

    public function edit(Ouvrages $ouvrage)
    {
//          $domaine = Domaines::find($id);
        return response()->json($ouvrage);
    }

    public function update(Request $request, $id)
    {

        $v = Ouvrages::find($id);


                   $v->nom_dom = $request->nom_dom;
                 $v->type_ouvrage = $request->type_ouvrage;
                  $v->code = $request->code;
                 $v->date_edition = $request->date_edition;
                 $v->editeur = $request->editeur;
                $v->nbrpage = $request->nbrpage;
                $v->titre = $request->titre;
                 $v->annee_universitaire = $request->annee_universitaire;

      

        $v->save();
        return response()->json([
            'success' => true,
            'message' => 'update successfully'
        ]);
    }

    public function destroy(Ouvrages $ouvrage)
    {

        $ouvrage->delete();

        return redirect()->back()->with('success', 'ouvrage was deleted');
    }
}


