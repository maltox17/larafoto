@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    @if($user->image)
    
                        <img src="{{ route('user.avatar',['filename'=>$user->image]) }}"  class="rounded-circle" width="150" height="150"/> 

                        
                        
                    @endif
    
                </div>
                <div class="col-md-8 mt-3">
                    <h5 class="">{{ '@'. $user->nick }}</h5>
                    <h5>{{ $user->name .' '. $user->surname }}</h5>
                    <p>{{ 'Se unió: '.\FormatTime::LongTimeFilter($user->created_at) }}</p>
                </div>
            </div>
            @foreach($user->images as $image)
                @include('includes.image', ['image'=>$image])
            @endforeach
        </div>

        
    </div>
</div>
@endsection
