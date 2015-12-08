@foreach ($user->projects as $project)
    <div class='projects-container'>
        <div class='projects'>
            <a href="" data-toggle="modal" data-target="#{{ $project->id }}"><img src="{{ $project->url }}" width='200' height='150' style='border:0px solid #ccc;'></a>
            <span class='project-stats'><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->likes }}</span>
            <span class='project-stats'><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}</span>
        </div>
        <span class='projects-name'><a href="" data-toggle="modal" data-target="#{{ $project->id }}">{{ $project->projectname }}</a></span>
        @if(Auth::user())
            @if($user->username == Auth::user()->username)
                <a class="myEdit" data-action="{{ route('projects.update', $project->id) }}" data-url="{{ route('getMetaAsJSON', $project->id ) }}" href="#"><i class="fa fa-pencil-square-o fa-lg pull-right"></i></a>
            @endif
        @endif
    </div>

    <!--Project Modal-->
    <div class="modal fade" id="{{ $project->id }}" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <br />
                    <h3 class="modal-title">{{ $project->projectname }}</h3>
                    <p>by</p> <a href="">{{ $project->user->username }}</a>
                </div>
                <div class="modal-body">
                    <div class="modal-left">
                        <img src='{{ $project->url }}' width="600" height="400" class="img-responsive" />
                        <div class="modal-right">
                            <p><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->views }}&nbsp;likes</p>
                            <p><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}&nbsp;views</p>
                        </div>
                    </div>
                    <br clear="left">
                    <p>{{ $project->description }}</p>
                    <hr>
                    @foreach(explode(', ', $project->technologies) as $tags)
                        <button class="btn btn-xs">{{ $tags }}</button>
                    @endforeach
                </div>
                <div class="modal-footer">
                    @if(Auth::user())
                        @if($user->username == Auth::user()->username)
                        <a type="button" class="btn btn-danger" href="/project/confirm/{{ $project->id }}">Delete</a>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        @else
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
