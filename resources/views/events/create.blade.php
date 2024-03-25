<!-- 

    This is the Admin Create Event Page. It displays:
        -   Name
        -   Start and End Date
        -   Start and End Time
        -   Description

-->

@extends('events.layout')

@section('content')

<!-- "Add New Event" + back button -->
<div class="row text-gray-800 dark:text-gray-200">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Event</h2>
        </div>
        <div class="pull-right">
            <x-primary-button href="{{ route('admin.dashboard') }}">{{ __('Back') }}</x-primary-button>

        </div>
    </div>
</div>

<!-- display validation error -->
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- CREATE Name, Start Date, End Date, Description, Submit Form -->
<form action="{{ route('events.store') }}" method="POST">
    @csrf   
    <div class="row text-gray-800 dark:text-gray-200">

        <!-- Name Field -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="Name" class="form-control" placeholder="Name">
            </div>
        </div>

        <!-- Start DATE Field -->
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Start Date:</strong>
                <input type="text" name="StartDate" id="StartDate" class="form-control datepicker" placeholder="YYYY/MM/DD">
            </div>
        </div>

        <!-- End DATE Field -->
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>End Date:</strong>
                <input type="text" name="EndDate" id="EndDate" class="form-control datepicker" placeholder="YYYY/MM/DD">
            </div>
        </div>

        <!-- Start TIME Field -->
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Start Time:</strong>
                <input type="text" name="StartTime" id="StartTime" class="form-control timepicker" placeholder="Start Time">
            </div>
        </div>

        <!-- End TIME Field -->
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>End Time:</strong>
                <input type="text" name="EndTime" id="EndTime" class="form-control timepicker" placeholder="End Time">
            </div>
        </div>

        <!-- Description Field -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="Description" placeholder="Description"></textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <x-primary-button type="submit">{{ __('Submit') }}</x-primary-button>
        </div>
    </div>
</form>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- loading Bootstrap Date/Time Picker library -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<!-- loading jQuery Timepicker library -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>

<!-- loading Moment.js library for time manipulation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

<!-- initialize datepicker and timepicker -->
<script>
    $(function() {
        // initialize for start date
        $("#StartDate").datepicker({
            dateFormat: 'yy-mm-dd' // Format the date as desired
        });

        // initialize datepicker for end date
        $("#EndDate").datepicker({
            dateFormat: 'yy-mm-dd' // Format the date as desired
        });     

        // initialize timepicker for start time
        $("#StartTime").timepicker({
            timeFormat: 'h:i A', // Format the time as desired (12-hour format with AM/PM)
            interval: 15, // Set the interval for time selection to 15 minutes
            minTime: '07:00 AM', 
            maxTime: '12:00 AM',
            scrollbar: true, 
            dropdown: true, 
            dynamic: false 
        });

        // initialize timepicker for end time
        $("#EndTime").timepicker({
            timeFormat: 'h:i A', // Format the time as desired (12-hour format with AM/PM)
            interval: 15, // Set the interval for time selection to 15 minutes
            minTime: '07:00 AM',
            maxTime: '12:00 AM', 
            scrollbar: true, 
            dropdown: true, 
            dynamic: false 
        });

    });
</script>

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
    });
</script>

<!-- Adding Libraries -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- loading Bootstrap Date/Time Picker library -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<!-- loading jQuery Timepicker library -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>

<!-- loading Moment.js library for time manipulation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

<!-- initialize datepicker and timepicker -->
<script>
    $(function() {
        // initialize for start date
        $("#StartDate").datepicker({
            dateFormat: 'yy-mm-dd' // Format the date as desired
        });

        // initialize datepicker for end date
        $("#EndDate").datepicker({
            dateFormat: 'yy-mm-dd' // Format the date as desired
        });     

        // initialize timepicker for start time
        $("#StartTime").timepicker({
            timeFormat: 'h:i A', // Format the time as desired (12-hour format with AM/PM)
            interval: 15, // Set the interval for time selection to 15 minutes
            minTime: '07:00 AM', 
            maxTime: '12:00 AM',
            scrollbar: true, 
            dropdown: true, 
            dynamic: false 
        });

        // initialize timepicker for end time
        $("#EndTime").timepicker({
            timeFormat: 'h:i A', // Format the time as desired (12-hour format with AM/PM)
            interval: 15, // Set the interval for time selection to 15 minutes
            minTime: '07:00 AM',
            maxTime: '12:00 AM', 
            scrollbar: true, 
            dropdown: true, 
            dynamic: false 
        });

    });
</script>
@endpush
