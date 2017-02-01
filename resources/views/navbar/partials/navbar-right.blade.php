<ul class="nav navbar-nav navbar-right">
    <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->username }}</a></li>
    <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> {{ Auth::user()->department->name }}</a></li>
    <li><a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i> {{ Auth::user()->role->name }}</a></li>
    <li><a href="/auth/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
</ul>