<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInformation extends Model
{
    use HasFactory;
    public $table = 'company_informations';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paymentdetail(){
        return $this->hasOne(PaymentModel::class, 'user_id','user_id');
    }
}
