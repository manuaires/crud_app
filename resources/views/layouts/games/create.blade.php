@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Adicionar novo jogo
                </div>
                <div class="float-end">
                    <a href="{{ route('games.index') }}" class="btn btn-primary btn-sm">&larr; Voltar</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('games.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start">Código</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}">
                            @error('code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Nome</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror   
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="plataforma" class="col-md-4 col-form-label text-md-end text-start">Plataforma</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('plataforma') is-invalid @enderror" id="plataforma" name="plataforma" value="{{ old('plataforma') }}">
                            @error('plataforma')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="release_date" class="col-md-4 col-form-label text-md-end text-start">Data de lançamento</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('release_date') is-invalid @enderror" id="release_date" name="release_date" value="{{ old('release_date') }}">
                            @error('release_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="image" class="col-md-4 col-form-label text-md-end text-start">Imagem</label>
                        <div class="col-md-6">
                            <input type="file" 
                                class="form-control @error('image') is-invalid @enderror" 
                                id="image" 
                                name="image" 
                                accept="image/*"
                                onchange="previewImage(event)">
                            
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            {{-- Pré-visualização --}}
                            <div class="mt-2">
                                <img id="preview" 
                                    src="{{ isset($game) && $game->image ? asset('uploads/games/' . $game->image) : '' }}" 
                                    alt="Pré-visualização" 
                                    style="max-width: 200px; max-height: 200px; {{ isset($game) && $game->image ? '' : 'display:none;' }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Descrição</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Adicionar jogo">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>

<script>
function previewImage(event) {
    let reader = new FileReader();
    reader.onload = function(){
        let output = document.getElementById('preview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection