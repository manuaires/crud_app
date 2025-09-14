@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Informação do jogo
                </div>
                <div class="float-end">
                    <a href="{{ route('games.index') }}" class="btn btn-primary btn-sm">&larr; Voltar</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Código:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $game->code }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nome:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $game->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="plataforma" class="col-md-4 col-form-label text-md-end text-start"><strong>Plataforma:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $game->plataforma }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="release_date" class="col-md-4 col-form-label text-md-end text-start"><strong>Data de lançamento:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ \Carbon\Carbon::parse($game->release_date)->format('d-m-Y') }}
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label text-md-end text-start"><strong>Imagem:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @if($game->image)
                                <img src="{{ asset('uploads/games/' . $game->image) }}" 
                                    alt="imagem do jogo" 
                                    style="max-width: 300px; height: auto;">
                            @else
                                <span class="text-muted">Sem imagem</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Descrição:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $game->description }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>

@endsection