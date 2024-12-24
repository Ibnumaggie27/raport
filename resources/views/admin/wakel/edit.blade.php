@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Guru Mapel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('walikelas.index') }}">Wali Kelas</a></li>
                <li class="breadcrumb-item active">Edit Wali Kelas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <form action="{{ route('walikelas.update', $wakels->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="kelas_id" class="form-label">Pilih Mata Pelajaran</label>
            <select id="kelas_id" name="kelas_id" class="form-control" required>
                <option value="" disabled>Pilih Kelas</option>
                @foreach ($kelass as $kelas)
                    <option value="{{ $kelas->id }}" {{ $wakels->kelas_id == $kelas->id ? 'selected' : '' }}>
                        {{ $kelas->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="guru_id" class="form-label">Pilih Guru</label>
            <select id="guru_id" name="guru_id" class="form-control" required>
                <option value="" disabled>Pilih Guru</option>
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}" {{ $wakels->guru_id == $guru->id ? 'selected' : '' }}>
                        {{ $guru->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('gumap.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</main>
@endsection
