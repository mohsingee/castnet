<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorCommonSection2 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function details(){
        return $this->hasMany(SectorCommonSection2Details::class, 'sector_id', 'id');
    }
}
