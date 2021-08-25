    <div class="col-md-3 p-1">
        <div class="profileNavCol">
            <a class="active" href="{{url('profile',$user->id)}}"> <i class="fas fa-user me-2"></i> البروفايل </a>
            <a href="{{url('profile-PreviousAds')}}"> <i class="fad fa-play me-2"></i> الاعلانات السابقة </a>
            @if(auth()->check())
                @if(auth()->user()->id == $user->id && $user->type=='famous')
                    <a href="{{url('profile-orders')}}"> <i class="fad fa-box-check me-2"></i> طلبات الاعلانات </a>
                @endif
            @endif
            @if($user->type=='famous')
                <a href="{{url('profile-rating')}}"> <i class="fas fa-star me-2"></i>  التقييمات  </a>
            @endif
            <a href="{{url('profile-Notifications')}}"> <i class="fas fa-bell me-2"></i> الاشعارات </a>
            @if(auth()->check())
                @if(auth()->user()->id == $user->id)
                    <a href="{{url('profile-edit')}}"><i class="fas fa-cog me-2"></i> تعديل </a>
                    <a href="{{url('logout')}}"><i class="fas fa-sign-out-alt me-2"></i> خروج </a>
                @endif
            @endif
        </div>
    </div>
