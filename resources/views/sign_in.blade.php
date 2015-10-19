@extends('master')
@section('title', 'Sign In')
@section('content')
<div class="container">
  <div align="center" class="row">
        <div class="mui-panel width_400 padding_40">
          <legend align="center">Sign In</legend>
          <form>
            <div class="mui-form-group">
              <input class="mui-form-control" placeholder="Email" type="email">
            </div>
            <div class="mui-form-group">
              <input class="mui-form-control" placeholder="Password" type="password">
            </div>
            <div align="left" class="mui-checkbox">
              <label><input type="checkbox"> Remember me</label>
            </div>
            <div align="center" class="mui-form-group">
              <button class="mui-btn" type="submit">Log In</button>
            </div>
            <div align="left">
              Or log in with:
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
            <div align="left" class="mui-form-group">
              <a href="/password/email">Forgot your password?</a>
            </div>
          </form>
        </div>
  </div>
</div>
@endsection
