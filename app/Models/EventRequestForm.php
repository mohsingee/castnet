<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRequestForm extends Model
{
    use HasFactory;
    protected $table = 'event_request_form';
    protected $guarded = ['id'];
}
