@extends('events.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Select Judges</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('events.judges.show', $eventID) }}"> Back</a>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('events.judges.store', $eventID) }}">
    @csrf
    <div class="form-group">
        <label for="judge_id">Select Judge:</label>
        <select class="form-control" id="judge_id" name="judge_id">
            @foreach($judges as $judge)
                <option value="{{ $judge->JudgeID }}">{{ $judge->Name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="judge_id">Select Group:</label>
        <select class="form-control" id="group_id" name="group_id">
            @foreach($groups as $group)
                <option value="{{ $group->GroupID }}">{{ $group->Name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Assign Judge</button>
</form>

@endsection
