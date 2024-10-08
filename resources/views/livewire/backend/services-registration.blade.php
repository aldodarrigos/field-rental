<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
    <i class="fas fa-book" title='Services Registration'></i> @if ($count > 0) <span class="label label-info">{{$count}} @endif </span>
</a>
<ul class="dropdown-menu dropdown-messages">

    @foreach ($new_players as $player)

    <li>
        <div class="dropdown-messages-box">
            <a class="dropdown-item float-left" href="/serv-registration-detail/{{$player->registration_id}}">
                <img alt="image" class="rounded-circle" src="https://icons.iconarchive.com/icons/xenatt/the-circle/512/App-Messages-icon.png">
            </a>
            <div class="media-body">
                <strong>{{$player->updated_at}}</strong> new player registered in {{$player->service_name}}. <br>
                <small class="text-muted">{{$player->updated_at}}</small>
            </div>
        </div>
    </li>

    <li class="dropdown-divider"></li>
        
    @endforeach

    <li>
        <div class="text-center link-block">
            <a href="/summerclin" class="dropdown-item">
                <i class="fa fa-envelope"></i> <strong>View all players</strong>
            </a>
        </div>
    </li>
</ul>
