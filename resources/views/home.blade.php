@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            @foreach($images as $image)
                @include('includes.image', ['image'=>$image])
            @endforeach
        </div>
        <div class="col-md-5">
            <span class="p-5 text-center">{{ $images->links() }}</span>
        </div>
        
    </div>
</div>
@endsection
