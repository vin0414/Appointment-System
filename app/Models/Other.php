<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Other extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'others';
    protected $primaryKey = 'other_id';
    public $incrementing = true;
    protected $fillable = ['applicant_id','salary_grade','employment_type','appointment','with','status','item','page','date_signed'];
    public $timestamps = true;
}
