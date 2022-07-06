<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Home</li>

                <li>
                    <a href="{{ url('admin/dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
               <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bx-buildings'></i>
                        <span>Hospital Info </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('about') }}"> <i class='bx bx-hash' ></i> <span> About </span> </a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('director') }}"> <i class='bx bx-hash' ></i> <span> Board of Directors</span> </a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('team') }}"> <i class='bx bx-sitemap' ></i> <span> Team Members</span> </a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('doctor') }}"> <i class='bx bx-plus-medical'></i> <span> Doctors </span> </a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('message') }}"> <i class='bx bx-message-dots' ></i> <span> Chairman </span> </a></li>
                    </ul>
                </li>
                <li><a href="{{ route('slider') }}" class="waves-effect">
                    <i class='bx bx-images'></i> <span> Banners </span></a>
                </li>

                <!--<li><a href="{{ route('service') }}" class="waves-effect">-->
                <!--    <i class='bx bx-hash'></i> <span> Services </span></a>-->
                <!--</li>-->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bx-buildings'></i>
                        <span>Service </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('service') }}"> Service </span> </a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('category') }}">Add Category </span> </a></li>
                    </ul>

                </li>
                
                <li><a href="{{ route('specialities') }}" class="waves-effect">
                    <i class='bx bx-hash'></i> <span> Specialities </span></a>
                </li>

                <li><a href="{{ route('news') }}" class="waves-effect">
                    <i class='bx bx-news' ></i> <span> News & Event </span></a>
                </li>
                <li><a href="{{ route('testimonial') }}" class="waves-effect">
                    <i class='bx bx-message-dots' ></i> <span> Testimonial </span></a>
                </li>
                <li><a href="{{ route('show-gallery') }}" class="waves-effect">
                    <i class='bx bx-images'></i> <span> Gallery </span></a>
                </li>
                <li><a href="{{ route('publication') }}" class="waves-effect">
                        <i class='bx bxs-book'></i> <span> Publication </span></a>
                </li>

                

                {{-- Career Page  --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bx-buildings'></i>
                        <span>Career </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('career') }}">Jobs </span> </a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('view-cv') }}"> Resume </span> </a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('position.index') }}"> Position </span> </a></li>
                    </ul>
                    

                </li>
                <li><a href="{{ route('all-cv') }}" class="waves-effect">
                        <i class='bx bxs-book'></i> <span> All CV </span></a>
                </li>
          
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!--========== Left Sidebar End ==========-->
