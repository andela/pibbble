@extends('layouts.master')
@section('title', 'Developer Project')

@section('content')
    <script src="{{ load_asset('/js/like.js') }}"></script>
    <script src="{{ load_asset('/js/view.js') }}"></script>

    @include('shared.project_details_vars')

    <div class="fade-lg" id="{{ $project->id }}" role="dialog">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-9" style="border: 0px solid gray;">
                <div class="modal-header">
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
                                    <a href="#" id="{{ $modalLikesLink }}" onclick="like({{ $project->id }}, {{ $project->projectLikes->count() }}, '{{ $likesValueOnModal }}', '{{ $likesValueOnThumbnail }}', '{{ $modalLikesLink }}');">
                                        <i class='fa fa-thumbs-o-up'></i>
                                        <span id="{{ $likesValueOnModal }}">{{ $project->projectLikes->count() }}</span>&nbsp;Likes
                                    </a>
                                @else
                                    <i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->projectLikes->count() }}&nbsp;Likes
                                @endif
                            </p>
                            <p><i class='fa fa-eye'></i>&nbsp;<span>{{ $project->views }}</span>&nbsp;Views</p>
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
                            <div class="comment-comment" style="word-wrap: break-word;">{{ $comments->comment }}</div>
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
                              <textarea name="comment" class="form-control comment-box" rows="3" id="comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-info comment-btn btn-margin">Comment</button>
                            <span>
                        </form>
                    </div>
                @endcan
            </div>
            <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
@endsection