<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_Request_Type extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'event_req_types';
}
