<div class="card pub_image mt-5">
    <div class="card-header">
        <div class="d-inline-flex">
            <div class="mr-1">
                @if($image->user->image)

                    <img src="{{ route('user.avatar',['filename'=>$image->user->image]) }}" id="avatar-photo" class="rounded-circle" width="35px" height="35px "/> 

                    
                @endif
            </div>
            <div class="align-middle pt-1">
                <a class="text-decoration-none" href="{{ route('user.profile', ['id' => $image->user->id]) }}">
                    {{ $image->user->name.' '.$image->user->surname.' | @'.$image->user->nick }}
                </a>
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
        </div>
        <div class="description pl-3 pb-1">

            <span class="text-muted">{{'@'.$image->user->nick }}</span>  
            <p>{{ $image->description }}</p>
        </div>  
        <div class="pl-3 pb-3">
            <a href="{{ route('image.detail', ['id' => $image->id]) }}" class="btn btn-primary btn-sm ">Comentarios ({{ count($image->comments) }})</a>
        </div>
    </div>
</div>