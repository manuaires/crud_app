@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-5 bg-[#31323e]">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Home</div>
            <div class="card-body">
                <div class="alert alert-success">
                    @if ($message = Session::get('success'))
                        {{ $message }}
                    @else
                        Login realizado com sucesso!
                    @endif
                </div>              
            </div>
        </div>
    </div>    
</div>
    
@endsection