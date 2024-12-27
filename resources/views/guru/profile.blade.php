@extends('guru.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
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
        <div class="row">
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                <h2>{{ $guru->nama ?? 'Tidak tersedia' }}</h2>
              </div>
            </div>
          </div>
  
          <div class="col-xl-8">
  
            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">Bio Data</button>
                    </li>
    
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" tabindex="-1" role="tab">Ganti Password</button>
                    </li>
                </ul>
                <div class="tab-content pt-2">
  
                    <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                        <h5 class="card-title">About</h5>
                        <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor.</p>
    
                        <h5 class="card-title">Profile Details</h5>
    
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">NIP</div>
                            <div class="col-lg-9 col-md-8">{{ $guru->nip ?? 'Tidak tersedia' }}</div>
                        </div>
    
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                            <div class="col-lg-9 col-md-8">{{ $guru->nama ?? 'Tidak tersedia' }}</div>
                        </div>
    
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Email</div>
                            <div class="col-lg-9 col-md-8">{{ $guru->email ?? 'Tidak tersedia' }}</div>
                        </div>
    
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Alamat</div>
                            <div class="col-lg-9 col-md-8">{{ $guru->alamat ?? 'Tidak tersedia' }}</div>
                        </div>
                    </div>
  
                    <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                        <!-- Change Password Form -->
                        <form>
    
                            <div class="row mb-3">
                                <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="password" type="password" class="form-control" id="currentPassword">
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                </div>
                            </div>
        
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form><!-- End Change Password Form -->
    
                    </div>
  
                </div><!-- End Bordered Tabs -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
</main>
@endsection
