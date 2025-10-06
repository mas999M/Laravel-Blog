{{--                    user Avatar --}}
@props(['user' , 'size'=>'w-12 h-12'])


    @if($user->image)
        <img src="{{$user->imageUrl()}}" alt="{{$user->name}}" class=" {{ $size }} w-12 h-12 rounded-full">
    @else
        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541" alt="" class=" {{$size}} w-12 h-12 rounded-full">
    @endif


{{--                    user Avatar --}}
