@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row mb-3">
                    <form action="{{ route('user.index') }}" method="GET" id="SearchForm">
                        <div class="row">
                            <div class="col p-0 pr-1" style="width: 75rem;">
                            
                                <div class="form-group">
                                    <input type="text" id="search" name="search" class="form-control">
                                </div>
                        </div>

                        <div class="col p-0">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Buscar">
                            </div>
                        </div>
                        </div>
                    </form>
                </div>



                
                @foreach ($users as $user)
                    <div class="row">
                        <div class="col-md-4">
                            @if ($user->image)

                                <img src="{{ route('user.avatar', ['filename' => $user->image]) }}" class="rounded-circle"
                                    width="100" height="100" />



                            @endif

                        </div>
                        <div class="col-md-8 mt-3 mb-3">
                            <h5 class="">{{ '@' . $user->nick }}</h5>
                            <h5>{{ $user->name . ' ' . $user->surname }}</h5>
                            <p>{{ 'Se unió: ' . \FormatTime::LongTimeFilter($user->created_at) }}</p>
                            <a href="{{ route('user.profile', ['id' => $user->id]) }}"
                                class="btn btn-sm btn-primary">Visitar Perfil</a>

                        </div>
                    </div>
                    <hr>
                @endforeach

            </div>
            <div class="col-md-5 mt-2">
                <span class="p-5 text-center">{{ $users->links() }}</span>
            </div>

        </div>
    </div>
@endsection
