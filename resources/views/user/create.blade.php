@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4 fw-bold">Tambah Akun Pengguna</h3>

                        <!-- Success Message -->
                        @if(Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Form -->
                        <form action="{{ route('users.store')}}" method="post">
                            @csrf

                            <!-- Name Field -->
                            <div class="form-group mb-4">
                                <label for="name" class="form-label">Nama :</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name')}}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" value="{{ old('email')}}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="form-group mb-4">
                                <label for="password" class="form-label">Password :</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Role Selection -->
                            <div class="form-group mb-4">
                                <label for="role" class="form-label">Role :</label>
                                <select class="form-select" name="role" id="role">
                                    <option selected disabled hidden>Pilih Role</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                                @error('role')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Tambah Akun</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
