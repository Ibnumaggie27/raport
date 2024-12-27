@extends('guru.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Wali Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Wali Kelas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

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

<section class="section profile">
    <div class="card">
        <div class="card-body pt-2">
            <h2 class="card-title">Daftar kelas</h2>

            <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#dafar-siswa-1" aria-selected="true" role="tab">Kelas A</button>
                </li>
    
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dafar-siswa-2" aria-selected="false" tabindex="-1" role="tab">Kelas B</button>
                </li>
            </ul>

            <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="dafar-siswa-1" role="tabpanel">
                    <h5 class="card-title">About</h5>
                    <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor.</p>
                </div>
            </div>
            <div class="tab-content pt-2">
                <div class="tab-pane fade profile-overview" id="dafar-siswa-2" role="tabpanel">
                    <h5 class="card-title">About</h5>
                    <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor.</p>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection
