<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    protected $fillable = ['title', 'mechanics', 'rules', 'prize', 'deadline'];
}
