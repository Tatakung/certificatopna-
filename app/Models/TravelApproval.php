<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelApproval extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'employee_id',
        'name',
        'prefix',
        'lname',
        'at',
        'position',
        'level',
        'department',
        'faculty_count',
        'numberid',
        'start_date',
        'end_date',
        'transport',
        'vehicle_number',
        'vacation_start_date',
        'vacation_end_date',
        'budget_reference',
        'action_plan',
        'car_office',
        'driver',
        'activity',
        'section',
        'division',
        'phone_number',
        'vehicle_expenses' , 
        'fuel_expenses',
        'food_expenses',
        
    ];
    //เชื่อมตาราง user
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }


    //เชื่อมตารางtravelApprovalDetails
    public function travelApprovalDetails()
    {
        return $this->hasMany(TravelApprovalDetail::class, 'travel_approval_id', 'id');
    }
    //เชื่อมตารางworkAssignments
    public function workAssignments()
    {
        return $this->hasMany(WorkAssignment::class, 'travel_approval_id', 'id');
    }
}
