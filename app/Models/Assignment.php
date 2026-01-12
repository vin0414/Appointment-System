<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'assignments';
    protected $primaryKey = 'assignment_id';
    public $incrementing = true;
    protected $fillable = ['applicant_id','school_id'];
    public $timestamps = true;
}
