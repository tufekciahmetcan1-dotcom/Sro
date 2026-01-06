<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRO.GG | Silkroad Pazar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0a0f1f;
            --panel: #0f172a;
            --soft: #111827;
            --muted: #9ca3af;
            --text: #e5e7eb;
            --accent: #fbbf24;
            --accent-2: #22d3ee;
            --border: rgba(255,255,255,0.08);
            --shadow: 0 22px 65px rgba(0,0,0,0.45);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at 12% 15%, rgba(34,211,238,0.08), transparent 25%),
                        radial-gradient(circle at 80% 0%, rgba(251,191,36,0.08), transparent 30%),
                        var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        .page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 26px 26px 60px;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 16px 18px;
            background: rgba(17,24,39,0.75);
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: var(--shadow);
            position: sticky;
            top: 16px;
            z-index: 10;
            backdrop-filter: blur(12px);
        }

        .brand { display: flex; align-items: center; gap: 10px; font-weight: 700; letter-spacing: 0.3px; }
        .brand img { height: 38px; }
        nav { display: flex; align-items: center; gap: 14px; }
        nav a { color: var(--muted); text-decoration: none; font-weight: 600; padding: 10px 12px; border-radius: 10px; }
        nav a:hover { background: rgba(255,255,255,0.05); color: var(--text); }

        .actions { display: flex; gap: 10px; align-items: center; }
        .pill { padding: 10px 14px; border-radius: 12px; border: 1px solid var(--border); background: var(--soft); color: var(--text); text-decoration: none; font-weight: 700; }
        .pill.secondary { background: transparent; color: var(--muted); }
        .pill.accent { background: linear-gradient(120deg, #f97316, #fbbf24); border: none; color: #0b0f1a; box-shadow: 0 16px 40px rgba(251,191,36,0.35); }

        .hero {
            margin-top: 22px;
            padding: 26px;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(15,23,42,0.95) 45%, rgba(17,24,39,0.9)),
                        url('https://images.unsplash.com/photo-1506157786151-b8491531f063?auto=format&fit=crop&w=1600&q=80') center/cover;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 22px;
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(251,191,36,0.06), rgba(34,211,238,0.04));
        }

        .hero > * { position: relative; z-index: 1; }

        .tagline { display: inline-flex; align-items: center; gap: 8px; padding: 10px 14px; border-radius: 12px; background: rgba(34,211,238,0.14); color: #a5f3fc; font-weight: 700; }
        .hero h1 { margin: 12px 0 10px; font-size: 36px; line-height: 1.2; }
        .hero p { margin: 0 0 16px; color: var(--muted); }

        .hero-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }
        .stat {
            padding: 14px;
            border-radius: 12px;
            background: rgba(0,0,0,0.28);
            border: 1px solid var(--border);
        }
        .stat .label { color: var(--muted); font-size: 13px; }
        .stat .value { display: block; font-size: 24px; font-weight: 800; margin-top: 2px; }

        .search-box {
            padding: 16px;
            border-radius: 14px;
            background: rgba(15,23,42,0.95);
            border: 1px solid var(--border);
            display: grid;
            grid-template-columns: 140px 1fr 52px;
            gap: 10px;
            align-items: center;
            box-shadow: 0 14px 40px rgba(0,0,0,0.35);
        }
        .search-box select, .search-box input { height: 46px; border-radius: 12px; border: 1px solid var(--border); background: rgba(255,255,255,0.05); color: var(--text); padding: 0 12px; font-weight: 600; }
        .search-box button { height: 46px; border-radius: 12px; border: none; background: linear-gradient(120deg, #22d3ee, #3b82f6); color: #0b0f1a; font-weight: 800; cursor: pointer; box-shadow: 0 18px 40px rgba(59,130,246,0.35); }

        .grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 18px;
            margin-top: 22px;
        }

        .panel {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 20px;
            box-shadow: var(--shadow);
        }

        .panel h2 { margin: 0 0 12px; }
        .panel p { margin: 0; color: var(--muted); }

        .listings { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 12px; margin-top: 12px; }
        .card {
            padding: 14px;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: linear-gradient(140deg, rgba(17,24,39,0.96), rgba(15,23,42,0.82));
            position: relative;
            overflow: hidden;
        }
        .card::before { content: ""; position: absolute; inset: 0; background: radial-gradient(circle at 80% 0%, rgba(251,191,36,0.08), transparent 35%); }
        .card > * { position: relative; z-index: 1; }
        .card h3 { margin: 0 0 6px; }
        .card .meta { color: var(--muted); font-size: 14px; margin-bottom: 8px; }
        .card .price { color: var(--accent); font-size: 22px; font-weight: 800; }
        .tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 10px; }
        .tag { padding: 7px 10px; border-radius: 10px; border: 1px solid var(--border); background: rgba(255,255,255,0.04); color: var(--muted); font-size: 13px; }

        .sidebar-list { display: grid; gap: 12px; }
        .sidebar-card { padding: 14px; border-radius: 14px; border: 1px solid var(--border); background: rgba(255,255,255,0.03); display: flex; gap: 12px; align-items: center; }
        .sidebar-card strong { display: block; }
        .sidebar-card small { color: var(--muted); }
        .bubble { width: 46px; height: 46px; border-radius: 14px; background: linear-gradient(135deg, #22d3ee, #3b82f6); display: grid; place-items: center; font-weight: 800; color: #0b0f1a; }

        .section-title { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-bottom: 10px; }
        .badge { padding: 8px 12px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid var(--border); color: var(--muted); font-weight: 700; display: inline-flex; align-items: center; gap: 6px; }

        footer { margin-top: 22px; text-align: center; color: var(--muted); }

        @media (max-width: 1024px) {
            header { flex-wrap: wrap; position: static; }
            nav { width: 100%; justify-content: center; flex-wrap: wrap; }
            .hero { grid-template-columns: 1fr; }
            .grid { grid-template-columns: 1fr; }
            .search-box { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="page">
    <header>
        <div class="brand">
            <img src="https://i.imgur.com/0xwFJ8k.png" alt="SRO.GG Logo">
            <span>SRO.GG</span>
        </div>
        <nav>
            <a href="#listings">Pazar</a>
            <a href="#giris">Giriş</a>
            <a href="#guvenli">Güvenli Ticaret</a>
            <a href="#destek">Destek</a>
        </nav>
        <div class="actions">
            <a class="pill secondary" href="#tr">TR / ₺</a>
            <a class="pill" href="#giris">Giriş Yap</a>
            <a class="pill accent" href="#ilan">İlan Oluştur</a>
        </div>
    </header>

    <section class="hero">
        <div>
            <div class="tagline">Silkroad Online Resmî Pazar • sro.gg</div>
            <h1>Hesap, item ve gold satışını tek ekrandan yönet</h1>
            <p>Sunucuya göre filtrele, meta build’leri takip et ve onaylı satıcılar ile güvenli escrow korumasında ticaret yap. sro.gg tasarımından ilham alan modern panel.</p>
            <div class="hero-stats">
                <div class="stat"><span class="label">Aktif İlan</span><span class="value">2.840</span></div>
                <div class="stat"><span class="label">Toplam Satış</span><span class="value">182K</span></div>
                <div class="stat"><span class="label">Canlı Kullanıcı</span><span class="value">124</span></div>
            </div>
        </div>
        <div class="search-box">
            <select>
                <option>Karakter</option>
                <option>Item</option>
                <option>Guild</option>
                <option>Gold / Silk</option>
            </select>
            <input type="text" placeholder="Sunucu, build veya ek özellik ara (ör. STR Blader)">
            <button>Ara</button>
        </div>
    </section>

    <div class="grid" id="listings">
        <div class="panel">
            <div class="section-title">
                <h2>Vitrindeki İlanlar</h2>
                <span class="badge">⭐ Öne Çıkan</span>
            </div>
            <div class="listings">
                <div class="card">
                    <h3>120 Lv STR Blader</h3>
                    <div class="meta">Jangan • Legend Set +11 • %95 PHY Resist</div>
                    <div class="price">6.200₺</div>
                    <div class="tags">
                        <span class="tag">Sunucu: Origins</span>
                        <span class="tag">Honor King</span>
                        <span class="tag">Devil S 12</span>
                    </div>
                </div>
                <div class="card">
                    <h3>110 Lv Wizard/Cleric</h3>
                    <div class="meta">Europe • Arena Grandmaster • Full Blue</div>
                    <div class="price">3.850₺</div>
                    <div class="tags">
                        <span class="tag">Sunucu: Europe</span>
                        <span class="tag">+10 Staff</span>
                        <span class="tag">Premium Aktif</span>
                    </div>
                </div>
                <div class="card">
                    <h3>125 Lv Chinese Spear</h3>
                    <div class="meta">Hotan • SOSUN Spear +12 • 400 Silks</div>
                    <div class="price">7.900₺</div>
                    <div class="tags">
                        <span class="tag">Sunucu: Hotan</span>
                        <span class="tag">Alchemy 120</span>
                        <span class="tag">Job Hunter Lv 90</span>
                    </div>
                </div>
                <div class="card">
                    <h3>115 Lv Warlock/Bard</h3>
                    <div class="meta">Jangan • Full Debuff • 2x Avatar</div>
                    <div class="price">2.450₺</div>
                    <div class="tags">
                        <span class="tag">Sunucu: Jangan</span>
                        <span class="tag">Devil S 11</span>
                        <span class="tag">Gold: 18B</span>
                    </div>
                </div>
                <div class="card">
                    <h3>Legendary Shield +12</h3>
                    <div class="meta">Glavier • 12 Degree • Parry 76% • FB</div>
                    <div class="price">1.250₺</div>
                    <div class="tags">
                        <span class="tag">Item</span>
                        <span class="tag">Silkroad R</span>
                        <span class="tag">Swap Hazır</span>
                    </div>
                </div>
                <div class="card">
                    <h3>Gold Bar Paket</h3>
                    <div class="meta">Phoenix • 5B x 4 • 10dk Teslimat</div>
                    <div class="price">920₺</div>
                    <div class="tags">
                        <span class="tag">Gold</span>
                        <span class="tag">Canlı Stok</span>
                        <span class="tag">Escrow</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel" id="giris">
            <div class="section-title">
                <h2>Hızlı Giriş</h2>
                <span class="badge">⚡ 2FA Koruma</span>
            </div>
            <p>İlanlarını yönet, mesaj kutunu takip et ve escrow durumunu izle.</p>
            <div class="sidebar-list" style="margin-top: 12px;">
                <div class="sidebar-card">
                    <div class="bubble">1</div>
                    <div>
                        <strong>E-posta</strong>
                        <small>ornek@mail.com</small>
                    </div>
                </div>
                <div class="sidebar-card">
                    <div class="bubble">2</div>
                    <div>
                        <strong>Şifre</strong>
                        <small>••••••••</small>
                    </div>
                </div>
                <a class="pill accent" style="text-align:center; border:none;" href="#">Giriş Yap</a>
                <a class="pill" id="kayit" href="#">Kayıt Ol</a>
            </div>

            <div id="guvenli" class="sidebar-card" style="margin-top: 18px;">
                <div class="bubble" style="background: linear-gradient(135deg, #22c55e, #16a34a); color: #062b1c;">✓</div>
                <div>
                    <strong>Güvenli Escrow</strong>
                    <small>Satıcı onayı, kimlik doğrulama ve canlı destek ile işlemler koruma altında.</small>
                </div>
            </div>
        </div>
    </div>

    <div class="panel" id="destek" style="margin-top: 18px;">
        <div class="section-title">
            <h2>Topluluk & Destek</h2>
            <span class="badge">Discord • Ticket • Rehber</span>
        </div>
        <div class="sidebar-list" style="grid-template-columns: repeat(auto-fit, minmax(240px,1fr));">
            <div class="sidebar-card">
                <div class="bubble">💬</div>
                <div>
                    <strong>Discord Canlı Sohbet</strong>
                    <small>Alıcı & satıcı puanlarını gör, hızlı destek al.</small>
                </div>
            </div>
            <div class="sidebar-card">
                <div class="bubble">📚</div>
                <div>
                    <strong>Build Rehberleri</strong>
                    <small>Meta build karşılaştırmaları ve rotasyon ipuçları.</small>
                </div>
            </div>
            <div class="sidebar-card">
                <div class="bubble">🛡️</div>
                <div>
                    <strong>Fraud Koruması</strong>
                    <small>Riskli işlemlerde otomatik bloke ve iade prosedürü.</small>
                </div>
            </div>
            <div class="sidebar-card">
                <div class="bubble">⚙️</div>
                <div>
                    <strong>API & Webhook</strong>
                    <small>İlan durumlarını kendi sistemine bağla, stok güncelle.</small>
                </div>
            </div>
        </div>
    </div>

    <footer>
        sro.gg görünümünde tasarlanan pazar ekranı — güvenli ticaret için topluluk onaylı satıcılar ve escrow altyapısı.
    </footer>
</div>
</body>
</html>
