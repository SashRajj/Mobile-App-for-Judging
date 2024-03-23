@extends('judge.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Grading Criteria</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('judge.show', $event->EventID) }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if($gradingCriteria->isEmpty())
            <p class="text-center">No grading criteria set! Please add grading criteria.</p>
        @else
            <form action="{{ route('judge.storeScores'), $event->EventID, $group->GroupID }}" method="POST">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th>Grading Criteria ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Max Score</th>
                            <th>Given Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gradingCriteria as $criteria)
                        <tr>
                            <td>{{ $criteria->GradingCriteriaID }}</td>
                            <td>{{ $criteria->Name }}</td>
                            <td>{{ $criteria->Description }}</td>
                            <td>{{ $criteria->MaxScore }}</td>
                            <td><input type="text" name="scores[{{ $criteria->GradingCriteriaID }}]" value=""></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <input type="hidden" name="EventJudgeID" value="{{ $eventJudgeID }}"> <!-- Assuming $eventJudgeID is available --> --}}
                <input type="submit" class="btn btn-success" value="Submit Scores">
            </form>
        @endif
    </div>
</div>

@endsection
