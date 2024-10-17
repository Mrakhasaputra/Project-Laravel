@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #6E48AA, #9D50BB);">
                    <div class="card-body p-4 bg-white rounded-4">
                        <h3 class="text-center m-0 fw-bold" style="color: #012970;">Edit Menu</h3>

                        <!-- Success and Failed Messages -->
                        @if(Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Form Edit Menu -->
                        <form action="{{ route('menu.update', $menu->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Nama Field -->
                            <div class="form-group mb-4">
                                <label for="name" class="form-label fw-semibold">Nama Menu:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white"><i class="bi bi-card-text"></i></span>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $menu->name) }}" placeholder="Masukkan nama menu">
                                </div>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Kategori Field -->
                            <div class="form-group mb-4">
                                <label for="type" class="form-label fw-semibold">Kategori Menu:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white"><i class="bi bi-tag-fill"></i></span>
                                    <select class="form-select" name="type" id="type">
                                        <option selected disabled hidden>Pilih</option>
                                        <option value="food" {{ $menu->type == 'food' ? 'selected' : '' }}>Makanan</option>
                                        <option value="drink" {{ $menu->type == 'drink' ? 'selected' : '' }}>Minuman</option>
                                    </select>
                                </div>
                                @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <!-- Harga Field -->
                            <div class="form-group mb-4">
                                <label for="price" class="form-label fw-semibold">Harga:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white"><i class="bi bi-currency-dollar"></i></span>
                                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $menu->price) }}" placeholder="Masukkan harga menu">
                                </div>
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Gambar Field -->
                            <div class="form-group mb-4">
                                <label for="img" class="form-label fw-semibold">Gambar Menu:</label>
                                @if($menu->img)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $menu->img) }}" class="img-thumbnail rounded" width="150" alt="Current Image">
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="img" name="img">
                                @error('img')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2 mt-2 ">
                                <button type="submit" class="btn btn-success btn-lg shadow-lg" style="background: #0D6EFD; border: none;">Simpan Perubahan</button>
                                <a href="{{ route('menu.index') }}" class="btn btn-secondary btn-lg shadow-lg">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
