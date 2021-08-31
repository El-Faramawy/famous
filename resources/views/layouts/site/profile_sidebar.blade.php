<div class="col-md-3 p-1">
    <div class="profileNavCol">
        <a class="@yield('profile')" href="{{url('profile',$user->id)}}"> <i class="fas fa-user me-2"></i> البروفايل
        </a>

        @if($user->type=='famous' && $user->status=='accepted')
            <a class="@yield('PreviousAds')" href="{{url('profile-PreviousAds',$user->id)}}"> <i
                        class="fad fa-play me-2"></i> الاعلانات السابقة </a>
        @endif

        @if(auth()->check())
            @if(auth()->user()->id == $user->id && $user->type=='famous' && $user->status=='accepted')
                <a class="@yield('orders')" href="{{url('profile-orders')}}"> <i class="fad fa-box-check me-2"></i>
                    طلبات الاعلانات </a>
            @endif
        @endif

        @if($user->type=='famous' && $user->status=='accepted')
            <a class="@yield('rating')" href="{{url('profile-Rating',$user->id)}}"> <i class="fas fa-star me-2"></i>
                التقييمات </a>
        @endif

        @if(auth()->check())
            @if(auth()->user()->id == $user->id )
                @if(($user->type=='famous' && $user->status!='new') || $user->type=='client')
                <a class="@yield('notification')" href="{{url('profile-Notifications')}}"> <i
                            class="fas fa-bell me-2"></i> الاشعارات </a>
                @endif
            @endif
        @endif

        @if(auth()->check())
            @if(auth()->user()->id == $user->id)
                @if(($user->type=='famous' && $user->status=='accepted') || $user->type=='client')
                <a class="@yield('edit')" href="{{url('profile-edit')}}"><i class="fas fa-cog me-2"></i> تعديل </a>
                @endif
                <a href="{{url('logout')}}"><i class="fas fa-sign-out-alt me-2"></i> خروج </a>
            @endif
        @endif
    </div>
</div>
