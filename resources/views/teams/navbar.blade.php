<nav class="navbar navbar-default" style="background-color: #fff; margin-top:-20px;">
        <div class="navbar-content">
            <div class="pull-left">
                <ul class="navbar-links">
                    <li><a href="" class="all-teams badge"><span class="name">{{ $team->name }}</span></a></li>
                    <li><a href=""><span class="count"> {{ $team->projects()->count() }}  </span><span class="criteria"> Projects</span></a></li>
                    <li><a href=""><span class="count" id="followersCount">{{ $team->followers()->count() }}  </span><span class="criteria"> Followers</span></a></li>
                    <li><a href=""><span class="count">{{ $team->members()->count() }}  </span><span class="criteria"> Members</span></a></li>
                </ul>
            </div>
            <div class="pull-right team-actions">

                @can('user-not-in-team-can-see', $team->id)
                <button class="btn btn-primary btn-small hire" data-toggle="modal" data-target="#hireTeam">Hire Us</button>
                @endcan

                @if(! Auth::guest())
                <button id="followTeam" data-id="{{ $team->id }}" class="btn btn-primary teamFollow">{{ $team->checkFollow() ? 'Following' : 'Follow' }}</button>
                @endif

                @can('user-in-team-can-see', $team->id)
                    <button id="uploadTeam" data-toggle="modal" data-target="#myUpload" class="btn btn-primary">Upload Team Project</button>
                @endcan

                @can('owner-can-see', $team->user_id)
                    <a id="uploadTeam" href="{{ url('/teams/'.$team->name.'/invite') }}" class="btn btn-primary">Invite</a>
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i></button>
                  <ul class="ddColor dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation" class="dashboard-item"><a role="menuitem" tabindex="-1" href="{{ url('/teams/'.$team->name.'/settings') }}">Settings </a></li>
                    <li role="presentation" class="profile-item"><a data-toggle="modal" data-target="#deleteModal" role="menuitem" tabindex="-1" href="#">Delete Team</a></li>
                  </ul>
                @endcan
            </div>
        </div>
    </nav>