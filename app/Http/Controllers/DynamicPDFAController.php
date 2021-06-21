<?php

namespace App\Http\Controllers;
use App\Models\Afectations;
use Illuminate\Http\Request;
use DB;
use PDF;
class DynamicPDFAController extends Controller
{
    function index(){

   
     $afectation_data = $this->get_afectation_data();
     return view('dynamic_pdfa')->with('afectation_data', $afectation_data);
    }

    function get_afectation_data()
    {
    	$afectation_data = Afectations::all();
         
    	foreach($afectation_data as $afectation){
    		
    		
     $afectation_data = Afectations::select("*", DB::raw("CONCAT('E',afectations.num_etg,'-',afectations.num_rayon,'-',afectations.num_bloc) as Emp"))
         ->limit(10)->get();
         $afectation->delete();
         }

     return $afectation_data;
    }

    function pdfA()
    {
     $pdfa = \App::make('dompdf.wrapper');
     $pdfa->loadHTML($this->convert_afectation_data_to_html());
     return $pdfa->stream();
    }

    function convert_afectation_data_to_html()
    {
     $afectation_data = $this->get_afectation_data();
     $output = '
     <h3 align="center">Etiquete</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      
     ';  
     foreach($afectation_data as $afectation)
     {for ($i = 1; $i <= $afectation->nb_etiq/4; $i++) {
     	
     	
      $output .= ' 
     
    <tr>
       <td style="border: 1px solid; padding:12px;">'.$afectation->Emp.'</td>
       <td style="border: 1px solid; padding:12px;">'.$afectation->Emp.'</td>
       <td style="border: 1px solid; padding:12px;">'.$afectation->Emp.'</td>
       <td style="border: 1px solid; padding:12px;">'.$afectation->Emp.'</td>
      
      
      
      
      </tr>
      '; }
    
    $l=$afectation->nb_etiq%4;
      if ($l==1) {
     	
      $output .= ' 
     
    <tr>
       <td style="border: 1px solid; padding:12px;">'.$afectation->Emp.'</td>

      
      </tr>
      '; }

      $l=$afectation->nb_etiq%4;
      if ($l==2) {
     	
      $output .= ' 
     
    <tr>
       <td style="border: 1px solid; padding:12px;">'.$afectation->Emp.'</td>
       <td style="border: 1px solid; padding:12px;">'.$afectation->Emp.'</td>

      
      </tr>
      '; }

      $l=$afectation->nb_etiq%4;
      if ($l==3) {
     	
      $output .= ' 
     
    <tr>
       <td style="border: 1px solid; padding:12px;">'.$afectation->Emp.'</td>
       <td style="border: 1px solid; padding:12px;">'.$afectation->Emp.'</td>
       <td style="border: 1px solid; padding:12px;">'.$afectation->Emp.'</td>

      
      </tr>
      '; }
     
     $output .= '</table>';

     return $output;
    }
}
}
