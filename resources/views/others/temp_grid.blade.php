@foreach ($projects as $project)
    <div class='projects-container'>
    <div class='projects'>
    <a href=''><img src='/img/shot.png' width='200' height='150' style='border:0px solid #ccc;' /></a>
    <span class='project-stats'><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->likes }}</span>
    <span class='project-stats'><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}</span>
    </div>
    <span class='projects-name'>{{ $project->projectname }}</span>
    </div>
@endforeach

<!-- @for ( $i = 0; $i < 12; $i++ )
    <div class='projects-container'>
    <div class='projects'>
    <a href=''><img src='/img/shot.png' width='200' height='150' style='border:0px solid #ccc;' /></a>
    <span class='project-stats'><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->likes }}</span>
    <span class='project-stats'><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}</span>
    </div>
    <span class='projects-name'>{{ $project->projectname }}</span>
    </div>
@endfor -->