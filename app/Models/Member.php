<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = ['name','phone','type','f_weight',
    'l_weight','image','age','active','date_joining'];
    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice','member_id');
    }
    
    public function attendances()
    {
        return $this->hasMany('App\Models\Attendance','member_id');
    }
}
