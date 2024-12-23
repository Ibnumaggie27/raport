@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Mapel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('mapel.index') }}">Mapel</a></li>
                <li class="breadcrumb-item active">Tambah Mapel</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <form action="{{ route('mapel.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nis" class="form-label">Kode Mapel</label>
            <input type="text" id="kode" name="kode" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama Mapel</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</main>
@endsection
