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

    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" id="nis" name="nis" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="kelas" class="form-label">kelas</label>
            <textarea id="kelas" name="kelas" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</main>
@endsection
