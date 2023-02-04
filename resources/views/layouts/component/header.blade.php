<!-- Start Section Header Bar -->
<section id="sha_header_bar" class="col-12">
    <div class="row">
        <div class="col-6">
            <span class="sub-heading">{{$date}}</span>
            <span class="heading">Halo {{$user->name}}</span>
        </div>
        <div class="col-6 text-right">
            <span class="sub-heading">Status Anda</span>
            <span class="heading">{{$user->role->name}}</span>
        </div>
    </div>
</section>
<!-- End Section Header Bar -->

<!-- Start Section Button List -->
<section id="sha_button_list" class="col-12">
    <div class="row">
        <div class="col-12">
            <ul>
                <li class="on">
                    <span>
                        <i class="fa fa-home"></i>
                    </span>
                </li>
                <li class="off">
                    <span>
                        <i class="fa fa-lightbulb-o"></i>
                    </span>
                </li>
                <li class="off">
                    <span>
                        <i class="fa fa-wifi"></i>
                    </span>
                </li>
                <li class="off">
                    <span>
                        <i class="fa fa-snowflake-o"></i>
                    </span>
                </li>
                <li class="on">
                    <a class="sidebar-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <span>
                            <i class="fa fa-sign-out"></i>
                        </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- End Section Button List -->
