<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_activity extends Model
{
    protected $table = 'user_activities';

    protected $fillable = ['date','duration','calories','distance','note'];
}

