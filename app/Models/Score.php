<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $primaryKey = 'ScoreID';

    protected $fillable = [
        'grading_criteria_id',
        'event_judge_id',
        'given_score',
    ];
}

?>
