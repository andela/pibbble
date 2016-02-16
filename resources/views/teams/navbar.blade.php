<nav class="navbar navbar-default" style="background-color: #fff; margin-top:-20px;">
        <div class="navbar-content">
            <div class="pull-left">
                <ul class="navbar-links">
                    <li><a href="" class="all-teams badge"><span class="name">TEAM</span></a></li>
                    <li><a href=""><span class="count">467  </span><span class="criteria"> Shots</span></a></li>
                    <li><a href=""><span class="count">54,697  </span><span class="criteria"> Followers</span></a></li>
                    <li><a href=""><span class="count">7  </span><span class="criteria"> Members</span></a></li>
                    <li><a href=""  class="dropdown dropdown-toggle" data-toggle="dropdown"><span class="criteria">More </span><span class="caret caret_color"></span></a></li>
                    <ul class="dropdown-menu">
                      <li><a href="#">HTML</a></li>
                      <li><a href="#">CSS</a></li>
                      <li><a href="#">JavaScript</a></li>
                    </ul>
                </ul>
            </div>
            <div class="pull-right team-actions">

                @can('user-not-in-team-can-see', $team->id)
                <a href="#" class="btn btn-primary btn-small hire">Hire Us</a>
                @endcan

                <button id="followTeam" data-id="{{ $team->id }}" class="btn btn-primary">Follow</button>

                @can('user-in-team-can-see', $team->id)
                    <button id="uploadTeam" data-toggle="modal" data-target="#myUpload" class="btn btn-primary">Upload Team Project</button>
                @endcan

                @can('owner-can-see', $team->user_id)
                    <a href="{{ url('/teams/'.$team->name.'/settings') }}" class="btn btn-primary hire"><i class="fa fa-cog"></i></a>
                @endcan
            </div>
        </div>
    </nav>