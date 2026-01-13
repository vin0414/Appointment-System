<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'salaries';
    protected $primaryKey = 'salary_id';
    public $incrementing = true;
    protected $fillable = ['salary_grade','amount','amount_in_words'];
    public $timestamps = true;
}