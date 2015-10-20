@extends('master')
@section('title', 'Register')
@section('content')
<div class="container">
  <div align="center" class="row">
        <div class="mui-panel width_400 padding_40">
          <legend align="left">Register</legend>
          <form method="POST" action="/auth/register">
          {{ csrf_field() }}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{  $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mui-form-group">
              <input type="email" class="mui-form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="mui-form-group">
              <input type="text" class="mui-form-control" name="username" id="username" placeholder="User name" value="{{ old('userName') }}" required>
            </div>
            <div class="mui-form-group">
              <input type="password" class="mui-form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="mui-form-group">
              <input type="password" class="mui-form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <div align="left" class="mui-form-group">
              <input type="submit" class="mui-btn" value="Register">
            </div>
            <div align="left">
              <span>Or sign up with:</span>
              <a class="btn btn-social-icon btn-github">
                <i class="fa fa-github"></i>
              </a>
              <a class="btn btn-social-icon btn-twitter">
                <i class="fa fa-twitter"></i>
              </a>
              <a class="btn btn-social-icon btn-linkedin">
                <i class="fa fa-linkedin"></i>
              </a>
            </div>
          </form>
        </div>
  </div>
</div>
@endsection