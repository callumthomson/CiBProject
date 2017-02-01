@extends('bootstrap')

@section('body')
    @include('navbar.navbar')
    @include('pages.approvetimesheets.partials.breadcrumbs')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check" aria-hidden="true"></i> {{ Session::get('success') }}
            </div>
        @endif
        <h1>Unapproved Timesheets <small>Approve or Reject timesheets submitted by project members for  {{ $project->name }}</small></h1>
        <table class="table table-striped">
            <tr>
                <th>Username</th>
                <th>Created</th>
                <th>Task</th>
                <th>Date</th>
                <th>Hours</th>
                <th>Actions</th>
            </tr>
            @foreach($project->tasks as $task)
                @foreach($task->entries as $entry)
                    @if($entry->approved == 0)
                        <tr>
                            <td>{{ $entry->user->username }}</td>
                            <td>{{ $entry->created_at->diffForHumans() }}</td>
                            <td>{{ $entry->task->name }}</td>
                            <td>{{ $entry->date->toDateString() }}</td>
                            <td>{{ $entry->hours_spent }}</td>
                            <td>
                                <a class="btn btn-success" href="/approveTimesheet/{{ $entry->entry_id }}" role="button"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
                                <a class="btn btn-danger" href="/rejectTimesheet/{{ $entry->entry_id }}" role="button"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </table>
    </div>
@endsection