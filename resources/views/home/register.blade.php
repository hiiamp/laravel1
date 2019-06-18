@extends('layout.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Register</h3>
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
                @if(Session::has('Success'))
                    <div class="alert alert-success">{{Session::get('Success')}}</div>
                @endif
                <form action="register" method="POST">
                @csrf() <!--token function-->
                    <div class="form-group">
                        <label for="">Name*</label>
                        <input type="text" class="form-control" value="{{Session::get('name')}}" name="name" placeholder="Your name">
                    </div>

                    <div class="form-group">
                        <label for="">Email*</label>
                        <input type="email" class="form-control" value="{{Session::get('email')}}" name="email" placeholder="Your email">
                    </div>

                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" value="{{Session::get('phone')}}" name="phone" placeholder="Your phone">
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" value="{{Session::get('address')}}" name="address" placeholder="Your address">
                    </div>

                    <div class="form-group">
                        <label for="">Password*</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="">Password confirm*</label>
                        <input type="password" class="form-control" name="password_confirm" placeholder="Re-input your password">
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
