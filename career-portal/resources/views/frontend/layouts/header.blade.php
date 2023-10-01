<!-- navbar start from here -->
<nav class="border-b border-b-border__primary font-sans sticky z-10 top-0   bg-white">
    <div class=" container  mx-auto px-4 md:px-0 flex items-center justify-between">
        <div class="">
            <a href="{{ url('/') }}"><img class="h-16" src="{{ asset('frontend/assets/logo.png') }}" alt="logo"> </a>

        </div>
        <div class="relative ">
            <button class="md:hidden" id="navbar-btn"><i class="fa-solid fa-bars"></i> </button>
            <ul id="navbar"
                class="hidden  absolute bg-white border border-b-border__primary md:border-none  rounded-md  px-8 md:p-0 py-2 right-0 md:static md:flex gap-4">
                <li><a class="nav-item text-secondary" href="{{ url('/') }}">Home</a></li>

                <li class="relative dropdown ">
                    <a class="flex w-full  items-center  gap-1 nav-item  dropdown-btn  " href="contact.html">Resource <i
                            class="fa-solid fa-angle-down"></i></a>
                    <ul class="dropdown-menu z-50 hidden ">
                        <li><a class="nav-item " href="{{ route('cvs') }}">CV</a></li>
                        <li><a class="nav-item border-b-0" href="{{ route('coverletters') }}">Cover Letter</a></li>
                    </ul>
                </li>
                <li><a class="nav-item" href="{{ route('events') }}">Event</a></li>
                <li><a class=" nav-item" href="{{ route('programs') }}">Programs</a></li>
                <li><a class=" nav-item" href="{{ route('jobportals') }}">Job-Portal</a></li>
                @guest
                    <li><a class=" nav-item" href="{{ route('login') }}">Login</a></li>

                @endguest
                @auth
                    <li class="relative dropdown">
                        <a class="flex  items-center  gap-1 dropdown-btn nav-item bg-red-400 bg-transparent "
                            href="#">
                            <img class="h-8 w-8 object-cover rounded-full border  border-primary"
                                src="{{ asset('frontend/assets/profile.jpg') }}" alt="profile">
                            <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="dropdown-menu hidden ">
                            <li><a class="nav-item " href="{{ route('profile.edit') }}">Profile</a></li>
                            <li><a class="nav-item " href="{{ route('appliedjobs') }}">Jobs</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="nav-item border-b-0">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

            </ul>
        </div>

    </div>
</nav>
<!-- navbar ends here  -->
