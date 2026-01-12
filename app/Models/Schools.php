<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schools extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'schools';
    protected $primaryKey = 'school_id';
    public $incrementing = true;
    protected $fillable = ['school_name','principal','designation'];
    public $timestamps = true;
}
