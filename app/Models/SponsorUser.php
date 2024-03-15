<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'sponsor_users';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paymentdetail(){
        return $this->hasOne(PaymentModel::class, 'user_id','user_id');
    }
}
