<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\DomainesDataTable;

class DomaineExController extends Controller
{
    public function index(DomainesDataTable $dataTable)
    {
     return $dataTable->render('DomaineEx');
    }
}
