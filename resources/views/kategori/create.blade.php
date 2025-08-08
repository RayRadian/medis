@extends('layouts/app')

@section('konten')

<div class="row justify-content-center">
<div class="col-md-8">

<form method="post" action="/siswa/store" enctype="multipart/form-data">
@csrf
<div class="mb-3">
<label for="nomor_induk" class="form-label">Kode</label>
<input type="text" class="form-control" name="kode" id="kode" value="{{ Session::get('kode')}}">
</div>
<div class="mb-3">
<label for="nama" class="form-label">Nama</label>
<input type="text" class="form-control" name="nama" id="nama" value="{{ Session::get('nama')}}">
</div>
<div class="mb-3">
<button type="submit" class="btn btn-primary">Simpan</button>
</div>

</form>

</div>
</div>



@endsection


