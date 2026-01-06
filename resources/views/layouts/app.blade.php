<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silkroad Satıcı Paneli</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0b0f1c;
            --panel: #121b2d;
            --muted: #6b7280;
            --accent: #7c3aed;
            --border: #1f2937;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at 20% 20%, rgba(124,58,237,0.12), transparent 25%), var(--bg);
            color: #e5e7eb;
        }
        a { color: inherit; text-decoration: none; }
        header {
            padding: 20px 32px;
            background: rgba(18,27,45,0.9);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 10;
            backdrop-filter: blur(8px);
        }
        .brand { font-weight: 700; letter-spacing: 0.5px; }
        nav { display: flex; gap: 16px; flex-wrap: wrap; }
        nav a { padding: 10px 14px; border-radius: 10px; background: #0f1627; border: 1px solid var(--border); font-size: 14px; }
        nav a:hover { border-color: var(--accent); color: white; }
        .container { max-width: 1180px; margin: 24px auto; padding: 0 20px 80px; }
        .panel { background: var(--panel); border: 1px solid var(--border); padding: 20px; border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,0.35); }
        h1 { margin-top: 0; }
        .grid { display: grid; gap: 16px; }
        .grid-2 { grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); }
        label { display: block; margin-bottom: 6px; color: var(--muted); font-size: 13px; letter-spacing: 0.2px; }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: #0f1627;
            color: white;
        }
        textarea { min-height: 120px; resize: vertical; }
        button, .btn {
            background: linear-gradient(135deg, #7c3aed, #8b5cf6);
            color: white;
            border: none;
            padding: 12px 18px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.1s ease, box-shadow 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        button:hover, .btn:hover { transform: translateY(-1px); box-shadow: 0 10px 25px rgba(124,58,237,0.35); }
        .muted { color: var(--muted); font-size: 14px; }
        .status { padding: 6px 10px; border-radius: 999px; font-size: 12px; background: rgba(124,58,237,0.18); color: #c4b5fd; border: 1px solid rgba(124,58,237,0.4); }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border-bottom: 1px solid var(--border); text-align: left; }
        th { color: var(--muted); font-size: 12px; letter-spacing: 0.4px; text-transform: uppercase; }
        .alert { padding: 12px 14px; border: 1px solid rgba(16,185,129,0.4); color: #a7f3d0; background: rgba(6,95,70,0.25); border-radius: 12px; margin-bottom: 16px; }
        .error { color: #fecdd3; font-size: 13px; margin-top: 6px; }
    </style>
</head>
<body>
<header>
    <div style="display:flex; align-items:center; justify-content:space-between; gap:12px; flex-wrap:wrap;">
        <div class="brand">Silkroad Satıcı Paneli</div>
        <nav>
            <a href="{{ route('welcome') }}">Ana Sayfa</a>
            <a href="{{ route('register') }}">Kayıt Ol</a>
            <a href="{{ route('login') }}">Giriş Yap</a>
            <a href="{{ route('seller.dashboard') }}">Satıcı Paneli</a>
            <a href="{{ route('listings.create') }}">Yeni İlan</a>
            <a href="{{ route('admin.users') }}">Yönetim</a>
        </nav>
    </div>
</header>
<div class="container">
    @if(session('status'))
        <div class="alert">{{ session('status') }}</div>
    @endif
    @yield('content')
</div>
</body>
</html>
