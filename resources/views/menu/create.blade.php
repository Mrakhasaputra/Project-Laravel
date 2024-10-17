@extends('layouts.layout')

@section('content')
    <form action="{{ route('menu.store') }}" method="POST" class="card p-5" enctype="multipart/form-data">
        @csrf
        @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        {{-- Error handling --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama Menu :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Kategori :</label>
            <div class="col-sm-10">
                <select class="form-select" name="type" id="type">
                    <option selected disabled hidden>Pilih</option>
                    <option value="food" {{ old('type') == 'food' ? 'selected' : '' }}>Makanan</option>
                    <option value="drink" {{ old('type') == 'drink' ? 'selected' : '' }}>Minuman</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Harga :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="img" class="col-sm-2 col-form-label">Gambar :</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" id="img" name="img">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
        <a href="{{ route('menu.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
@endsection

