<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qualifications extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'qualifications';
    protected $primaryKey = 'q_id';
    public $incrementing = true;
    protected $fillable = ['position','level','education','training','experience'];
    public $timestamps = true;
}
