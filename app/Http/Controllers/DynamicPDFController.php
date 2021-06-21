<?php

namespace App\Http\Controllers;
use App\Models\Domaines;
use Illuminate\Http\Request;
use DB;
use PDF;
class DynamicPDFController extends Controller
{
  function index(){


     $domaine_data = $this->get_domaine_data();
     return view('dynamic_pdf')->with('domaine_data', $domaine_data);
    }

    function get_domaine_data()
    {
     $domaine_data = DB::table('domaines')
         ->limit(24)
         ->get();
     return $domaine_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_domaine_data_to_html());
     return $pdf->stream();
    }

    function convert_domaine_data_to_html()
    {
     $domaine_data = $this->get_domaine_data();
     $output = '
     <h3 align="center">domaine Data</h3>
     <table width="100%" height ="100%" style="border-collapse: collapse; border: 1px;">
      
     <tr>';  
     foreach($domaine_data as $domaine)
     { if( $domaine->id ==3){
      $output .= '
     
      
       
       <td height ="100" style="border: 1px solid;">'.$domaine->nom.'</td>
       
      
      ' ;
     }  if( $domaine->id ==4){
      $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid;  ">'.$domaine->nom.'</td>
       
      
      ' ;}
      if ($domaine->id ==5) {
        $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;} if ($domaine->id ==6) 
        $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;}
      
      
     $output .= '</tr><tr >';
     foreach($domaine_data as $domaine)
     { if( $domaine->id ==7){
      $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;
     }  if( $domaine->id ==8){
      $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;}
      if ($domaine->id ==9) {
        $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;} if ($domaine->id ==10) 
        $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;}
      
      $output .= '</tr><tr >';
     foreach($domaine_data as $domaine)
     { if( $domaine->id ==11){
      $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;
     }  if( $domaine->id ==12){
      $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;}
      if ($domaine->id ==13) {
        $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;} if ($domaine->id ==14) 
        $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;}
      $output .= '</tr><tr>';
     foreach($domaine_data as $domaine)
     { if( $domaine->id ==15){
      $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid;">'.$domaine->nom.'</td>
       
      
      ' ;
     }  if( $domaine->id ==16){
      $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;}
      if ($domaine->id ==17) {
        $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid;">'.$domaine->nom.'</td>
       
      
      ' ;} if ($domaine->id ==18) 
        $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid;">'.$domaine->nom.'</td>
       
      
      ' ;}
      $output .= '</tr><tr>';
     foreach($domaine_data as $domaine)
     { if( $domaine->id ==19){
      $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid;">'.$domaine->nom.'</td>
       
      
      ' ;
     }  if( $domaine->id ==20){
      $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid;">'.$domaine->nom.'</td>
       
      
      ' ;}
      if ($domaine->id ==21) {
        $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid;">'.$domaine->nom.'</td>
       
      
      ' ;} if ($domaine->id ==22) 
        $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;}
       $output .= '</tr><tr>';
     foreach($domaine_data as $domaine)
     { if( $domaine->id ==23){
      $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;
     }  if( $domaine->id ==24){
      $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid;  ">'.$domaine->nom.'</td>
       
      
      ' ;}
      if ($domaine->id ==25) {
        $output .= '
     
      
       
       <td height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;} if ($domaine->id ==26) 
        $output .= '
     
      
       
       <td  height ="100" style="border: 1px solid; ">'.$domaine->nom.'</td>
       
      
      ' ;}
      $output .= '</tr></table>';
     return $output;
    }
}
