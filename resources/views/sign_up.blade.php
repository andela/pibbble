@extends('master')
@section('title', 'Sign Up')
@section('content')
<div class="container">
  <div align="center" class="row">
        <div class="mui-panel width_400 padding_40">
          <legend align="left">Sign Up</legend>
          <form>
            <div class="mui-form-group">
              <input type="email" class="mui-form-control" id="email" placeholder="Email">
            </div>
            <div class="mui-form-group">
              <input type="text" class="mui-form-control" id="userName" placeholder="User name">
            </div>
            <div class="mui-form-group">
              <input type="password" class="mui-form-control" id="pwd" placeholder="Password">
            </div>
            <div class="mui-form-group">
              <input type="password" class="mui-form-control" id="cfmPwd" placeholder="Confirm Password">
            </div>
            <div align="left" class="mui-form-group">
              <button type="submit" class="mui-btn">Create Account</button>
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