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
                        <img src="{{ $user->getAvatar() }}" class="img-circle img-responsive dev-avatar" />
                    </div>
                    <div class="dev-info">
                        <h4>{{ $user->username }}</h4>
                        San Fransisco, Carlifonia<br />
                        Skills, skills, and more skills<br />
                        <p><b>1,234</b><br />Followers</p>
                    </div>
                    <div class="dev-projs">
                         @foreach($user->projects as $projects)
                            @if ($userProjectsCount < 3)
                                <a href="#">
                                    <img src="{{ $projects->image_url }}" class="img-responsive dev-projs-thumbs" />
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