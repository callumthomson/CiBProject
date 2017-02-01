@extends('bootstrap')

@section('body')
    @include('navbar.navbar')
    @include('pages.timesheets.partials.breadcrumbs')
    <div class="container">
        <h1>Show Approved Timesheets <small>Show all approved timesheets for {{ $project->name }}</small></h1>
        <table class="table table-striped">
            <tr>
                <th>Username</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Task</th>
                <th>Date</th>
                <th>Hours</th>
            </tr>
            @foreach($project->tasks as $task)
                @foreach($task->entries as $entry)
                    @if($entry->approved == 1)
                    <tr>
                        <td>{{ $entry->user->username }}</td>
                        <td>{{ $entry->created_at->diffForHumans() }}</td>
                        <td>{{ $entry->updated_at->diffForHumans() }}</td>
                        <td>{{ $entry->task->name }}</td>
                        <td>{{ $entry->date->toDateString() }}</td>
                        <td>{{ $entry->hours_spent }}</td>
                    </tr>
                    @endif
                @endforeach
            @endforeach
        </table>
    </div>
@endsection