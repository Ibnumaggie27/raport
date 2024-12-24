@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kelas.index') }}">keklas</a></li>
                <li class="breadcrumb-item active">Tambah Kelas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</main>
@endsection
