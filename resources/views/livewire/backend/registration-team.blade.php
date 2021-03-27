<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
    <i class="fas fa-shield-alt" title='Teams registration'></i> @if ($count > 0) <span class="label label-info">{{$count}} @endif </span>
</a>
<ul class="dropdown-menu dropdown-messages">

    @foreach ($new_crews as $crew)

    <li>
        <div class="dropdown-messages-box">
            <a class="dropdown-item float-left" href="/teams-detail/{{$crew->crew_id}}">
                <img alt="image" class="rounded-circle" src="https://icons.iconarchive.com/icons/xenatt/the-circle/512/App-Messages-icon.png">
            </a>
            <div class="media-body">
                <strong>{{$crew->crew_name}}</strong> new team registered in {{$crew->competition_name}}. <br>
                <small class="text-muted">{{$crew->updated_at}}</small>
            </div>
        </div>
    </li>

    <li class="dropdown-divider"></li>
        
    @endforeach

    <li>
        <div class="text-center link-block">
            <a href="/teams-dashboard" class="dropdown-item">
                <i class="fa fa-envelope"></i> <strong>View all teams</strong>
            </a>
        </div>
    </li>
</ul>
