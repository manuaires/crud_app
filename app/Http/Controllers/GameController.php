<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('games.index', [
           'games' => Game::orderBy('id', 'asc')->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(StoreGameRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Garante que a pasta exista
            $destinationPath = public_path('uploads/games');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }

            // Gera um nome único e "seguro"
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $safeName     = Str::slug($originalName); // transforma em slug
            $extension    = $file->getClientOriginalExtension();
            $filename     = time() . '_' . $safeName . '.' . $extension;

            // Move para pasta
            $file->move($destinationPath, $filename);

            // Salva no banco
            $data['image'] = $filename;
        }

        Game::create($data);

        return redirect()->route('games.index')
            ->withSuccess('Novo jogo adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game) : View
    {
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game) : View
    {
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game) : RedirectResponse
    {
        $data = $request->validated();

        // Se tiver upload novo
        if ($request->hasFile('image')) {
            $destinationPath = public_path('uploads/games');

            // Garante que a pasta exista
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }

            $file = $request->file('image');

            // Gera um nome único e "limpo"
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $safeName     = Str::slug($originalName);
            $extension    = $file->getClientOriginalExtension();
            $filename     = time() . '_' . $safeName . '.' . $extension;

            // Move o novo arquivo
            $file->move($destinationPath, $filename);

            // Apaga a imagem antiga (só depois do novo arquivo ter sido salvo com sucesso)
            if (!empty($game->image)) {
                $oldPath = $destinationPath . DIRECTORY_SEPARATOR . $game->image;
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            // Atualiza o campo no banco
            $data['image'] = $filename;
        }

        // Atualiza demais campos
        $game->update($data);

        return redirect()->route('games.index')->withSuccess('Jogo atualizado com sucesso.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game) : RedirectResponse
    {
        // Caminho da pasta
        $destinationPath = public_path('uploads/games');

        // Verifica se o jogo tem imagem
        if (!empty($game->image)) {
            $imagePath = $destinationPath . DIRECTORY_SEPARATOR . $game->image;

            // Se a imagem existir, apaga
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Depois apaga o registro do banco
        $game->delete();

        return redirect()->route('games.index')
                ->withSuccess('Jogo deletado com sucesso.');
    }

}