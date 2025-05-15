<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Siswa</title>
  <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('assets/images/wikrama.png') }}" type="image/x-icon">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .login-container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background: #f8f9fa;
    }
    .login-card {
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      background-color: white;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #4e73df;
    }
    .btn-primary {
      background-color: #4e73df;
      border: none;
    }
    .btn-primary:hover {
      background-color: #3a5abf;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <div class="login-card">
      <h3 class="text-center mb-4">Login</h3>
<form action="{{ route('login.siswa') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="id" class="form-label">NIS</label>
    <input type="number" class="form-control" id="id" name="id" placeholder="Enter Nis" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="new-password">
  </div>
  <div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary">Login</button>
  </div>
</form>

    </div>
  </div>

  <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
</body>
</html>
