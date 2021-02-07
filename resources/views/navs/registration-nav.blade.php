<nav class="navbar navbar-expand-lg navbar-dark bg-secondary w-100">
    <span class="navbar-brand d-sm-none">Registraion</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        @if (Main::administrate())
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Main page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link get-page" id="competitions">Competitions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link get-page" id="messages">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link get-page" id="settings">Settings</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="dropdown-item logout-link" href="{{ route('logout') }}">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link get-page" id="nominative">Nominative</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link get-page" id="provisional">Provisional</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link get-page" id="accommodation">Accommodation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link get-page" id="tarif-sheet">
                        <i class="fas fa-file-download text-success"></i> Tarif sheet
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link get-page" id="visa-request">
                        <i class="fas fa-file-download text-success"></i> Visa request
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle font-weight-bold" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/">Main page</a>
                        <a class="dropdown-item get-page active" id="profile">Club profile</a>
                        <a class="dropdown-item logout-link" href="{{ route('logout') }}">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        @endif
    </div>
</nav>
