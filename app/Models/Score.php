<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GradingCriteria;
use App\Models\EventJudge;


class Score extends Model
{
    use HasFactory;

    protected $primaryKey = 'ScoreID';

    protected $fillable = [
        'GradingCriteriaID',
        'EventJudgeID',
        'GivenScore',
    ];

    public function gradingCriteria(){
        return $this->belongsTo(GradingCriteria::class, 'grading_criteria_id');
    }

    public function eventJudge(){
        return $this->belongsTo(EventJudge::class, 'EventJudgeID');
    }
}

?>
