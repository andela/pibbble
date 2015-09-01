@extends('master')
@section('title', 'Auth')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <img src="{!! asset('img/writing-code.jpg') !!}" >
    </div>
    <div class="col-md-4">
      <ul class="mui-tabs">
        <li id="signUpTab" class="mui-active"><a data-mui-toggle="tab" data-mui-controls="pane-default-1">Sign Up</a></li>
        <li id="logInTab"><a data-mui-toggle="tab" data-mui-controls="pane-default-2">Log In</a></li>
      </ul>
      <div class="mui-tab-content">
        <div class="signUpForm mui-tab-pane mui-active mui-panel" id="pane-default-1">
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
              <button type="submit" class="mui-btn mui-btn-default mui-btn-raised">Creat Account</button>
            </div>
            <div class="mui-form-group">
              <span>Or sign up with:</span>
              <a href="#" class="mui-btn mui-btn-default mui-btn-raised">
                <img src="{!! asset('img/GitHub-Mark-32px.png') !!}" height="16" width="16">
              </a>
              <a href="#" class="mui-btn mui-btn-default mui-btn-raised">
                <img src="{!! asset('img/TwitterLogo55acee.png') !!}" height="16" width="16">
              </a>
              <a href="#" class="mui-btn mui-btn-default mui-btn-raised">
                <img src="{!! asset('img/logo_Linkedin.png') !!}" height="16" width="16">
              </a>
            </div>
            <div class="mui-form-group">
              Already have an account?
              <a id="logIn" class="mui-btn mui-btn-default mui-btn-raised">Log in</a>
            </div>
            <div class="mui-form-group">
              <small>
                By signing up, you agree to our
                <a href="/terms" class="mui-btn mui-btn-default mui-btn-raised">Terms of service</a>
              </small>
            </div>
          </form>
        </div>
        <div class="logInForm mui-tab-pane mui-panel" id="pane-default-2">
          <form>
            <div class="mui-form-group">
              <input class="mui-form-control" placeholder="Email" type="email">
            </div>
            <div class="mui-form-group">
              <input class="mui-form-control" placeholder="Password" type="password">
            </div>
            <div class="mui-checkbox">
              <label><input type="checkbox"> Remember me</label>
            </div>
            <div class="mui-form-group">
              <button class="mui-btn mui-btn-default mui-btn-raised" type="submit">Log In</button>
            </div>
            <div class="mui-form-group">
              Or log in with:
              <a href="#" class="mui-btn mui-btn-default mui-btn-raised">
                <img src="{!! asset('img/GitHub-Mark-32px.png') !!}" height="16" width="16">
              </a>
              <a href="#" class="mui-btn mui-btn-default mui-btn-raised">
                <img src="{!! asset('img/TwitterLogo55acee.png') !!}" height="16" width="16">
              </a>
              <a href="#" class="mui-btn mui-btn-default mui-btn-raised">
                <img src="{!! asset('img/logo_Linkedin.png') !!}" height="16" width="16">
              </a>
            </div>
            <div class="mui-form-group">
              Don't have an account?
              <a id="signUp" href="#" class="mui-btn mui-btn-default mui-btn-raised">Sign up</a>
            </div>
            <div class="mui-form-group">
              <a href="#" class="mui-btn mui-btn-default mui-btn-raised">Forgot your password?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection