<div class="dropdown az-header-notification">
    <a href="javascript:;" class="new" title="{{ __('app.notifications') }}">
        <i class="typcn typcn-bell"></i>
    </a>
    <div class="dropdown-menu">
        <div class="az-dropdown-header mg-b-20 d-sm-none">
            <a href="javascript:;" class="az-header-arrow">
                <i class="icon ion-md-arrow-back"></i>
            </a>
        </div>
        <h6 class="az-notification-title">{{ __('app.notifications') }}</h6>
        <p class="az-notification-text">{{ __('app.you_have_2_unread_notification',['unReadMessageNumber'=>rand(1,10)]) }}</p>
        <div class="az-notification-list">
            <div class="media new">
                <div class="az-img-user"><img src="{{ asset('template/admin/img/faces/face2.jpg') }}" alt=""></div>
                <div class="media-body">
                    <p>Message</p>
                    <span>Time</span>
                </div>
            </div>
            <div class="media new">
                <div class="az-img-user online"><img src="{{ asset('template/admin/img/faces/face3.jpg') }}" alt="">
                </div>
                <div class="media-body">
                    <p>Message</p>
                    <span>Time</span>
                </div>
            </div>
            <div class="media">
                <div class="az-img-user"><img src="{{ asset('template/admin/img/faces/face4.jpg') }}" alt=""></div>
                <div class="media-body">
                    <p>Message</p>
                    <span>Time</span>
                </div>
            </div>
            <div class="media">
                <div class="az-img-user"><img src="{{ asset('template/admin/img/faces/face5.jpg') }}" alt=""></div>
                <div class="media-body">
                    <p>Message</p>
                    <span>Time</span>
                </div>
            </div>
        </div>
        <div class="dropdown-footer">
            <a href="javascript:;">
                {{ __('app.all_notifications') }}
            </a>
        </div>
    </div>
</div>
