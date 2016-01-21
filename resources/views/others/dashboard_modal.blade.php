  <!-- Hire Modal -->
  <div class="modal fade" id="myHire" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          @if(Auth::user())
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Contact {{ Auth::user()->username }} about Work</h4>
          </div>
          <div class="modal-body">
            <p>From:   <img class="avatar" src="{{ Auth::user()->getAvatar() }}" /> {{ Auth::user()->username }}

            <hr>
            <p>To:     <img class="avatar" src="{{ $user->getAvatar() }}" /> {{ $user->username }}

            <hr>
            <div class="form-group">
                <label for="message"><span class="glyphicon glyphicon-envelope"></span> Type Message Here</label>
                <textarea type="text" class="form-control" id="message" placeholder="Mail to"></textarea>
            </div>
          </div>
          @else
              <div>Please log in to contact developer.</div>
          @endif
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
      <script src="/js/project_upload.js"></script>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Project</h4>
        </div>
        <div class="modal-body">
          <form id="uploadForm" role="form-group" method="post" action="{{ route('projects.store') }}" onsubmit="showLoader()">
            <div class="form-group">
              <label for="name"><i class="fa fa-file fa-lg"></i> Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Pibbble" required>
              @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="description"><i class="fa fa-info fa-lg"></i> Description</label>
              <textarea type="text" name="description" class="form-control" id="description" placeholder="A show and tell for Codeweavers" minlength="15"></textarea>
              @if ($errors->has('description'))
                    <span class="help-block">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="technologies"><i class="fa fa-cog fa-lg"></i> Technologies</label>
              <input type="text" name="technologies" class="form-control" id="technologies" placeholder="PHP, JavaScript, HTML, Firebase." required>
              @if ($errors->has('technologies'))
                    <span class="help-block">{{ $errors->first('technologies') }}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="upload"><i class="fa fa-cloud-upload fa-lg"></i> Upload</label>
              <input type="text" name="project_url" class="form-control" id="upload" placeholder="http://www.pibbble.com" required>
              @if ($errors->has('project_url'))
                    <span class="help-block">{{ $errors->first('project_url') }}</span>
                @endif
              <div id="errors" class="red_message"></div>
              <br>
            </div>
        <div class="modal-footer">
          <div class="pull-left">
            <img src='/img/33.gif' style="display:none;" id="form-load-img"/>
          </div>
          <button type="submit" class="btn btn-primary" id="uploadSubmit">Upload</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    </div>
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
              @if($user->bio)
                <p>{{ $user->bio }}</p>
              @else
                <p>Bio is yet to be updated</p>
              @endif
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
              <input type="text" name="projectname" class="form-control" id="editname" value="">
              @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="description"><span class="glyphicon glyphicon-blackboard"></span> Description</label>
              <textarea type="text" name="description" class="form-control" id="editdescription"  ></textarea>
              @if ($errors->has('description'))
                    <span class="help-block">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="technologies"><span class="glyphicon glyphicon-cog"></span> Technologies</label>
              <input type="text" name="technologies" class="form-control" id="edittechnologies"  value="">
              @if ($errors->has('technologies'))
                    <span class="help-block">{{ $errors->first('technologies') }}</span>
                @endif
            </div>
        </div>
        <div class="modal-footer">
          <div class="pull-left">
            <img src='/img/33.gif' style="display:none;" id="form-load-img"/>
          </div>
          <button type="submit" class="btn btn-primary">Save Changes</button>
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
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Skills</h4>
            </div>
            <div class="modal-body">
                @if($user->skills)
                @foreach(explode(', ', $user->skills) as $skill)
                    <button class="btn btn-md">{{ $skill }}</button>
                @endforeach
                @else
                    <p>No Skill updated yet!</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
