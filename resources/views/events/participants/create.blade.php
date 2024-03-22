@extends('events.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Select Participants</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('events.participants.show', $eventID) }}"> Back</a>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('events.participants.store', $eventID) }}">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="Name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <textarea class="form-control" style="height:150px" name="Email" placeholder="Email"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>GroupID:</strong>
                <input type="number" name="GroupID" class="form-control" placeholder="Group ID">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
