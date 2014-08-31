@if (Sentry::check())
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Football Manager</a>
    </div>

    @if (isset($user->club))
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        @include('layouts/parts/sidenav')
        @include('layouts/parts/topnav')
    </div>
    @endif
</nav>
@endif