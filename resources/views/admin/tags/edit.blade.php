@extends('layouts.admin')

@section('content')
    <div class="mb-auto container-fluid">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
        <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <h2 class="card-header">Editar Etiqueta: {{ $tag->id }} - {{ $tag->name }}</h2>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $tag->name }}">
                        @error('name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="validation" class="form-label">Validado</label>
                        <select class="form-select @error('validation') is-invalid @enderror" id="validation" name="validation">
                            <option value="0" @if($tag->validation == 0) selected @endif>Não</option>
                            <option value="1" @if($tag->validation == 1) selected @endif>Sim</option>
                        </select>
                        @error('validation') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categoria</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($tag->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('section_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-fill"></i> Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
