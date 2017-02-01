@extends('bootstrap')

@section('body')
    @include('navbar.navbar')
    @include('pages.costcentreapproved.partials.breadcrumbs')
    <div class="container">
        <a class="btn btn-default" href="/costcentre" role="button"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Approve Timesheets</a>
        <h1>Approved Cost Centre Timesheets <small>View approved timesheets submitted by employees for cost centre activities</small></h1>
        <table class="table table-striped">
            <tr>
                <th>Username</th>
                <th>Created</th>
                <th>Activity</th>
                <th>Date</th>
                <th>Hours</th>
            </tr>
            @foreach(\App\TimesheetEntry::whereNotNull('activity_id')->get() as $entry)
                @if($entry->approved == 1)
                    <tr>
                        <td>{{ $entry->user->username }}</td>
                        <td>{{ $entry->created_at->diffForHumans() }}</td>
                        <td>{{ $entry->activity->name }}</td>
                        <td>{{ $entry->date->toDateString() }}</td>
                        <td>{{ $entry->hours_spent }}</td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection