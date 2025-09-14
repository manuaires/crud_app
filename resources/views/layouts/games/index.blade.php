@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">Game List</div>
            <div class="card-body">
                <a href="{{ route('games.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Adicionar novo jogo</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Plataforma</th>
                        <th scope="col">Lançamento</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($games as $game)
                        <tr>
                            <th scope="row">{{ $game->id }}</th>
                            <td>{{ $game->code }}</td>
                            <td>{{ $game->name }}</td>
                            <td>{{ $game->plataforma }}</td>
                            <td>{{ \Carbon\Carbon::parse($game->release_date)->format('d-m-Y') }}</td>
                            <td>
                                @if($game->image)
                                    <img src="{{ asset('uploads/games/' . $game->image) }}" alt="Imagem do jogo" width="80">
                                @else
                                    <span class="text-muted">Sem imagem</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('games.destroy', $game->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('games.show', $game->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Visualizar</a>

                                    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja deletar esse jogo?');"><i class="bi bi-trash"></i> Deletar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="8">
                                <span class="text-danger">
                                    <strong>Jogo não encontrado!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $games->links() }}

            </div>
        </div>
    </div>    
</div>

@endsection