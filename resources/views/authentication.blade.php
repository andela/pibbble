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
      <div class="col-md-4 borderGray bgWhite">
        <!--        -->
        <div>
          <div>
            <div>
              <div >
                <!-- signup form start -->
                <div id="signUpForm">
                  <h4 class="space">Sign up</h4>
                  <div>
                    <div>
                      <form>
                        <div class="space">
                          <input class="form-control" placeholder="Email" size="30" type="text">
                        </div>
                        <div class="space">
                          <input class="form-control" placeholder="Username" size="30" type="text">
                        </div>
                        <div class="space">
                          <input class="form-control" placeholder="Password" size="30" type="password">
                        </div>
                        <div class="space">
                          <input class="form-control" type="submit" value="Create Account" class="space">
                        </div>
                        <div class="space">
                          <div>
                            Or sign up with:
                            <a href="#">
                              <div class="tab">
                                <img src="{!! asset('img/GitHub-Mark-32px.png') !!}" height="16" width="16">
                              </div>
                            </a>
                            <a href="#">
                              <div class="tab">
                                <img src="{!! asset('img/TwitterLogo55acee.png') !!}" height="16" width="16">
                              </div>
                            </a>
                            <a>
                              <div class="tab">
                                <img src="{!! asset('img/logo_Linkedin.png') !!}" height="16" width="16">
                              </div>
                            </a>
                          </div>
                        </div>
                        <div>
                          <div class="space">
                            Already have an account?
                            <a id="logIn">Log in</a>
                          </div>
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
                  <h4 class="space">Log in</h4>
                  <div>
                    <div>
                      <form>
                        <div class="space">
                          <input class="form-control" placeholder="Email" size="30" type="text">
                        </div>
                        <div class="space">
                          <input class="form-control" placeholder="Password" size="30" type="password">
                        </div>
                        <div class="space">
                          <small>
                            <input type="checkbox"> Remember me
                          </small>
                        </div>
                        <div class="space">
                          <input class="form-control" type="submit" value="Log In" class="space">
                        </div>
                        <div class="space">
                          <div>
                            Or log in with:
                            <a href="#">
                              <div class="tab">
                                <img src="{!! asset('img/GitHub-Mark-32px.png') !!}" height="16" width="16">
                              </div>
                            </a>
                            <a href="#">
                              <div class="tab">
                                <img src="{!! asset('img/TwitterLogo55acee.png') !!}" height="16" width="16">
                              </div>
                            </a>
                            <a>
                              <div class="tab">
                                <img src="{!! asset('img/logo_Linkedin.png') !!}" height="16" width="16">
                              </div>
                            </a>
                          </div>
                        </div>
                        <div>
                          <div class="space">
                            Don't have an account?
                            <a id="signUp">Sign up</a>
                          </div>
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