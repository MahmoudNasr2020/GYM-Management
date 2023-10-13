<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $fillable = [
        'member_id','start_date','end_date','fee_id','paid_up','remaining','status'
    ];
    public function member()
    {
        return $this->belongsTo('App\Models\Member','member_id');
    }
    
    public function fee()
    {
        return $this->belongsTo('App\Models\Fee','fee_id');
    }
}
