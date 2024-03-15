<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership_Level extends Model
{
    protected $table = 'membership_levels';

    use HasFactory;
    protected $guarded = ['id'];
}
