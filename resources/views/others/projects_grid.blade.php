<script src="{{ load_asset('/js/like.js') }}"></script>
@foreach ($projects as $project)
    <?php
        $ajaxResponse = 'proj'.$project->id;
        $likeLink = 'link'.$project->id;
    ?>
    <div class='projects-container'>
        <div class='projects'>
            <!-- Trigger modal window when a project thumbnail is clicked -->
            <a href="" data-toggle="modal" data-target="#{{ $project->id }}"><img src='{{ $project->image_url }}' width='200' height='150' /></a>
            <span class='project-stats'><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->likes }}</span>
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
                    <p>by <a href="{{ route('userprofile', $project->user->username) }}" class="no-decoration">{{ $project->user->username }}</a></p>
                </div>
                <div class="modal-body">
                    <div class="modal-left">
                        <img src='{{ $project->image_url }}' width="600" height="400" class="img-responsive" />
                        <div class="modal-right">
                            <p>
                                @if(Auth::user())
                                    <a href="#" id="{{ $likeLink }}" onclick="like({{ $project->id }}, {{ $project->projectLikes->count() }}, '{{ $ajaxResponse }}', '{{ $likeLink }}');">
                                        <i class='fa fa-thumbs-o-up'></i>
                                        <span id="{{ $ajaxResponse }}">{{ $project->projectLikes->count() }}</span>&nbsp;Likes
                                    </a>
                                @else
                                    <i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->projectLikes->count() }}&nbsp;Likes
                                @endif
                            </p>
                            <p><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}&nbsp;Views</p>
                        </div>
                    </div>
                    <br clear="left">
                    <p>{{ $project->description }}</p>
                </div>
                @if(count($project->comments) > 0)
                    <div>
                        <h4>{{ count($project->comments) }} Responses</h4>
                        @foreach($project->comments as $comments)
                          <div class="comment-wrapper">
                            <img src="{{ $comments->user->avatar }}" class="comment-img"/>
                            <span class="comment-username">
                              <a href="{{ route('userprofile', $comments->user->username) }}" style="text-decoration: none;">
                                {{ $comments->user->username }}
                              </a>
                            </span>
                            <div class="comment-comment">{{ $comments->comment }}</div>
                            <div class="comment-time">
                              {{ $comments->updated_at->diffForHumans() }}
                            </div>
                          </div>
                        @endforeach
                    </div>
                @endif
                @can('authusers-can-see')
                    <div class="container">
                        <form id="commentForm" role="form" method="POST" action="{{ url('/comment', $project->id)}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <span>
                            <div class="form-group">
                              <textarea name="comment" class="form-control" rows="5" id="comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-info comment-btn" style="margin-bottom: 4px;">Comment</button>
                            <span>
                        </form>
                    </div>
                @endcan
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
