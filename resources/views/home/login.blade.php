@extends('layout.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-7 col-md-offset-2">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            <li>{{$err}}</li>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('flag'))
                    <div class="alert alert-{{Session::get('flag')}}">{{Session::get('infor')}}</div>
                @endif
                @if(!Auth::check())
                    <form action="login" method="POST">
                        @csrf() <!--token function-->
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Your Email">
                        </div>

                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Your password">
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember">
                                Remember login?
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary pull-right">Login</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
