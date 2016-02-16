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
                <a href="#" class="btn btn-primary btn-small hire">Hire Us</a>
                @endcan

                <button id="followTeam" data-id="{{ $team->id }}" class="btn btn-primary">{{ $team->checkFollow() ? 'Following' : 'Follow' }}</button>

                @can('user-in-team-can-see', $team->id)
                    <button id="uploadTeam" data-toggle="modal" data-target="#myUpload" class="btn btn-primary">Upload Team Project</button>
                @endcan

                @can('owner-can-see', $team->user_id)
                    <a href="{{ url('/teams/'.$team->name.'/settings') }}" class="btn btn-primary hire"><i class="fa fa-cog"></i></a>
                @endcan
            </div>
        </div>
    </nav>