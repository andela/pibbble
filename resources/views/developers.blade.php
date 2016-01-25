@extends('layouts.master')
@section('title', 'Developers')

@section('content')
    <div class="container-fluid dev-list">
        <div class="row dev-list-header">
            <div class="col-md-12">
                <h3>Find Developers <span style="color: #888;">by availability, location, skills, and more</span></h3>
            </div>
        </div>
        @foreach ($users as $user)
            <?php $userProjectsCount = 0; ?>
            <div class="row dev">
                <div class="col-md-12">
                    <div class="dev-avatar-frame">
                        <a href="/{{ $user->username }}">
                        <img src="{{ $user->getAvatar() }}" class="img-circle img-responsive dev-avatar" />
                        </a>
                    </div>
                    <div class="dev-info">
                        <a href="/{{ $user->username }}" class="dev-names"><h4>{{ $user->username }}</h4></a>
                        {{ $user->location }}<br />
                        {{ $user->skills }}<br />
                         <div class="l-separator"><b>{{ $user->projects->count() }}</b><br />projects</div>
                         <div class="r-separator"><b>1,234</b><br />followers</div>
                    </div>
                    <div class="dev-projs">
                        @foreach($user->projects as $project)
                            @if ($userProjectsCount < 3)
                                <a href="/developers/projects/{{ $project->id.'-'.str_replace(' ', '-', $project->projectname) }}">
                                    <img src="{{ $project->image_url }}" class="img-responsive dev-projs-thumbs" />
                                </a>
                            @endif
                            <?php $userProjectsCount++; ?>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center">
        {!! $users->render() !!}
    </div>
@endsection