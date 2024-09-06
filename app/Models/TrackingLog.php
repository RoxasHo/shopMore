<?php

//Leow Kah Yan

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tracking;

class TrackingLog extends Model
{
    protected $table = 'tracking_log';
    protected $primaryKey = ['tracking_id', 'date_time'];
    public $incrementing = false; // Assuming composite primary key
    public $timestamps = false; // Assuming the table does not have created_at and updated_at columns

    protected $fillable = [
        'order_id',
        'tracking_id',
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

    public function tracking()
    {
        return $this->belongsTo(Tracking::class, 'tracking_id');
    }
}
