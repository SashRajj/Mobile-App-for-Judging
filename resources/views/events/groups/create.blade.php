<!-- resources/views/events/group/create.blade.php -->

@extends('events.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Group</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('events.show', $event->EventID) }}"> Back</a>
        </div>
    </div>
</div>

<form action="{{ route('events.groups.store', $event->EventID) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Group Name:</strong>
                <input type="text" name="Name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Title:</strong>
                <input type="text" name="Title" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Description:</strong>
                <input type="text" name="Description" class="form-control" placeholder="Description">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Submission Link:</strong>
                <input type="text" name="SubmissionLink" class="form-control" placeholder="Submission Link">
            </div>
        </div>
        <!-- Add other form fields as necessary -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>


@endsection
