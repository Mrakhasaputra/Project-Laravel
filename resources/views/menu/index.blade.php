@extends('layouts.layout')

@section('content')

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
            <h3>Daftar Menu</h3>
            <a href="{{ route('menu.create') }}" class="btn btn-primary">Tambah Menu</a>
        </div>

            <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
              @if (count($menus) == 0)
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
              @else
            @foreach ($menus as $menu => $items)
                <tr>
                    <td>{{ $menus->firstItem() + $loop->index }}</td>
                    <td>{{ $items->name }}</td>
                    <td>{{ $items->type }}</td>
                    <td>{{ $items->price }}</td>
                    <td> <img src="{{ asset('storage/'. $items->img) }}" width="120" alt=""> </td>
                    <td class="d-flex justify-content-evenly"> 
                        <a href="{{ route('menu.edit', $items->id) }}" class="btn btn-primary">Edit</a> 
                        <button type="button" class="btn btn-danger" onclick="ModalDelete('{{$items->id}}',' {{$items->name}}')">Hapus</button>
                        <a href="" class="btn btn-warning">Detail</a>
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>

        
            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="">
        @csrf
        @method('DELETE')
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus menu <span id="name_menu"></span> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
    </form>
  </div>
</div>

    </div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
function ModalDelete(id, name){
    $('#name_menu').text(name); // Ganti id di modal-body sesuai
    $('#exampleModal').modal('show');
    let url = "{{ route('menu.delete', ':id') }}"; // Ganti 'id' dengan ':id' agar mudah di-replace
    url = url.replace(':id', id); // Gantikan ':id' dengan id yang dikirim
    $('form').attr('action', url); // Set action form
}

</script>
@endpush

