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
    protected $fillable = [
        'applicant_id','salary_id','employment_type','appointment','with',
        'status','item','page','date_signed','publisher','published_from','published_to',
        'posted_from','posted_to','assessment_date','evaluator'];
    public $timestamps = true;
}
