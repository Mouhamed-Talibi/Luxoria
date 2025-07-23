<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تأكيد البريد الإلكتروني</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            color: #333;
            direction: rtl;
        }
        .email-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        h1 {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555555;
        }
        .highlight {
            color: #007bff;
            font-weight: bold;
            font-size: 17px;
        }
        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 30px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .footer {
            margin-top: 30px;
            font-size: 13px;
            color: #999999;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h1>مرحباً، {{ $name }}</h1>

        <p>مرحباً بك في <strong style="color: #007bff;">لكسوريا</strong> 👋</p>

        <p>يرجى الضغط على الزر أدناه لتأكيد بريدك الإلكتروني وتفعيل حسابك.</p>

        <p class="highlight">{{ $email }}</p>

        <a href="{{ $link }}" class="btn">تأكيد حسابي</a>

        <div class="footer">
            إذا لم تقم بالتسجيل في هذا الحساب، يمكنك تجاهل هذه الرسالة بأمان.<br>
            &copy; {{ date('Y') }} لكسوريا. جميع الحقوق محفوظة.
        </div>
    </div>
</body>
</html>
