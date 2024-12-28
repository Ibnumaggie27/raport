@extends('guru.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Nilai Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('nilai.index') }}">Nilai</a></li>
                <li class="breadcrumb-item active">Tambah Nilai Siswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Nilai</h5>

                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('nilai.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="guru_id" value="{{ $guru->id }}">
                            <input type="hidden" name="mapel_id" value="{{ $gumap->mapel_id }}">
                            <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Guru</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $guru->nama }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $gumap->mapel->kode }}-{{ $gumap->mapel->nama }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $kelas->nama_kelas }}" readonly>
                                </div>
                            </div>

                            <div class="mb-3">
                                <h5>Daftar Siswa</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nilai</th>
                                            <th>Evaluasi 1</th>
                                            <th>Evaluasi 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswas as $siswa)
                                        <tr>
                                            <td>
                                                <input type="hidden" name="siswa[{{ $loop->index }}][siswa_id]" value="{{ $siswa->id }}">
                                                <input type="text" class="form-control" value="{{ $siswa->nama }}" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="siswa[{{ $loop->index }}][nilai]" class="form-control" placeholder="Masukkan nilai">
                                            </td>
                                            <td>
                                                <input type="text" name="siswa[{{ $loop->index }}][evaluasi1]" class="form-control" placeholder="Evaluasi 1">
                                            </td>
                                            <td>
                                                <input type="text" name="siswa[{{ $loop->index }}][evaluasi2]" class="form-control" placeholder="Evaluasi 2">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="#" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form><!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
