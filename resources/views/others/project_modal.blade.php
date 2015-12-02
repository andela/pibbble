<div class='projects-container'>
    <div class='projects'>
        <a href="" data-toggle="modal" data-target="#{{ $project->id }}"><img src="{{ $project->url }}" width='200' height='150' style='border:0px solid #ccc;'>
                                        </a>
        <span class='project-stats'><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->likes }}</span>
        <span class='project-stats'><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}</span>
    </div>
    <span class='projects-name'><a href="">{{ $project->projectname }}</a></span> @if($user->username == Auth::user()->username)
    <a class="myEdit" data-action="{{ route('projects.update', $project->id) }}" data-url="{{ route('getMetaAsJSON', $project->id ) }}" href="#"><i class="fa fa-pencil-square-o fa-lg pull-right"></i></a> @endif
</div>
<!--Project Modal-->
<div class="modal fade-lg" id="{{ $project->id }}" role="dialog">
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
                    <img src='{{ $project->url }}' width="600" height="400" />
                    <div class="modal-right">
                        <p><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->views }}&nbsp;likes</p>
                        <p><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}&nbsp;views</p>
                    </div>
                </div>
                <br clear="left">
                <p>{{ $project->description }}</p>
            </div>
            <div class="modal-footer">
                {!! Form::open([ 'method' => 'DELETE', 'route' => ['projects.destroy', $project->id] ]) !!}
                @if($user->username == Auth::user()->username)
                {!! Form::submit('Delete Project ?', ['class' => 'btn btn-danger', 'id' => 'destroy']) !!}
                @endif {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
