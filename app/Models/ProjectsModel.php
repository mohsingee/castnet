<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pro_detail(){
        return $this->hasOne(ProjectDetail::class, 'project_id');
    }
}
