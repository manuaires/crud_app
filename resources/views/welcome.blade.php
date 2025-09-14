@extends('layouts.app')

@section('content')
<div class="container my-5 d-flex align-items-center justify-content-center" style="min-height: 70vh;">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-md-5 mb-4 d-flex justify-content-center">
            <a href="{{ route('products.index') }}" 
               class="btn d-flex flex-column align-items-center justify-content-center w-75 py-5"
               style="background-color: #60519b; color: #fff; border-radius: 30px; min-height: 250px; box-shadow: 0 0 15px rgba(0,0,0,0.25); font-size: 1.8rem;">
                <i class="bi bi-box-seam" style="font-size: 4rem; margin-bottom: 15px;"></i>
                Produtos
            </a>
        </div>
        <div class="col-12 col-md-5 mb-4 d-flex justify-content-center">
            <a href="{{ route('games.index') }}" 
               class="btn d-flex flex-column align-items-center justify-content-center w-75 py-5"
               style="background-color: #60519b; color: #fff; border-radius: 30px; min-height: 250px; box-shadow: 0 0 15px rgba(0,0,0,0.25); font-size: 1.8rem;">
                <i class="bi bi-controller" style="font-size: 4rem; margin-bottom: 15px;"></i>
                Games
            </a>
        </div>
    </div>
</div>
@endsection
