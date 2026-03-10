<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelApprovalDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'travel_approval_id',
        'faculty_member_name',
        'faculty_member_position',
        'faculty_member_level',
    ];
    //เชื่อมกับตารางtravelApproval
    public function travelApproval()
    {
        return $this->belongsTo(TravelApproval::class, 'travel_approval_id', 'id');
    }

}
