@foreach ($projects as $project)
    <div class='projects-container'>
        <div class='projects'>
            <a href=''><img src='{{ $project->url }}' width='200' height='150' style='border:0px solid #ccc;' /></a>
            <span class='project-stats'><i class='fa fa-thumbs-o-up'></i>&nbsp;{{ $project->likes }}</span>
            <span class='project-stats'><i class='fa fa-eye'></i>&nbsp;{{ $project->views }}</span>
        </div>
        <span class='projects-name'><a href="">{{ $project->projectname }}</a></span>
    </div>
@endforeach

<!-- Pagination -->
<div style="text-align:center;">
    {!! $projects->render() !!}
</div>