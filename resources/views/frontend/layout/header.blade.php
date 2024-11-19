<header class="header">

    <nav class="navbar nav-1">
        <section class="flex">
            <a href="{{route('home_page')}}" class="logo"><i class="fas fa-house"></i>Properties</a>

            <ul>
                <li><a href="{{route('property')}}">post property<i class="fas fa-paper-plane"></i></a></li>
            </ul>
        </section>
    </nav>

    <nav class="navbar nav-2">
        <section class="flex">
            <div id="menu-btn" class="fas fa-bars"></div>

            <div class="menu">
                <ul>


                    <li><a href="#">options<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="{{route('search.index')}}">filter search</a></li>
                            <li><a href="{{route('all listings')}}">all listings</a></li>
                        </ul>
                    </li>
                    <li><a href="#">help<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="{{route('contact.about')}}">about us</a></i></li>
                            <li><a href="{{route('contact')}}">contact us</a></i></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <ul>
                <li> <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </li>
                <li><a href="#">account <i class="fas fa-angle-down"></i></a>
                    <ul>
                        <li><a href="{{route('login')}}">login</a></li>
                        <li><a href="{{route('register')}}">register</a></li>
                        

                    </ul>
                </li>
            </ul>
        </section>
    </nav>

</header>
