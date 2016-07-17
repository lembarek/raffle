<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="/">Raffle Events</a></li>
            <li class="{{ Request::segment(1) == 'make' ? 'active' : '' }}"><a href="/make">Make Raffle Event</a></li>
            <!--<li class="{{ Request::segment(1) == 'ongoing' ? 'active' : '' }}"><a href="/ongoing">My Ongoing Raffles</a></li>-->
            <li class="{{ Request::segment(1) == 'entries' ? 'active' : '' }}"><a href="/entries">Raffle Entries</a></li>
        </ul>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>
        </div>
        <!--/.navbar-collapse -->
    </div>
</nav>
