<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\OuvragesDataTable;
class OuvragesExController extends Controller
{
     public function index(OuvragesDataTable $dataTable)
    {
     return $dataTable->render('OuvrageEx');
    }
}
