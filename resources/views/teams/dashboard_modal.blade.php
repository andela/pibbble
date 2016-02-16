<!-- Hire Us modal-->
<div class="modal fade" id="hireTeam" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          @if(Auth::user())
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Contact {{ $team->name }} about Work</h4>
          </div>
          <div class="modal-body">
            <p>From:   <img class="avatar" src="{{ Auth::user()->getAvatar() }}" /> {{ Auth::user()->username }}

            <hr>
            <p>To:     <img class="avatar" src="{{ $team->getAvatar() }}" /> {{ $team->name }}

            <hr>
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="message"><span class="glyphicon glyphicon-envelope"></span> Type Message Here</label>
                <textarea type="text" class="form-control" id="message" placeholder="Mail to"></textarea>
            </div>
          </div>
          @else
              <div>Please log in to contact developer.</div>
          @endif
          <div class="modal-footer">
          <div class='emailInfo alert alert-info' id='emailInfoDiv'>
                {{ $team->name }} will be notified shortly.
              <i class="fa fa-circle-o-notch fa-spin"></i>
          </div>
          <div class='emailResponse alert alert-success'>
              {{ $team->name }} has been notified with your message. You can close this dialog.
          </div>
            <button type="button" id="hireus" data-id="{{ $team->id }}" class="btn btn-primary">Send</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>


<div class="modal fade" id="myUpload" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <script src="/js/project_upload.js"></script>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Team Project</h4>
        </div>
        <div class="modal-body">
          <form id="uploadForm" role="form-group" method="post" action="{{ url('projects/new/'.$team->name) }}" onsubmit="showLoader()">
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
