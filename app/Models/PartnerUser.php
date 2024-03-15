<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'partner_users';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
