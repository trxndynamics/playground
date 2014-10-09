<?php

$crest = $user->club;
if(!isset($imageFolderRef))     $imageFolderRef = str_replace(' ','_',mb_strtolower($crest));
else if($team !== $filterTeam)  $imageFolderRef = str_replace(' ','_',mb_strtolower($crest));



?>
<ul class="nav navbar-nav navbar-right navbar-user">
    <li>
        <img id="crest" class="crest-display" src="/resource/images/crests/13/{{ $imageFolderRef }}/crest.png" />
        <img id="home-kit" class="kit-display" src="{{ $user->home_kit }}" />
        <img id="away-kit" class="kit-display" src="{{ $user->away_kit }}" />
    </li>
    <li class="dropdown messages-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">2</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li class="dropdown-header">New Notifications</li>
            <li class="message-preview">
                <a href="/team/notifications">
                    <span class="avatar"><i class="fa fa-bell"></i></span>
                    <span class="message">Team Notifications</span>
                </a>
            </li>
            <li class="divider"></li>
            <li class="message-preview">
                <a href="/media/news">
                    <span class="avatar"><i class="fa fa-bell"></i></span>
                    <span class="message">News Articles</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $user->forename }} {{ $user->surname }} <b class="caret"> </b></a>
        <ul class="dropdown-menu">
            <li><a href="/user/profile"><i class="fa fa-user"></i> Profile</a></li>
            <li><a href="/user/settings"><i class="fa fa-gear"></i> Settings</a></li>
            <li class="divider"></li>
            <li><a href="/auth/logout"><i class="fa fa-power-off"></i> Log Out</a></li>

        </ul>
    </li>
    <li class="divider-vertical"></li>
    <li>
        <form class="navbar-search">
            <input type="text" placeholder="Search" class="form-control">
        </form>
    </li>
</ul>