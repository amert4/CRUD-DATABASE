<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Menu Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            /* Warna latar belakang lebih lembut */
            background-color: #faf7bdff; 
        }
        .container {
            margin-top: 30px;
        }
        .card {
            border-radius: 0.75rem; 
        }
        /* Definisikan warna custom jika perlu, atau andalkan class Bootstrap default */
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-5 text-dark fw-bold">🍽️ CRUD Menu Makanan</h2>

        @if(session('success'))
            <div id="alertMessage" class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                // ... (Script alert tetap sama) ...
                setTimeout(() => {
                    const alertBox = document.getElementById('alertMessage');
                    if (alertBox) {
                        new bootstrap.Alert(alertBox).close();
                    }
                }, 3000);
            </script>
        @endif

        @yield('content')
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>