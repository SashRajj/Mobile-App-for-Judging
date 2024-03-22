@extends('events.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Event Judge</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('events.show', $eventID) }}"> Back</a>
            <a class="btn btn-success" href="{{ route('events.judges.index', $eventID) }}"> Assign Judges</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Group ID</th>
                    <th>Group Name</th>
                    <th>Judge ID</th>
                    <th>Judge Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventJudges as $eventJudge)
                <tr>
                    <td>{{ $eventJudge->GroupID }}</td>
                    <td>{{ $eventJudge->group->Name }}</td>
                    <td>{{ $eventJudge->JudgeID }}</td>
                    <td>{{ $eventJudge->judge->Name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
