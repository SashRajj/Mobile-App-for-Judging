@extends('events.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Event Participants</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('events.show', $eventID) }}"> Back</a>
            <a class="btn btn-success" href="{{ route('events.participants.create', $eventID) }}"> Add New Participant</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Participant ID</th>
                    <th>Participant Name</th>
                    <th>Group ID</th>
                    <th>Group Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($participants as $participant)
                <tr>
                    <td>{{ $participant->ParticipantID }}</td>
                    <td>{{ $participant->Name }}</td>
                    <td>{{ $participant->GroupID }}</td>
                    <td>{{ $participant->group->Name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
