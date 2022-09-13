<div class="az-header-menu">
    <div class="az-header-menu-header">
        <a href="{{ route('admin.index') }}" class="az-logo"><span></span> Mynet</a>
        <a href="" class="close">&times;</a>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="typcn typcn-chart-area-outline"></i>
                {{ __('app.dashboard') }}
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.person.index') }}" class="nav-link">
                <i class="typcn typcn-group"></i>
                {{ __('app.people') }}
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link with-sub">
                <i class="typcn typcn-spanner"></i>
                {{ __('app.settings') }}
            </a>
            <div class="az-menu-sub">
                <div class="container">
                    <div>
                        <nav class="nav">
                            <a href="javascript:;" class="nav-link">Module 1</a>
                            <a href="javascript:;" class="nav-link">Module 2</a>
                            <a href="javascript:;" class="nav-link">Module 3</a>
                        </nav>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
