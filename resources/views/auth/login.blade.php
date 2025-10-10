<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

<div class="card p-4 shadow" style="width: 400px;">
    <h3 class="text-center mb-4">تسجيل الدخول</h3>

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">البريد الإلكتروني</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">كلمة المرور</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">دخول</button>
    </form>

    @if($errors->any())
        <div class="alert alert-danger mt-3">
            {{ $errors->first() }}
        </div>
    @endif
</div>

</body>
</html>
