<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrages extends Model
{
protected $fillable = [
  	'type_ouvrage','code','date_edition','editeur','nbrpage','titre','annee_universitaire','emplacement '
  ];
}

 