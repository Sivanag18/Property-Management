<header class="header">

    <div id="close-btn"><i class="fas fa-times"></i></div>

    <nav class="navbar">
        <a href="{{route('admin.dashboard.home')}}"><i class="fas fa-home"></i><span>home</span></a>
        <a href="{{route('admin.properties')}}"><i class="fas fa-building"></i><span>listings</span></a>
        <a href="{{route('admin.users')}}"><i class="fas fa-user"></i><span>users</span></a>
        <a href="{{route('admin.admins')}}"><i class="fas fa-user-gear"></i><span>admins</span></a>
        <a href="{{route('admin.messages')}}"><i class="fas fa-message"></i><span>messages</span></a>
    </nav>

    <div class="flex-btn">
        <a href="{{route('admin.register')}}" class="option-btn">register</a>
    </div>

    <form action="{{route('admin.logout')}}" method="post">
        @csrf
        <button type="submit" onclick="return confirm('logout from this website?');" class="delete-btn"><i class="fas fa-right-from-bracket"></i><span>logout</span></button>
    </form>

</header>

<div id="menu-btn" class="fas fa-bars"></div>
