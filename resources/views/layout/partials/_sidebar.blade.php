<!-- partial -->
<div class="page-body">
    <!-- partial:partials/_sidebar.html -->
    <div class="sidebar">
        <div class="user-profile">
            <div class="display-avatar animated-avatar">
                <img class="profile-img img-lg rounded-circle" src="/assets/images/profile/male/image_1.png"
                    alt="profile image">
            </div>
            <div class="info-wrapper">
                <p class="user-name">{{ session()->get('nickname')}}</p>
                <p class="">{{ session()->get('role')}}</p>
            </div>
        </div>
        <ul class="navigation-menu">
            <li class="nav-category-divider">MAIN</li>
            <li>
                <a href="{{route('dashboard')}}">
                    <span class="link-title">Dashboard</span>
                    <i class="mdi mdi-gauge link-icon"></i>
                </a>
            </li>
            <li>
                <a href="#books" data-toggle="collapse" aria-expanded="false">
                    <span class="link-title">Books</span>
                    <i class="mdi mdi-book link-icon"></i>
                </a>
                <ul class="collapse navigation-submenu" id="books">
                    <li>
                        <a href="{{route('books')}}">All Books</a>
                    </li>
                    <li>
                        <a href="{{route('add-book')}}">Add New</a>
                    </li>
                    <li>
                        <a href="{{route('categories')}}">Categories</a>
                    </li>
                    <li>
                        <a href="{{route('tags')}}">Tags</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#audio" data-toggle="collapse" aria-expanded="false">
                    <span class="link-title">Audiobooks</span>
                    <i class="mdi mdi-audiobook link-icon"></i>
                </a>
                <ul class="collapse navigation-submenu" id="audio">
                    <li>
                        <a href="{{route('audio')}}">All Audiobook</a>
                    </li>
                    <li>
                        <a href="#">Add New</a>
                    </li>
                </ul>
            </li>

            <li class="nav-category-divider">AUTH</li>
            <li>
                <a href="#">
                    <span class="link-title">Administrators</span>
                    <i class="mdi mdi-account-key link-icon"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="link-title">Narrators</span>
                    <i class="mdi mdi-account-star link-icon"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="link-title">Authors</span>
                    <i class="mdi mdi-account link-icon"></i>
                </a>
            </li>
        </ul>
        <div class="sidebar-upgrade-banner">
            <a class="btn upgrade-btn" href="{{route('logout')}}"> <i class="pr-3 mdi mdi-logout-variant"></i>Log
                out</a>
        </div>
    </div>
    <!-- partial - content -->