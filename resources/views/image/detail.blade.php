@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')
                <div class="card pub_image mt-5">
                    <div class="card-header">
                        <div class="d-inline-flex">
                            <div class="container-avatar mr-2">
                                @if($image->user->image)
                                    <img src="{{ route('user.avatar',['filename'=>$image->user->image]) }}" class="avatar"/>
                                @endif
                            </div>
                            <div class="align-middle pt-1">
                                {{ $image->user->name.' '.$image->user->surname.' | @'.$image->user->nick }}
                            </div>
                        </div>

                        
                    </div>
                    <div class="card-body p-0">
                        <img src="{{ route('image.file', ['filename'=> $image->image_path]) }}" alt="image" class="w-100">
                        <div class="likes pt-2 pl-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--Comrpobar si el usuario le dio like a la imagen-->
                                    <?php $user_like = false; ?>
                                    @foreach($image->likes as $like)
                                        @if($like->user->id == Auth::user()->id)
                                            <?php $user_like = true; ?>
                                        @endif
                                    @endforeach
                                        @if($user_like)
                                                <i class="LikeHeart bi bi-heart-fill text-danger" data-id="{{  $image->id }}"></i>
                                                {{ count($image->likes) }}

                                        @else
                                                <i class="DislikeHeart bi bi-heart-fill" data-id="{{  $image->id }}"></i>
                                                {{ count($image->likes) }}

                                        @endif
                                    
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted text-right pr-3">{{ \FormatTime::LongTimeFilter($image->created_at) }}</p>
                                </div>
                            </div>
                            @if(Auth::user() && Auth::user()->id == $image->user->id)
                                <div class="col-md-6 mb-3 p-0">
                                    <a href="{{ route('image.edit', ['id' => $image->id]) }}" class="btn btn-sm btn-warning text-decoration-none">Editar</a>
                                    <!-- Button trigger modal -->
                                        <button type="button" class=" btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
                                            Eliminar
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar la Imagen</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                Estas seguro de eliminar esta publicacion?
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                                <a href="{{ route('image.delete', ['id' => $image->id]) }}" class="btn btn-danger">Eliminar</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                </div>
                            @endif
                        </div>
                        <div class="description pl-3 pb-1">
                            <span class="text-muted">{{'@'.$image->user->nick }}</span>  
                            <p>{{ $image->description }}</p>
                        </div>  
                        <div class="pl-3 pb-3 text-center">
                            <h5>Comentarios ({{ count($image->comments) }})</h5>
                        </div>
                        <form action="{{ route('comment.save') }}" method="post">
                            @csrf

                            <input type="hidden" name="image_id" value="{{ $image->id }}">
                            <div class="form-group d-flex justify-content-center">
                                <textarea name="content" id="" cols="30" rows="10" required class="form-control w-75 {{ $errors->has('content') ? 'is-invalid' : '' }}"></textarea>
                                @if($errors->has('content'))
                                <span class="invalid-feeback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary pl-3  pr-3">Enviar</button>
                            </div>

                        </form>
                        @foreach ($image->comments as $comment)
                        <div class="description pl-3 pb-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="text-muted">{{'@'.$comment->user->nick }}</span>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted text-right pr-3">{{ \FormatTime::LongTimeFilter($comment->created_at) }}</p>
                                </div>
                            </div>                              
                            <p>{{ $comment->content }}</p>
                            @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id ==  Auth::user()->id))
                                <a href="{{ route ('comment.delete', ['id' => $comment->id]) }}" class="btn btn-sm btn-danger">Eliminar</a>
                            @endif
                            <hr>
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
        
    </div>
</div>
@endsection