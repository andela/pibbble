@extends('layouts.master')
@section('title', 'Reset password')

@section('content')
  <div style="min-height: 402px">
    <h3 align="center">Provide your e-mail address to reset your password</h3>
    <div class="container">
      <div align="center" class="row">
          <div class="mui-panel width_400 padding_40">
            <legend align="center">Reset Password</legend>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="/password/email">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="mui-form-group">
                  <input class="mui-form-control" placeholder="E-mail address" name="email" type="email" required>
                </div>

                <div align="center" class="mui-form-group">
                  <button class="mui-btn" name="reset" type="submit">Reset</button>
                </div>
            </form>

          </div>
      </div>
    </div>
  </div>
@endsection
