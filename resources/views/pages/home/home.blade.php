@extends('bootstrap')

@section('body')
@include('navbar.navbar')
@include('pages.home.partials.breadcrumbs')
<div class="container">
    <h2>Kingfisher IT Services Timesheet</h2>
    <h3>Employee Homepage</h3>


    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Month
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="Week-project.html">January</a></li>
            <li><a href="#">Febuary</a></li>
            <li><a href="#">March</a></li>
            <li><a href="#">April</a></li>
            <li><a href="#">May</a></li>
            <li><a href="#">June</a></li>
            <li><a href="#">July</a></li>
            <li><a href="#">August</a></li>
            <li><a href="#">September</a></li>
            <li><a href="#">November</a></li>
            <li><a href="#">December</a></li>
        </ul>
    </div>
</div>
@endsection