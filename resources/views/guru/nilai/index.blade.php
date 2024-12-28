@extends('guru.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Nilai Setiap Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    {{-- <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('kelas.create') }}" class="btn btn-custom">Tambah NIlai</a>
    </div> --}}

    @if (session('success'))
 <div class="alert alert-success alert-dismissible fade show" role="alert">
   {{ session('success') }}
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 @endif

 @if (session('error'))
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
   {{ session('error') }}
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 @endif
 <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Guru</h5>

                    <!-- Tabel Daftar Guru -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Guru</th>
                                    <th scope="col">Kelas Terkait</th>
                                    <th scope="col">Mengajar Mapel</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gurus as $guru)
                                    @if ($guru->mapels->count() > 0)
                                        @php
                                            $totalMapels = $guru->mapels->count();
                                            $totalPakets = $guru->mapels->reduce(function ($carry, $mapel) {
                                                return $carry + $mapel->pakets->count();
                                            }, 0);
                                        @endphp
                                        @foreach ($guru->mapels as $index => $mapel)
                                            <tr>
                                                @if ($index === 0)
                                                    <th scope="row" rowspan="{{ $totalMapels }}" class="align-middle text-center">{{ $loop->iteration }}</th>
                                                    <td rowspan="{{ $totalMapels }}" class="align-middle">{{ $guru->nama }}</td>
                                                    <td rowspan="{{ $totalMapels }}" class="align-middle text-center">
                                                        @foreach ($guru->mapels as $m)
                                                            @foreach ($m->pakets as $paket)
                                                                <p>{{ $paket->kelas->nama_kelas }}</p>
                                                            @endforeach
                                                        @endforeach
                                                    </td>
                                                @endif
                                                <td class="align-middle">{{ $mapel->nama }}</td>
                                                <td class="align-middle text-center">
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('nilai.create', ['mapel_id' => $mapel->id]) }}" class="btn btn-warning btn-sm" title="Edit {{ $mapel->nama }}">Edit</a>
                                                        <form action="#" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus mapel {{ $mapel->nama }}?')">Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td>{{ $guru->nama }}</td>
                                            <td>-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="#" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus guru?')">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                    <nav class="d-flex justify-content-center mt-3">
                        {{ $gurus->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

</main>
@endsection
