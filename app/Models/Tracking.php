<?php

//Leow Kah Yan

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TrackingLog;

class Tracking extends Model
{
    protected $table = 'tracking';
    protected $primaryKey = 'tracking_id';
    public $incrementing = true;
    public $timestamps = false; 

    protected $fillable = [
        'order_id',
        'order_item',
        'courier_type',
        'usr_id',
        'status',
        'total',
        'last_function',
        'date_time',
    ];

    protected $casts = [
        'courier_type' => 'integer',
        'status' => 'integer',
        'total' => 'double',
        'date_time' => 'datetime',
    ];

    public function trackingLogs()
    {
        return $this->hasMany(TrackingLog::class, 'tracking_id');
    }
}
