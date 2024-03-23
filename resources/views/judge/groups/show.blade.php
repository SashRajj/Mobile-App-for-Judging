@extends('judge.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Group</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('judge.show', $event->EventID) }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Group Name:</strong>
            {{ $group->Name }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Title:</strong>
            {{ $group->project->Title }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Description:</strong>
            {{ $group->project->Description }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Submission Link:</strong>
            {{ $group->project->SubmissionLink }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if($gradingCriteria->isEmpty())
            <p class="text-center">No grading criteria set! Please add grading criteria.</p>
        @else
        <form action="{{ route('judge.storeScores', ['eventID' => $event->EventID, 'groupID' => $group->GroupID]) }}" method="POST">
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
                            <td> <input type="text" name="scores[{{ $criteria->GradingCriteriaID }}]" value=""></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <input type="submit" class="btn btn-success" value="Submit Scores">
            </form>
        @endif
    </div>
</div>

@endsection
