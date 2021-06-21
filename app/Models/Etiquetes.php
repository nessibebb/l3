<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiquetes extends Model
{
    use HasFactory;
    protected $fillable = [
  	'num_etager','num_rayon','num_bloc','Emp','nbr'
  ];
}
