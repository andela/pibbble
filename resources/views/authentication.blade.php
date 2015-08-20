@extends('master')
@section('title', 'Home')
@section('content')
<div class="container">
  <div class="row banner">
    <div class="col-md-12">
      <div class="col-md-8">
        <div class="text-center">
          <img src="http://placehold.it/600x250">
        </div>
      </div>
      <div class="col-md-4">
        <!--        -->
        <div>
          <div>
            <div>
              <div>
                <div class="space">
                  <div class="tab" id="signUp">Sign up</div>
                  <div class="tab" id="logIn">Log in</div>
                </div>
              </div>
              <div>
                <!-- signup form start -->
                <div id="signUpForm">
                  <div>
                    <div>
                      <form>
                        <div class="space">
                          <input placeholder="Email" size="30" tabindex="1" type="text">
                        </div>
                        <div class="space">
                          <input placeholder="Username" size="30" tabindex="2" type="text">
                        </div>
                        <div class="space">
                          <input placeholder="Password" size="30" tabindex="3" type="password">
                        </div>
                        <input type="submit" value="Get started!" class="space">
                        <div class="space">
                          <div>
                            <small>Or sign up with:</small>
                          </div>
                        </div>
                        <div class="space">
                          <a href="#">
                            <div class="tab">
                              <img src="{!! asset('img/GitHub-Mark-32px.png') !!}" height="32" width="32">
                            </div>
                          </a>
                          <a href="#">
                            <div class="tab">
                              <img src="{!! asset('img/TwitterLogo55acee.png') !!}" height="32" width="32">
                            </div>
                          </a>
                          <a>
                            <div class="tab">
                              <img src="{!! asset('img/logo_Linkedin.png') !!}" height="32" width="32">
                            </div>
                          </a>
                        </div>
                        <div class="space">
                          <div>
                            <small>
                              By signing up, you agree to our
                              <a>Terms of service</a>
                            </small>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- signup form end -->
                <!-- login form start-->
                <div id="logInForm">
                  <div>
                    <div>
                      <form>
                        <div class="space">
                          <input placeholder="Email or username" size="30" tabindex="1" type="text">
                        </div>
                        <div class="space">
                          <input placeholder="Password" size="30" tabindex="2" type="password">
                        </div>
                        <div class="space">
                          <small>
                            <input type="checkbox">
                            <label>Remember me</label>
                          </small>
                        </div>
                        <input type="submit" value="Login" class="space">
                        <div class="space">
                          <div>
                            <small>Or login with:</small>
                          </div>
                        </div>
                        <div class="space">
                          <a href="#">
                            <div class="tab">
                              <img src="{!! asset('img/GitHub-Mark-32px.png') !!}" height="32" width="32">
                            </div>
                          </a>
                          <a href="#">
                            <div class="tab">
                              <img src="{!! asset('img/TwitterLogo55acee.png') !!}" height="32" width="32">
                            </div>
                          </a>
                          <a>
                            <div class="tab">
                              <img src="{!! asset('img/logo_Linkedin.png') !!}" height="32" width="32">
                            </div>
                          </a>
                        </div>
                        <div class="space">
                          <div>
                            <small>
                              <a>Forgot your password?</a>
                            </small>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- login form end-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection