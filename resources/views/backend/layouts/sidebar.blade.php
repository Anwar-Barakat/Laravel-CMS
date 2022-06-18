<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.dashboard') }}">Main Dashboard</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-th-list"></i>
                    <span class="nav-text">Categories</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.categories.index') }}">All Categories</a></li>
                    <li><a href="{{ route('admin.categories.create') }}">Add Category</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-tags"></i>
                    <span class="nav-text">tags</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.tags.index') }}">All tags</a></li>
                    <li><a href="{{ route('admin.tags.create') }}">Add Tag</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-newspaper-o"></i>
                    <span class="nav-text">Posts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.posts.index') }}">All Posts</a></li>
                    <li><a href="{{ route('admin.posts.create') }}">Add Post</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Users</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.users.index') }}">All Users</a></li>
                    <li><a href="{{ route('admin.users.create') }}">Add User</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="{{ route('admin.profile.index') }}" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Profile</span>
                </a>
            </li>
            <li><a class="has-arrow" href="{{ route('admin.settings.index') }}" aria-expanded="false">
                    <i class="la la-cogs"></i>
                    <span class="nav-text">Settings</span>
                </a>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-envelope"></i>
                    <span class="nav-text">Contact Messages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.contact-us.index') }}">All Messages</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
