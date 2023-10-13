<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messagess';
    protected $fillable = ['member_id','message'];
    public function member()
    {
        return $this->belongsTo('App\Models\Member','member_id');
    }
}
