<nav class="main-nav text-light text-center pt-3">
    <h1 class="text-light text-center">Acro Cup Burgas</h1>
    <div class="menu">
        @auth
            <a href="{{ url('/app') }}">Control-Panel</a>
        @else
            <a class="navi-link" data-toggle="modal" data-target="#registrationModal">Registration</a>
        @endauth
        <br>
        <a class="navi-link directive-download" href="/directive/{{$competition->id}}">Directives</a>
    </div>
</nav>
