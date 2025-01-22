@extends('user.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Jadwal</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Jadwal</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Mapel Paket</h5>

                        <!-- Tabel Daftar Mapel Paket -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kelas</th>
                                        <th>Nama Mapel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mapelPaket as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kelas->nama_kelas ?? '-' }}</td>
                                            <td>
                                                @if ($item->mapels->isNotEmpty())
                                                    <ul>
                                                        @foreach ($item->mapels as $mapel)
                                                            <li>{{ $mapel->nama }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $mapelPaket->links() }} <!-- Tambahkan pagination -->
                        </div><!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
