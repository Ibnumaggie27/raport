@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Wali Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('gumap.index') }}">Wali Kelas</a></li>
                <li class="breadcrumb-item active">Tambah Wali Kelas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <form action="{{ route('walikelas.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="guru_id" class="form-label">Pilih Guru</label>
            <select id="guru_id" name="guru_id" class="form-control" required>
                <option value="" disabled selected>Pilih Guru</option>
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="kelas_id" class="form-label">Pilih Kelas</label>
            <select id="kelas_id" name="kelas_id" class="form-control" required>
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach ($kelas as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('gumap.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</main>
@endsection
