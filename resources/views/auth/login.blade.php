@extends('master')
@section('title', 'Log in')
@section('content')
<div class="container">
  <div align="center" class="row">
        <div class="mui-panel width_400 padding_40">
          <legend align="left">Log in</legend>
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
              <label><input type="checkbox"> Remember me</label>
            </div>
            <div align="left" class="mui-form-group">
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
              <a>Forgot your password?</a>
            </div>
          </form>
        </div>
  </div>
</div>
@endsection
