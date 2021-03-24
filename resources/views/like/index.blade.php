@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @foreach($likes as $like)


                        @include('includes.image', ['image'=>$like->image])
                

                @endforeach

            </div>

        </div>

        <div class="col-md-5">
            <span class="p-5 text-center">{{ $likes->links() }}</span>
        </div>

        
    </div>
</div>
@endsection
