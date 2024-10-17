@extends('layouts.layout')

@section('content')
    <div class="container">

    @if(Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(Session::get('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('failed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


        <div class="d-flex justify-content-between mb-3">
            <h3>Daftar Pengguna</h3>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Pengguna</a>
        </div>

        {{-- Tabel data pengguna --}}
        <table class="table table-bordered table-responsive">
            <thead class="table">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $index => $items)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $items['name'] }}</td>
                        <td>{{ $items['role'] }}</td>
                        <td>{{ $items['email'] }}</td>
                        <td>{{ $items['created_at'] }}</td>
                        {{-- Tindakan aksi --}}
                        <td class="d-flex justify-content-evenly">
                            <a class="btn btn-primary" href="{{ route('users.edit', $items->id) }}">Edit</a>
                            <button class="btn btn-danger" onclick="showModalDelete('{{ $items->id }}', '{{ $items->name }}')">Hapus</button>
                            <a class="btn btn-warning" href="">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal konfirmasi hapus --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus akun <b id="name_user"></b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    // Fungsi untuk menampilkan modal hapus
    function showModalDelete(id, name) {
        $('#name_user').text(name);  // Menampilkan nama pengguna di modal
        $('#exampleModal').modal('show');  // Memunculkan modal
        let url = "{{ route('users.delete', 'id') }}";  // Generate URL
        url = url.replace('id', id);  // Ganti placeholder 'id' dengan id user
        $('form').attr('action', url);  // Set action form ke URL yang sesuai
    }
</script>
@endpush
