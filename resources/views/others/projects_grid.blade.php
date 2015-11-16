@foreach ($projects as $project)
    <div class='projects-container'>
        <div class='projects'>
            <!-- Trigger modal window when a project thumbnail is clicked -->
            <a href="" data-toggle="modal" data-target="#{{ $project->id }}"><img src='{{ $project->url }}' width='200' height='150' /></a>
            <span class='project-stats'><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->likes }}</span>
            <span class='project-stats'><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}</span>
        </div>
        <span class='projects-name'>
            <a href="" data-toggle="modal" data-target="#{{ $project->id }}">{{ $project->projectname }}</a>
        </span>
    </div>

    <!-- Modal window -->
    <div class="modal fade" id="{{ $project->id }}" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <br />
            <h3 class="modal-title">{{ $project->projectname }}</h3>
            by
          </div>
          <div class="modal-body">
            <div class="modal-left">
                <img src='{{ $project->url }}' />
                <div class="modal-right">
                    <p><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->views }}&nbsp;likes</p>
                    <p><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}&nbsp;views</p>
                </div>
            </div>
            <br clear="left">
            <p>{{ $project->description }}</p>

            <p>Music and event concept I am currently working on. Locate artists in your city, listen and purchase their music. Attend and buy tickets for events. Connected to the most common music streaming services and Resident Advisor for the events.</p>

            <p>Hope you like it and feel ready for the weekend! Press "L" on your keyboard if you do, and follow me to catch my upcoming work.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@endforeach

<!-- Pagination -->
<div style="text-align:center;">
    {!! $projects->render() !!}
</div>