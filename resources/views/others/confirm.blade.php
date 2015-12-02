@extends('layouts.master')
@section('title', 'Confirm Delete')

@section('content')
    <div class="container">
        <div class="error404" style="min-height: 180px">
            <h3>Are you Sure you want to delete {{ $project->projectname }} ?</h3>
                {!! Form::open([ 'method' => 'DELETE', 'route' => ['projects.destroy', $project->id] ]) !!}
                {!! Form::submit('Yes', ['class' => 'btn btn-danger btn-xlarge']) !!}
                {!! Form::button('No', ['class' => 'btn btn-info btn-xlarge','onclick' => "window.location='".route('projects.index')."'" ]) !!}
                {!! Form::close() !!}
        </div>
    </div>
@endsection







