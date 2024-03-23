@extends('judge.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Grading Criteria</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('judge.show', $event->EventID) }}"> Back</a>
            {{-- <a class="btn btn-success" href="{{ route('gradingcriteria.create', $event->EventID) }}"> Add New Grading Criteria</a> --}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if($gradingCriteria->isEmpty())
            <p class="text-center">No grading criteria set! Please add grading criteria.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Grading Criteria ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Max Score</th>
                        <th>Average Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gradingCriteria as $criteria)
                    <tr>
                        <td>{{ $criteria->GradingCriteriaID }}</td>
                        <td>{{ $criteria->Name }}</td>
                        <td>{{ $criteria->Description }}</td>
                        <td>{{ $criteria->MaxScore }}</td>
                        <td>{{ $criteria->AverageScore }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
