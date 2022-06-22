<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qoutes extends Model
{
 public $timestamps=false;
 protected $fillable=['qoute','postedby','likes','dislikes'];
}
