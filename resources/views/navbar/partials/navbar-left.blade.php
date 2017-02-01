<ul class="nav navbar-nav">
    <li @if($page=='myprojects') class="active" @endif><a href="/myprojects">My Projects</a></li>
    <li @if($page=='costcentre') class="active" @endif><a href="/costcentre">Cost Centre Timesheets</a></li>
    <li @if($page=='reports') class="active" @endif><a href="/reports">Reports</a></li>
    <li @if($page=='export') class="active" @endif><a href="/export">Export</a></li>
</ul>