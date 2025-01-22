@extends('user.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Jadwal</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Diri</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <!-- Menampilkan data diri siswa -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Diri Siswa</h5>

                <table class="table">
                    <tr>
                        <th>NIS</th>
                        <td>{{ $ddiri->nis }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $ddiri->nama }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $ddiri->email ?? 'Tidak ada email' }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{ $ddiri->kelas ? $ddiri->kelas->nama_kelas : 'Belum terdaftar di kelas' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection
