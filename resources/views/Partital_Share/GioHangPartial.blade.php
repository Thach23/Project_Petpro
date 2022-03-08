<div id="giohangpartial" class="d-inline-flex order-lg-last col-auto p-0 align-items-center">
    {{-- data-trigger="#card_mobile" --}}
    <a class="nav-link ml-auto" href="{{ route('showcart') }}" id="shopping-bag">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-shopping-bag">
            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <path d="M16 10a4 4 0 0 1-8 0"></path>
        </svg>
        <span id="currentitem" class="badge badge-success">{{ $numberitem }}</span>
        {{-- <span id="currentitem" class="badge badge-success"></span> --}}
    </a>

    <!-- Toggle Button Start -->
    <button class="navbar-toggler x collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <!-- Toggle Button End -->
</div>
