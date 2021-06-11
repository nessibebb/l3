<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empouvs extends Model
{
	    protected $fillable = [

       'id_etager',
               'id_rayon',
        'id_bloc',
        'id_ouvrage'];
}
