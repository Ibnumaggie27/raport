@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Siswa</a></li>
                <li class="breadcrumb-item active">Tambah Siswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input 
                type="text" 
                id="nis" 
                name="nis" 
                class="form-control @error('nis') is-invalid @enderror" 
                value="{{ old('nis') }}" 
                required>
            @error('nis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input 
                type="text" 
                id="nama" 
                name="nama" 
                class="form-control @error('nama') is-invalid @enderror" 
                value="{{ old('nama') }}" 
                required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="kelas_id" class="form-label">Kelas</label>
            <select 
                id="kelas_id" 
                name="kelas_id" 
                class="form-select @error('kelas_id') is-invalid @enderror" 
                required>
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach ($kelass as $kelas)
                    <option value="{{ $kelas->id }}" {{ old('kelas_id') == $kelas->id ? 'selected' : '' }}>
                        {{ $kelas->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</main>
@endsection
