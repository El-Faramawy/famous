<div class=" profileHeader ">
    <div class="UserInfo">
        <div class="UserImg">
            <img src="{{get_file($user->image)}}">
        </div>
        <div class="Info">
            <h5> {{$user->type == 'famous'?$user->name:$user->company_name}}
                @if($user->is_favorite=='yes' && $user->type == 'famous')
                    <span class="Vip"> <i class="fas fa-medal"></i> </span>
                @endif
            </h5>
            @if($user->type == 'famous')
                <div class="d-md-flex align-items-center">
                    <h6> {{$user->job->title}} </h6>
                    <div class="rating">
                                  <span>
                                      @for($i=0;$i<$user->rate;$i++)
                                          <i class='fas fa-star'></i>
                                      @endfor
                                      @for($i=5;$i>$user->rate;$i--)
                                          <i class='fas fa-star' style="color: #f2f2f2"></i>
                                      @endfor
                                  </span>
                    </div>
                </div>
                <div class="d-md-flex align-items-center">
                    @if($visitor_count != 0)
                        <span class="count"> <b>عدد الزائرين :</b> ( {{$visitor_count}} ) زائر </span>
                    @endif
                </div>
            @endif

        </div>
    </div>
    @if($user->type == 'famous')
        <div class="social">
            @if($user->facebook != null)
                <a href="{{$user->facebook}}" class="icon" style="background-color: #4267B2;"> <i
                        class="fab fa-facebook"></i> </a>
            @endif
            @if($user->instagram != null)
                <a href="{{$user->instagram}}" class="icon" style="background-color: #E1306C;"> <i class="fab fa-instagram"></i> </a>
            @endif
            @if($user->twitter != null)
                <a href="{{$user->twitter}}" class="icon" style="background-color: #1DA1F2;"> <i class="fab fa-twitter"></i> </a>
            @endif
            @if($user->youtube != null)
                <a href="{{$user->youtube}}" class="icon" style="background-color: #FF0000;"> <i class="fab fa-youtube"></i> </a>
            @endif
            @if($user->snapchat != null)
                <a href="{{$user->snapchat}}" class="icon" style="background-color: #FFFC00;"> <i class="fab fa-snapchat-ghost"></i>
                </a>
            @endif
        </div>
    @endif
</div>
