<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل مستخدم جديد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

<div class="card shadow p-4" style="width: 420px;">
    <h3 class="text-center mb-4">تسجيل مستخدم جديد</h3>

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">الاسم الكامل</label>
            <input type="text" name="full_name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">رقم الجوال</label>
            <input type="text" name="phone" class="form-control" required value="{{ old('phone') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">اسم المستخدم</label>
            <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">كلمة المرور</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">نوع المستخدم</label>
            <select name="role" class="form-select" required>
                <option value="teacher">معلم</option>
                <option value="supervisor">مشرف</option>
                <option value="admin">مدير</option>
            </select>
        </div>

        <button class="btn btn-success w-100">تسجيل</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}">لديك حساب بالفعل؟ تسجيل الدخول</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

</body>
</html>
