@extends('layouts.master')
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
              <input type="text" class="mui-form-control" name="username" id="username" placeholder="User Name" value="{{ old('username') }}" required>
            </div>
            <div class="mui-form-group">
              <input type="email" class="mui-form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
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
             <div align="left" class="mui-form-group">
                <p><span class="valign">Or sign up with:</span>
                    <a href="/auth/github"><span class="footer-icons icon fa fa-github"></span></a>
                    <a href="/auth/twitter"><span class="footer-icons icon fa fa-twitter"></span></a>
                </p>
            </div>
          </form>
        </div>
  </div>
</div>
@endsection