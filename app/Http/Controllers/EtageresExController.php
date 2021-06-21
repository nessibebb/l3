<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\EtageresDataTable;
class EtageresExController extends Controller
{
   public function index(EtageresDataTable $dataTable)
    {
     return $dataTable->render('EtageresEx');
    }
}
