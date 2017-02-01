@extends('bootstrap')

@section('body')
    <img src="/images/banner.png" class="img-responsive" alt="Responsive image">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <h2>Kingfisher IT Services <small>Timesheet Services</small></h2>
                @if(Session::has('errors'))
                    <div class="alert alert-danger" role="alert">
                        <ul>
                        @foreach(Session::get('errors') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{Session::get('error')}}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</h3>
                    </div>
                    <div class="panel-body">
                        <form action="auth/login" method="POST">

                            <label for="inputUsername">Username</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
                            </div>

                            <label for="inputPassword">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                            </div>

                            <div class="checkbox">
                                <input type="hidden" name="remember" value="0">
                                <label>
                                    <input type="checkbox" name="remember" value="1"> Remember Me
                                </label>
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary" role="button">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection