@extends('bootstrap')

@section('body')
    @include('navbar.navbar')
    @include('pages.myprojects.partials.breadcrumbs')
    <div class="container">
        <h1>My Projects <small>Active projects managed by you</small></h1>
        <table class="table table-striped">
            <tr>
                <th>Project #</th>
                <th>Created</th>
                <th>Last Updated</th>
                <th>Name</th>
                <th>Status</th>
                <th>Customer</th>
                <th>Actions</th>
            </tr>
            @foreach(Auth::user()->projects as $project)
                @if($project->active)
                    <tr>
                        <td>{{ $project->project_id }}</td>
                        <td>{{ $project->created_at->diffForHumans() }}</td>
                        <td>{{ $project->updated_at->diffForHumans() }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->full_status }}</td>
                        <td>{{ $project->customer->name }}</td>
                        <td>
                            <a class="btn btn-success" href="/myprojects/{{ $project->project_id }}/approve" role="button"><i class="fa fa-check" aria-hidden="true"></i> Approve Timesheets</a>
                            <a class="btn btn-info" href="/myprojects/{{ $project->project_id }}/timesheets" role="button"><i class="fa fa-list" aria-hidden="true"></i> View Approved Timesheets</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection