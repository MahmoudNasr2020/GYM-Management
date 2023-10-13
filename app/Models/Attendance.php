<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendances';
    protected $fillable = ['attendance_date','note','attendance','member_id'];
    public function member()
    {
        return $this->belongsTo('App\Models\Member','member_id');
    }
}
