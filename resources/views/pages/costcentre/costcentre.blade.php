@extends('bootstrap')

@section('body')
    @include('navbar.navbar')
    @include('pages.costcentre.partials.breadcrumbs')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check" aria-hidden="true"></i> {{ Session::get('success') }}
            </div>
        @endif
        <a class="btn btn-default" href="/costcentre/approved" role="button"><i class="fa fa-list" aria-hidden="true"></i> Show Approved Timesheets</a>
        <h1>Approve Cost Centre Timesheets <small>Approve or Ignore timesheets submitted by employees for cost centre activities</small></h1>
        <table class="table table-striped">
            <tr>
                <th>Username</th>
                <th>Created</th>
                <th>Activity</th>
                <th>Date</th>
                <th>Hours</th>
                <th>Actions</th>
            </tr>
            @foreach(\App\TimesheetEntry::whereNotNull('activity_id')->get() as $entry)
                @if($entry->approved == 0)
                    <tr>
                        <td>{{ $entry->user->username }}</td>
                        <td>{{ $entry->created_at->diffForHumans() }}</td>
                        <td>{{ $entry->activity->name }}</td>
                        <td>{{ $entry->date->toDateString() }}</td>
                        <td>{{ $entry->hours_spent }}</td>
                        <td>
                            <a class="btn btn-success" href="/approveTimesheet/{{ $entry->entry_id }}" role="button"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                            <a class="btn btn-danger" href="/rejectTimesheet/{{ $entry->entry_id }}" role="button"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection