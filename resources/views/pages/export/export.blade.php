@extends('bootstrap')

@section('body')
@include('navbar.navbar')
@include('pages.export.partials.breadcrumbs')
<div class="container">
    <h1>Export all data to csv files</h1>
    <p>
        All stored data can be exported as a CSV file to be used with other applications and to generate reports
    </p>
    <p>
        To export all data as a CSV, click the button below
    </p>
    <a class="btn btn-default" href="/export/download" role="button"><i class="fa fa-cogs" aria-hidden="true"></i> Export CSV</a>
    <h2>Formats</h2>
    <p>
        All timestamps are in UNIX time
    </p>
    <strong>activities.csv</strong>
    <blockquote>
        <p>
            <code>activity_id</code>, <code>created_at</code>, <code>updated_at</code>, <code>name</code>
        </p>
    </blockquote>
    <strong>customers.csv</strong>
    <blockquote>
        <p>
            <code>customer_id</code>, <code>created_at</code>, <code>updated_at</code>, <code>name</code>
        </p>
    </blockquote>
    <strong>departments.csv</strong>
    <blockquote>
        <p>
            <code>department_id</code>, <code>created_at</code>, <code>updated_at</code>, <code>name</code>, <code>budget</code>
        </p>
    </blockquote>
    <strong>project_users.csv</strong>
    <blockquote>
        <p>
            <code>project_id</code>, <code>user_id</code>
        </p>
    </blockquote>
    <strong>projects.csv</strong>
    <blockquote>
        <p>
            <code>project_id</code>, <code>created_at</code>, <code>updated_at</code>, <code>name</code>, <code>status</code>, <code>manager_user_id</code>, <code>customer_id</code>
        </p>
    </blockquote>
    <strong>roles.csv</strong>
    <blockquote>
        <p>
            <code>role_id</code>, <code>created_at</code>, <code>updated_at</code>, <code>name</code>, <code>rate</code>
        </p>
    </blockquote>
    <strong>tasks.csv</strong>
    <blockquote>
        <p>
            <code>task_id</code>, <code>created_at</code>, <code>updated_at</code>, <code>project_id</code>, <code>name</code>
        </p>
    </blockquote>
    <strong>timesheet_entries.csv</strong>
    <blockquote>
        <p>
            <code>entry_id</code>, <code>created_at</code>, <code>updated_at</code>, <code>task_id</code>, <code>activity_id</code>, <code>user_id</code>, <code>date</code>, <code>hours_spent</code>, <code>approved</code>
        </p>
    </blockquote>
    <strong>users.csv</strong>
    <blockquote>
        <p>
            <code>user_id</code>, <code>created_at</code>, <code>updated_at</code>, <code>username</code>, <code>department_id</code>, <code>role_id</code>
        </p>
    </blockquote>

</div>
@endsection