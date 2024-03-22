<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class GradingCriteria extends Model
{
    use HasFactory;

    protected $table = 'grading_criteria';

    protected $primaryKey = 'GradingCriteriaID';

    protected $fillable = [
        'EventID',
        'Name',
        'Description',
        'MaxScore',
        'AverageScore',
    ];

    // Define relationship with Event model
    public function event()
    {
        return $this->belongsTo(Event::class, 'EventID');
    }
}
