@extends('guru.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Evaluasi Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('wakel.index') }}">Wali Kelas</a></li>
                <li class="breadcrumb-item active">Evaluasi Siswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
        
                            <h5 class="card-title">Profile Siswa</h5>
                            
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">NIS</div>
                                <div class="col-lg-9 col-md-8">{{ $siswas->nis }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nama Siswa</div>
                                <div class="col-lg-9 col-md-8">{{ $siswas->nama }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Email</div>
                                <div class="col-lg-9 col-md-8">{{ $siswas->email }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Kelas</div>
                                <div class="col-lg-9 col-md-8">{{ $siswas->kelas->nama_kelas }}</div>
                            </div>

                            <form action="{{ route('wakel.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="siswa_id" value="{{ $siswas->id }}">
                                
                                <h5 class="card-title">Evaluasi Siswa</h5>
                                <textarea class="form-control" id="evaluasi_siswa" name="evaluasi_siswa" rows="3" placeholder="Masukkan Evaluasi Siswa"></textarea>
                            
                                <h5 class="card-title">Catatan Guru</h5>
                                <textarea class="form-control" id="catatan_guru" name="catatan_guru" rows="5" placeholder="Masukkan Catatan Guru"></textarea>
                            
                                <div class="text-center py-5">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="#" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

</main>
@endsection