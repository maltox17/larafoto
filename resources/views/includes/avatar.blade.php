
@if(Auth::user()->email)
    <div class="container-avatar">
        <img src="{{ isset(Auth::user()->image) ? route('user.avatar',['filename'=>Auth::user()->image]) : '' }}" class="avatar"/>
    </div>
@else
    <div class="container-avatar">
        <i class="bi bi-person-circle"></i>
    </div>
@endif

