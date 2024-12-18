<?php 
  $user = Auth::user();
  $user_name = $user->name;
?>
<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div
            class="search-toggle-icon bi bi-search"
            data-toggle="header_search"
        ></div>
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a
                    class="dropdown-toggle"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                >
                    <span class="user-icon">
                        <img src="{{ asset('assets/vendors/images/photo1.jpg') }}" alt="" />
                    </span>
                    <span class="user-name">{{  $user_name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="dw dw-logout"></i> Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
