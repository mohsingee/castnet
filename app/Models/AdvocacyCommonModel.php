<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvocacyCommonModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'advocacy_common_models';
}

