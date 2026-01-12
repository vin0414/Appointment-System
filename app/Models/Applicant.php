<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'applicants';
    protected $primaryKey = 'applicant_id';
    public $incrementing = true;
    protected $fillable = ['first_name','middle_name','sur_name','suffix','position','gender','government_id','id_number','date_issued','address','brgy_captain','education','experience','training'];
    public $timestamps = true;
}