<div class="dropdown az-profile-menu">
    <a href="" class="az-img-user"><img src="{{ asset('template/admin/img/faces/face1.jpg') }}" alt="User"></a>
    <div class="dropdown-menu">
        <div class="az-dropdown-header d-sm-none">
            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
        </div>
        <div class="az-header-profile">
            <div class="az-img-user">
                <img src="{{ asset('template/admin/img/faces/face1.jpg') }}" alt="User">
            </div>
            <h6>{{ __('app.name') }} {{ __('app.surname') }}</h6>
            <span>{{ __('app.job') }} </span>
        </div>
        <a href="javascript:;" class="dropdown-item">
            <i class="typcn typcn-user-outline"></i>
            {{ __('app.my_profile') }}
        </a>
        <a href="javascript:;" class="dropdown-item">
            <i class="typcn typcn-power-outline"></i>
            {{ __('app.logout') }}
        </a>
    </div>
</div>
