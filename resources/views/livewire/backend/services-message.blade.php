<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
    <i class="fas fa-inbox"></i> @if ($count > 0) <span class="label label-info">{{$count}} @endif </span>
</a>

<ul class="dropdown-menu dropdown-messages">

    @foreach ($messages as $message)

    <li>
        <div class="dropdown-messages-box">
            <a class="dropdown-item float-left" href="/service-message/{{$message->message_id}}">
                <img alt="image" class="rounded-circle" src="https://icons.iconarchive.com/icons/xenatt/the-circle/512/App-Messages-icon.png">
            </a>
            <div class="media-body">
                <strong>{{$message->contact_name}}</strong> wrote a message by <strong>{{$message->service_name}}</strong>. <br>
                <small class="text-muted">{{$message->created_at}}</small>
            </div>
        </div>
    </li>

    <li class="dropdown-divider"></li>
        
    @endforeach

    <li>
        <div class="text-center link-block">
            <a href="/bservices-contact" class="dropdown-item">
                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
            </a>
        </div>
    </li>
</ul>
