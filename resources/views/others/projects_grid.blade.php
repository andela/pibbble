<script src="/js/like.js"></script>
@foreach ($projects as $project)
    <div class='projects-container'>
        <div class='projects'>
            <!-- Trigger modal window when a project thumbnail is clicked -->
            <a href="" data-toggle="modal" data-target="#{{ $project->id }}"><img src='{{ $project->url }}' width='200' height='150' /></a>
            <span class='project-stats'><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->projectLikes->count() }}</span>
            <span class='project-stats'><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}</span>
        </div>
        <span class='projects-name'>
            <a href="" data-toggle="modal" data-target="#{{ $project->id }}">{{ $project->projectname }}</a>
        </span>
    </div>

    <!-- Modal window -->
    <div class="modal fade-lg" id="{{ $project->id }}" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <br />
                    <h3 class="modal-title">{{ $project->projectname }}</h3>
                    <p>by <a href="{{ route('userprofile', $project->user->username) }}">{{ $project->user->username}}</a></p>
                </div>
                <div class="modal-body">
                    <div class="modal-left">
                        <img src='{{ $project->url }}' width="600" height="400" class="img-responsive" />
                        <div class="modal-right">
                            <p>
                                <!-- if already liked -->
                                <a href="#" id="like-link" onclick="like({{ $project->id }}, true);" style="color:red;">
                                    <i class='fa fa-thumbs-o-up'></i>
                                </a>
                                <!-- else -->
                                <a href="#" id="like-link" onclick="like({{ $project->id }}, false);" style="color:#2296cc;">
                                    <i class='fa fa-thumbs-o-up'></i>
                                </a>
                                <!-- end  if -->
                                <span id="ajaxResponse">{{ $project->likes }}</span>&nbsp;likes
                            </p>
                            <p><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}&nbsp;views</p>
                        </div>
                    </div>
                    <br clear="left">
                    <p>{{ $project->description }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
<!-- Pagination -->
<div class="row text-center">
    {!! $projects->render() !!}
</div>
