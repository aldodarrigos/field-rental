<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

    </div>
    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle count-info" href="/" target='_blank'>
                Go to website
            </a>
        </li>
        <li>
            <form method="POST" action="/logout">
                @csrf
                <a href="/logout"
                onclick="event.preventDefault(); this.closest('form').submit();"> <i class="fas fa-sign-out-alt"></i> Log out</a>
            </form>
        </li>
    </ul>
</nav>