@extends('layouts/app')
@section('konten')

<tr>
  <td colspan="2">
    <div class="d-flex align-items-center">
      <a href="/siswa/create" class="btn btn-primary me-5" style="margin-right: 500px;">+ Tambah Kategori</a>
      <form action="siswa" method="GET" class="d-flex">
        <input type="text" style="width: 250px;" name="search" class="form-control me-2" placeholder="Cari nama kategori" value="{{ request('search') }}">
        <button type="submit" class="btn btn-secondary">Cari</button>
      </form>
    </div>
  </td>
</tr>

<table class="table" style="width: 100%;">
<thead>
<tr>
<th>Kode</th>    
<th>Nama</th>
</tr>
</thead>
<tbody>
@foreach ($data as $item)
<tr>
<td>{{$item->kode }}</td>
<td>{{$item->nama }}</td>
<a class='btn btn-warning btn-sm' href="/siswa/edit/{{ $item->nomor_induk }}">Edit</a>
<form onsubmit="return confirm('Are you sure to delete?')" class='d-inline' action="/siswa/destroy/{{ $item->nomor_induk }}" method='post'>
    @csrf
    @method('Delete')
    <button class="btn btn-danger btn-sm" type="Submit">Delete</button>
</form>

</td>
</tr>    

@endforeach

</tbody>
</table>

{{ $data->links('pagination::bootstrap-5') }}

@endsection

