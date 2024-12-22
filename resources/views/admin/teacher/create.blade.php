@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Guru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Guru</a></li>
                <li class="breadcrumb-item active">Tambah Guru</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <form action="{{ route('teacher.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nip">NIP</label>
            <input type="text" id="nip" name="nip" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</main>
@endsection
