<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logs extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'logs';
    protected $primaryKey = 'log_id';
    public $incrementing = true;
    protected $fillable = ['id','activities','ip_address','user_agent'];
    public $timestamps = true;
}
