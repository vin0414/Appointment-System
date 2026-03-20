<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ranks extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'ranks';
    protected $primaryKey = 'rank_id';
    public $incrementing = true;
    protected $fillable = ['position','career_stage','coi','coi_competency','ncoi','ncoi_competency','status','user_id'];
    public $timestamps = true;
}