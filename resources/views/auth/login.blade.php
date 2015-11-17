@extends('layouts.master')
@section('title', 'Log in')
@section('content')
<div class="container">
  <div align="center" class="row">
        <div class="mui-panel width_400 padding_40">
          <legend align="left">LOG IN</legend>
          <form method="POST" action="/auth/login">
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
              <input type="password" class="mui-form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div align="left" class="mui-checkbox">
              <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <div align="left" class="mui-form-group">
              <input type="submit" class="mui-btn" value="Log in">
            </div>
            <div align="left" class="mui-form-group">
                <p><span class="valign">Or log in with:</span>
                    <a href="/auth/github"><span class="footer-icons icon fa fa-github"></span></a>
                    <a href="/auth/twitter"><span class="footer-icons icon fa fa-twitter"></span></a>
                </p>
            </div>
            <div align="left" class="mui-form-group">
              <a href="/password/email">Forgot your password?</a>
            </div>
          </form>
        </div>
  </div>
</div>
@endsection
