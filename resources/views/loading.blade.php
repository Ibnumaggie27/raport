<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to bottom, #000000, #6e3482);
        }
        .loader {
            width: 150px; /* Sesuaikan dengan ukuran gif */
            height: 150px; /* Sesuaikan dengan ukuran gif */
        }
    </style>
</head>
<body>
    <!-- Menggunakan gambar loading.gif -->
    <img src="{{ asset('assets/img/loading1.gif') }}" alt="Loading..." class="loader">

    <script>
        setTimeout(function() {
            // Redirect ke halaman sesuai dengan role
            @if (Auth::check())
                @if (Auth::user()->role === 'admin')
                    window.location.href = '{{ route('admin.index') }}';
                @elseif (Auth::user()->role === 'guru')
                    window.location.href = '{{ route('guru.index') }}';
                @elseif (Auth::user()->role === 'user')
                    window.location.href = '{{ route('user.index') }}';
                @endif
            @else
                window.location.href = '{{ route('login') }}';
            @endif
        }, 3000); // Ganti 15000 dengan durasi delay dalam milidetik (15 detik)
    </script>
</body>
</html>
