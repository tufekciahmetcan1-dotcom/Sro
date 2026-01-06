<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silkroad Online Pazar</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0f172a;
            --card: #111827;
            --accent: #f59e0b;
            --text: #e5e7eb;
            --muted: #94a3b8;
            --border: #1f2937;
            --highlight: rgba(245, 158, 11, 0.15);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at 20% 20%, rgba(245, 158, 11, 0.08), transparent 25%),
                        radial-gradient(circle at 80% 0%, rgba(59, 130, 246, 0.06), transparent 20%),
                        var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        .page {
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 32px;
            padding: 32px 48px 48px;
        }

        header {
            grid-column: 1 / -1;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .logo span {
            background: linear-gradient(135deg, #f59e0b, #f472b6);
            color: #0b1021;
            padding: 8px 12px;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        }

        nav {
            display: flex;
            gap: 18px;
            font-weight: 600;
            color: var(--muted);
        }

        nav a {
            color: inherit;
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 12px;
            transition: background 0.2s ease, color 0.2s ease;
        }

        nav a:hover {
            color: var(--text);
            background: var(--border);
        }

        .cta {
            padding: 12px 18px;
            background: var(--accent);
            color: #0b1021;
            font-weight: 700;
            border-radius: 14px;
            text-decoration: none;
            box-shadow: 0 10px 30px rgba(245, 158, 11, 0.35);
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
        }

        .login-card h2 {
            margin: 0 0 10px;
            font-size: 22px;
        }

        .login-card p {
            margin: 0 0 20px;
            color: var(--muted);
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 16px;
        }

        .field label { color: var(--muted); font-weight: 600; }

        .field input {
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: #0b1221;
            color: var(--text);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px;
            width: 100%;
            border-radius: 12px;
            border: none;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-primary { background: var(--accent); color: #0b1021; }
        .btn-secondary { background: transparent; color: var(--text); border: 1px solid var(--border); }

        .hero {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            align-items: center;
        }

        .hero h1 {
            font-size: 36px;
            margin: 0 0 12px;
        }

        .hero p {
            color: var(--muted);
            font-size: 17px;
            margin: 0 0 20px;
        }

        .highlight {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--highlight);
            color: #fbbf24;
            padding: 12px 14px;
            border-radius: 12px;
            font-weight: 700;
        }

        .stats {
            display: flex;
            gap: 18px;
        }

        .stat {
            padding: 16px;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: linear-gradient(145deg, rgba(255,255,255,0.02), rgba(0,0,0,0.15));
            min-width: 140px;
        }

        .stat .value { font-size: 28px; font-weight: 700; }
        .stat .label { color: var(--muted); margin-top: 6px; display: block; }

        .filter-bar {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 12px;
        }

        .filter-bar input, .filter-bar select {
            padding: 10px 12px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: #0b1221;
            color: var(--text);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 14px;
        }

        .listing {
            border-radius: 16px;
            border: 1px solid var(--border);
            padding: 16px;
            background: linear-gradient(145deg, rgba(17, 24, 39, 0.95), rgba(17, 24, 39, 0.75));
            position: relative;
            overflow: hidden;
        }

        .listing::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 20%, rgba(245, 158, 11, 0.12), transparent 40%);
            pointer-events: none;
        }

        .listing h3 { margin: 0 0 6px; }
        .listing .meta { color: var(--muted); font-size: 14px; margin-bottom: 12px; }
        .listing .price { font-size: 22px; font-weight: 700; color: #fbbf24; }
        .tags { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 10px; }
        .tag { padding: 6px 10px; border-radius: 10px; background: #0b1221; border: 1px solid var(--border); color: var(--muted); font-size: 13px; }

        footer {
            grid-column: 1 / -1;
            text-align: center;
            margin-top: 28px;
            color: var(--muted);
        }

        @media (max-width: 1024px) {
            .page { grid-template-columns: 1fr; padding: 24px; }
            .hero { grid-template-columns: 1fr; }
            header { flex-direction: column; gap: 12px; align-items: flex-start; }
        }
    </style>
</head>
<body>
    <div class="page">
        <header>
            <div class="logo">
                <span>SRO</span>
                Silkroad Pazar
            </div>
            <nav>
                <a href="#">Anasayfa</a>
                <a href="#">Karakterler</a>
                <a href="#">Satış Yap</a>
                <a href="#">Destek</a>
            </nav>
            <a class="cta" href="#">Hemen Satışa Başla</a>
        </header>

        <section class="login-card card">
            <h2>Oyuncu Girişi</h2>
            <p>Favori Silkroad karakterlerini satmak ve koleksiyonunu genişletmek için giriş yap.</p>
            <div class="field">
                <label for="email">E-posta</label>
                <input id="email" type="email" placeholder="ornek@mail.com">
            </div>
            <div class="field">
                <label for="password">Şifre</label>
                <input id="password" type="password" placeholder="••••••••">
            </div>
            <button class="btn btn-primary">Giriş Yap</button>
            <button class="btn btn-secondary" style="margin-top: 10px;">Hesap Oluştur</button>
        </section>

        <section class="card">
            <div class="hero">
                <div>
                    <div class="highlight">Güvenli Pazar • Anında Listeleme</div>
                    <h1>Silkroad karakterlerini güvenle satın al ve sat</h1>
                    <p>Pazar alanımızda sunuculara göre filtrele, istediğin build'i seç ve anında teklif gönder. Oyun içi ekonomiyi takip eden canlı fiyatlar ve doğrulanmış satıcı profilleriyle güvenle işlem yap.</p>
                    <div class="stats">
                        <div class="stat">
                            <span class="value">2.4K</span>
                            <span class="label">Aktif İlan</span>
                        </div>
                        <div class="stat">
                            <span class="value">840</span>
                            <span class="label">Onaylı Satıcı</span>
                        </div>
                        <div class="stat">
                            <span class="value">12dk</span>
                            <span class="label">Ort. Yanıt</span>
                        </div>
                    </div>
                </div>
                <div class="card" style="background: linear-gradient(165deg, rgba(245,158,11,0.1), rgba(59,130,246,0.08));">
                    <h3 style="margin-top: 0;">Trend Karakterler</h3>
                    <div class="tags">
                        <span class="tag">120 Lv STR Blader</span>
                        <span class="tag">110 Lv Wizard/Cleric</span>
                        <span class="tag">125 Lv Chinese Spear</span>
                        <span class="tag">110 Lv Warlock/Bard</span>
                        <span class="tag">Legendary Set • +10</span>
                    </div>
                    <p style="color: var(--muted); margin-top: 16px;">Öne çıkan karakterleri incele ve profilini öne çıkarmak için vitrine ekle.</p>
                </div>
            </div>
        </section>

        <section class="card" style="grid-column: 1 / -1;">
            <div class="filter-bar">
                <input type="text" placeholder="Karakter veya satıcı ara...">
                <select>
                    <option>Sunucu</option>
                    <option>Jangan</option>
                    <option>Hotan</option>
                    <option>Europe</option>
                </select>
                <select>
                    <option>Seviye</option>
                    <option>120+</option>
                    <option>110-119</option>
                    <option>100-109</option>
                </select>
                <select>
                    <option>Tür</option>
                    <option>STR</option>
                    <option>INT</option>
                    <option>Hybrid</option>
                </select>
                <button class="btn btn-secondary" style="width: auto;">Filtrele</button>
            </div>

            <div class="grid">
                <div class="listing">
                    <h3>120 Lv STR Blader</h3>
                    <div class="meta">Jangan • Legend Set +11 • %95 PHY Resist</div>
                    <div class="price">6.200₺</div>
                    <div class="tags">
                        <span class="tag">Sunucu: Origins</span>
                        <span class="tag">Honor King</span>
                        <span class="tag">Devil S 12</span>
                    </div>
                </div>
                <div class="listing">
                    <h3>110 Lv Wizard/Cleric</h3>
                    <div class="meta">Europe • Arena Grandmaster • Full Blue</div>
                    <div class="price">3.850₺</div>
                    <div class="tags">
                        <span class="tag">Sunucu: Europe</span>
                        <span class="tag">+10 Staff</span>
                        <span class="tag">Premium Aktif</span>
                    </div>
                </div>
                <div class="listing">
                    <h3>125 Lv Chinese Spear</h3>
                    <div class="meta">Hotan • SOSUN Spear +12 • 400 Silks</div>
                    <div class="price">7.900₺</div>
                    <div class="tags">
                        <span class="tag">Sunucu: Hotan</span>
                        <span class="tag">Alchemy 120</span>
                        <span class="tag">Job Hunter Lv 90</span>
                    </div>
                </div>
                <div class="listing">
                    <h3>115 Lv Warlock/Bard</h3>
                    <div class="meta">Jangan • Full Debuff • 2x Avatar</div>
                    <div class="price">2.450₺</div>
                    <div class="tags">
                        <span class="tag">Sunucu: Jangan</span>
                        <span class="tag">Devil S 11</span>
                        <span class="tag">Gold: 18B</span>
                    </div>
                </div>
            </div>
        </section>

        <footer>Topluluk tarafından doğrulanan güvenli Silkroad karakter pazarına hoş geldin.</footer>
    </div>
</body>
</html>
