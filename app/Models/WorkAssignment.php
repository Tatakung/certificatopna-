<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkAssignment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'travel_approval_id',
        'date',
        'location',
        'task',
    ];
    //เชื่อมกับtravelApproval
    public function travelApproval()
    {
        return $this->belongsTo(TravelApproval::class, 'travel_approval_id', 'id');
    }

}
