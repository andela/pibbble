@extends('layouts.master')
@section('title', 'Dashboard')

@endsection

@section('custom-css')
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-social.css') }}"> <!-- Resource style -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- CSS reset -->
@endsection

@section('content')
<div class="container-fluid ball">
        <div class="container">
        @include('layouts.partials.alerts')
            <div class="fb-profile">
                <img align="left" class="fb-image-lg" src="http://i58.tinypic.com/2464bc2.jpg" alt="Profile image example" / height="351px" width="815px">
                <img align="left" class="fb-image-profile thumbnail" src="{{ Auth::user()->getAvatar() }}" alt="Profile image example" border-radius="100%">
                <div class="fb-profile-text red col-md-8 col-xs-3">
                    <h1> {{ Auth::user()->username }}</h1>
                    <p>{{ Auth::user()->job }}</p>
                    <p>{{ Auth::user()->location }}</p>
                </div>
            </div>
            <div class="well well-sm makeup">
                <div class="span12">
                    <a class="btn btn-social-icon btn-twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-social-icon btn-google">
                        <i class="fa fa-google"></i>
                    </a>
                    <a class="btn btn-social-icon btn-facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-social-icon btn-linkedin">
                        <i class="fa fa-linkedin"></i>
                    </a>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myUpload"><span class="glyphicon glyphicon-cloud-upload"></span> Upload</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myBio"><span class="glyphicon glyphicon-eye-open"></span> Bio</button>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-log-in" onclick="change()" type="button" value="Follow" id="myButton1"></span> Follow</button>
                        <button type="button" class="btn btn-primary" id="menu1" data-toggle="dropdown" data-target="#myModal"><span class="glyphicon glyphicon-folder-open"></span> Skills<span class="caret"></span></button>
                        <ul class="ddColor dropdown-menu" role="menu" aria-labelledby="menu1">
                          <li role="presentation"><a role="menuitem" tabindex="-1">HTML</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">CSS</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">JavaScript</a></li>
                        </ul>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myHire"><span class="glyphicon glyphicon-user"></span> Hire Me</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>Activity Feed</h4></div>
                        <div class="panel-body">
                            <p>Following <span class="badge pull-right">5</span></p>
                            <hr>
                            <p>Followers <span class="badge pull-right">10</span></p>
                            <hr>
                            <p>Projects <span class="badge pull-right">{{ $projects->count() }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>My Projects</h4></div>
                        <div class="panel-body">
                            @if( $projects )
                            <div class="row">
                                @foreach ($projects as $project)
                                <div class='projects-container'>
                                    <div class='projects'>
                                        <a href=''><img src="{{ $project->url }}" width='200' height='150' style='border:0px solid #ccc;'>
                                        </a>
                                        <span class='project-stats'><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->likes }}</span>
                                        <span class='project-stats'><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}</span>
                                    </div>
                                    <span class='projects-name'><a href="">{{ $project->projectname }}</a></span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if( $projects->isEmpty() )
                           <h3>There are currently no Projects</h3>
                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Hire Modal -->
  <div class="modal fade" id="myHire" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Contact {{ Auth::user()->username }} About Work</h4>
        </div>
        <div class="modal-body">
          <p>From:   <img class="avatar" src="{{ Auth::user()->getAvatar() }}" /> {{ Auth::user()->username }}
          <span>'<'{{ Auth::user()->email }}'>'</span></p>
          <hr>
          <p>To:     <img class="avatar" src="{{ Auth::user()->getAvatar() }}" /> {{ Auth::user()->username }}
          <span>'<'{{ Auth::user()->email }}'>'</span></p>
          <hr>
          <p>Cc:     <input type="checkbox"> Send me a copy of this mail</p>
          <hr>
          <div class="form-group">
              <label for="message"><span class="glyphicon glyphicon-envelope"></span> Type Message Here</label>
              <textarea type="text" class="form-control" id="message" placeholder="Mail to"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Send</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Upload Modal -->
  <div class="modal fade" id="myUpload" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Project</h4>
        </div>
        <div class="modal-body">
          <form role="form-group" method="post" action="{{ route('projects.store') }}" onsubmit="showLoader()">
            <div class="form-group">
              <label for="name"><span class="glyphicon glyphicon-file"></span> Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Pibbble" required>
              @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="description"><span class="glyphicon glyphicon-blackboard"></span> Description</label>
              <textarea type="text" name="description" class="form-control" id="description" placeholder="A show and tell for Codeweavers" required></textarea>
              @if ($errors->has('description'))
                    <span class="help-block">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="technologies"><span class="glyphicon glyphicon-cog"></span> Technologies</label>
              <input type="text" name="technologies" class="form-control" id="technologies" placeholder="PHP, JavaScript, HTML, Firebase." required>
              @if ($errors->has('technologies'))
                    <span class="help-block">{{ $errors->first('technologies') }}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="upload"><span class="glyphicon glyphicon-upload"></span> Upload</label>
              <input type="text" name="url" class="form-control" id="upload" placeholder="http://www.pibbble.com" required>
              @if ($errors->has('url'))
                    <span class="help-block">{{ $errors->first('url') }}</span>
                @endif
            </div>
        </div>
        <div class="modal-footer">
          <div class="pull-left">
            <img src='/img/33.gif' style="display:none;" id="form-load-img"/>
          </div>
          <button type="submit" class="btn btn-primary">Upload</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
      </div>
    </div>
  </div>
  <!-- Bio Modal -->
  <div class="modal fade" id="myBio" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Bio</h4>
        </div>
        <div class="modal-body">
          <p>{{ Auth::user()->bio }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>
<!-- <script type="text/javascript">
  function showLoader(){
    document.getElementById('form-load-img').style.display = 'block';
  }
</script> -->
@endsection

