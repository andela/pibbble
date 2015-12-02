  <!-- Hire Modal -->
  <div class="modal fade" id="myHire" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Contact {{ Auth::user()->username }} about Work</h4>
        </div>
        <div class="modal-body">
          <p>From:   <img class="avatar" src="{{ Auth::user()->getAvatar() }}" /> {{ $user->username }}

          <hr>
          <p>To:     <img class="avatar" src="{{ Auth::user()->getAvatar() }}" /> {{ Auth::user()->username }}

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

  <!--Edit Modal-->

  <div class="modal fade" id="myEdit" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Project</h4>
        </div>
        <div class="modal-body">
          <form id="editForm" role="form-group" method="post" action="{{ route('projects.update') }}" onsubmit="showLoader()">
            <div class="form-group">
              <label for="name"><span class="glyphicon glyphicon-file"></span> Name</label>
              <input type="text" name="projectname" class="form-control" id="editname" value="{{ $project->projectname }}">
              @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="description"><span class="glyphicon glyphicon-blackboard"></span> Description</label>
              <textarea type="text" name="description" class="form-control" id="editdescription"  >{{ $project->description }}</textarea>
              @if ($errors->has('description'))
                    <span class="help-block">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="technologies"><span class="glyphicon glyphicon-cog"></span> Technologies</label>
              <input type="text" name="technologies" class="form-control" id="edittechnologies"  value="{{ $project->technologies }}">
              @if ($errors->has('technologies'))
                    <span class="help-block">{{ $errors->first('technologies') }}</span>
                @endif
            </div>
        </div>
        <div class="modal-footer">
          <div class="pull-left">
            <img src='/img/33.gif' style="display:none;" id="form-load-img"/>
          </div>
          <button type="submit" class="btn btn-primary">Edit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
      </div>
    </div>
  </div>

<!-- Skills Modal -->
<div class="modal fade" id="mySkills" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Skills</h4>
            </div>
            <div class="modal-body">
                <p>{{ Auth::user()->skills }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
