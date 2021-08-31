@foreach($famous as $all_fam)
    <div class="col-6 col-md-4 p-2 ">
        <a href="{{url('profile',$all_fam->id)}}" class=" famous">
            <img src="{{get_file($all_fam->image)}}">
            <div class="info">
                <p> {{$all_fam->name}} </p>
                <span> {{$all_fam->job->title}} </span>
            </div>
        </a>
    </div>
@endforeach
