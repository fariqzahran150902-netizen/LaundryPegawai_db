<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-4">Login System</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
          @csrf
          <div class="mb-3">
           <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required autofocus placeholder="Masukkan email">
          </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
           <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
         </div>
        <button type="submit" class="btn btn-primary w-100">Masuk</button>
       </form>
    </div>
</body>
</html>