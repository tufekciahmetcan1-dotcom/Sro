<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silkroad Pazar</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0b1020;
            --panel: #0f172a;
            --border: #1f2937;
            --muted: #9ca3af;
            --text: #e5e7eb;
            --accent: #f59e0b;
            --success: #10b981;
            --info: #38bdf8;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at 20% 20%, rgba(245,158,11,0.08), transparent 20%),
                        radial-gradient(circle at 80% 0%, rgba(59,130,246,0.06), transparent 25%),
                        var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        .layout {
            padding: 28px 36px 48px;
            display: grid;
            gap: 20px;
        }

        header {
            background: linear-gradient(90deg, rgba(17,24,39,0.9), rgba(17,24,39,0.65));
            border: 1px solid var(--border);
            border-radius: 18px;
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            padding: 14px 16px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.35);
            gap: 18px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .brand img {
            height: 40px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: #0b1221;
            color: var(--muted);
            font-weight: 600;
            font-size: 14px;
        }

        .badge .dot { width: 9px; height: 9px; border-radius: 50%; background: var(--success); display: inline-block; }
        .badge strong { color: var(--text); }
        .badge .boost { color: #22c55e; }

        .search {
            display: grid;
            grid-template-columns: 140px 1fr 44px;
            gap: 10px;
            align-items: center;
        }

        .select, .input {
            height: 44px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: #0b1221;
            color: var(--text);
            padding: 0 12px;
            font-weight: 600;
        }

        .input { font-weight: 500; }

        .search button {
            height: 44px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: #111826;
            color: #9ca3af;
            cursor: pointer;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .pill {
            padding: 10px 14px;
            border-radius: 12px;
            border: 1px solid var(--border);
            color: var(--text);
            font-weight: 600;
            text-decoration: none;
            background: #0b1221;
        }

        .pill.secondary { background: transparent; color: var(--muted); }
        .pill.accent { background: linear-gradient(135deg, #f59e0b, #fb923c); color: #0b0f1a; box-shadow: 0 14px 32px rgba(245,158,11,0.35); }

        .grid {
            display: grid;
            grid-template-columns: 3fr 1.1fr;
            gap: 18px;
        }

        .panel {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 18px 44px rgba(0,0,0,0.25);
        }

        .hero {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 20px;
            align-items: center;
        }

        .hero h1 { margin: 0 0 12px; font-size: 36px; }
        .hero p { margin: 0 0 14px; color: var(--muted); }

        .tagline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 12px;
            background: rgba(59,130,246,0.12);
            color: #93c5fd;
            font-weight: 700;
        }

        .stat-row { display: flex; gap: 12px; }
        .stat { flex: 1; padding: 14px; border-radius: 12px; border: 1px solid var(--border); background: #0b1221; }
        .stat .value { display: block; font-size: 24px; font-weight: 700; }
        .stat .label { color: var(--muted); font-size: 14px; }

        .listing-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 12px; margin-top: 14px; }
        .card {
            border-radius: 14px;
            border: 1px solid var(--border);
            background: linear-gradient(145deg, rgba(17,24,39,0.95), rgba(17,24,39,0.75));
            padding: 14px;
            position: relative;
            overflow: hidden;
        }

        .card h3 { margin: 0 0 8px; font-size: 18px; }
        .card .meta { color: var(--muted); font-size: 14px; margin-bottom: 10px; }
        .card .price { color: #fbbf24; font-weight: 700; font-size: 20px; }
        .tags { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 10px; }
        .tag { padding: 6px 10px; border-radius: 10px; border: 1px solid var(--border); background: #0b1221; color: var(--muted); font-size: 13px; }

        .auth {
            display: grid;
            gap: 10px;
        }

        .auth h2 { margin: 0; font-size: 20px; }
        .auth p { margin: 0; color: var(--muted); }
        .auth .field { display: flex; flex-direction: column; gap: 6px; }
        .auth label { color: var(--muted); font-weight: 600; }
        .auth input { padding: 12px; border-radius: 12px; border: 1px solid var(--border); background: #0b1221; color: var(--text); }

        footer { text-align: center; color: var(--muted); margin-top: 16px; }

        @media (max-width: 1100px) {
            header { grid-template-columns: 1fr; }
            .search { grid-template-columns: 1fr; }
            .actions { flex-wrap: wrap; }
            .grid { grid-template-columns: 1fr; }
            .hero { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="layout">
        <header>
            <div class="brand">
                <img src="https://i.imgur.com/0xwFJ8k.png" alt="SRO Logo">
                <span>Silkroad Pazar</span>
                <span class="badge"><span class="dot"></span><strong>128K</strong> Aktif</span>
                <span class="badge"><span class="boost">⚡</span> Booster</span>
            </div>

            <div class="search">
                <select class="select">
                    <option>Karakter</option>
                    <option>İtem</option>
                    <option>Guild</option>
                </select>
                <input class="input" type="text" placeholder="Sunucu veya build ara (ör. Spear/STR)">
                <button title="Ara">🔍</button>
            </div>

            <div class="actions">
                <button class="pill secondary">TR / ₺</button>
                <a class="pill" href="#giris">Giriş Yap</a>
                <a class="pill" href="#kayit">Kayıt Ol</a>
                <a class="pill accent" href="#ilan">İlan Oluştur</a>
            </div>
        </header>

        <div class="grid">
            <div class="panel">
                <div class="hero">
                    <div>
                        <div class="tagline">İlan & Hesap Satış Pazarına Hoş Geldin</div>
                        <h1>Silkroad Online karakter ve item satışını tek panelden yönet</h1>
                        <p>Sunucuya göre filtrele, build detaylarını öne çıkar ve güvenli ödeme altyapısıyla ilanlarını anında yayına al. Onaylı satıcı rozetleri ile güvenli ticaret.</p>
                        <div class="stat-row">
                            <div class="stat"><span class="value">2.4K</span><span class="label">Aktif İlan</span></div>
                            <div class="stat"><span class="value">840</span><span class="label">Onaylı Satıcı</span></div>
                            <div class="stat"><span class="value">12dk</span><span class="label">Ort. Yanıt</span></div>
                        </div>
                    </div>
                    <div class="panel" style="background: linear-gradient(165deg, rgba(245,158,11,0.08), rgba(56,189,248,0.08)); border-style: dashed;">
                        <h3 style="margin-top: 0;">Vitrindeki Hesaplar</h3>
                        <div class="tags">
                            <span class="tag">120 Lv STR Blader</span>
                            <span class="tag">110 Lv Wizard/Cleric</span>
                            <span class="tag">125 Lv Chinese Spear</span>
                            <span class="tag">Warlock/Bard PvP</span>
                            <span class="tag">Legendary Set • +10</span>
                        </div>
                        <p style="color: var(--muted); margin-top: 14px;">Öne çıkan hesaplar vitrine taşınır; güvenli ödeme ve canlı sohbet desteğiyle teklif topla.</p>
                    </div>
                </div>

                <div style="margin-top: 18px; display: flex; gap: 10px; flex-wrap: wrap;">
                    <div class="badge">Sunucu: Jangan</div>
                    <div class="badge">Tür: STR</div>
                    <div class="badge">Seviye: 110-120</div>
                    <div class="badge">Statü: Doğrulanmış Satıcı</div>
                </div>

                <div class="listing-grid">
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
                </div>
            </div>

            <div class="panel" id="giris">
                <div class="auth">
                    <div>
                        <h2>Hızlı Giriş</h2>
                        <p>İlanlarını düzenle, mesaj kutunu ve satış geçmişini takip et.</p>
                    </div>
                    <div class="field">
                        <label for="email">E-posta</label>
                        <input id="email" type="email" placeholder="ornek@mail.com">
                    </div>
                    <div class="field">
                        <label for="password">Şifre</label>
                        <input id="password" type="password" placeholder="••••••••">
                    </div>
                    <button class="pill accent" style="text-align:center; width:100%; border:none;">Giriş Yap</button>
                    <a class="pill" id="kayit" href="#kayit">Kayıt Ol</a>
                    <small style="color: var(--muted);">İlk kez mi buradasın? Kayıt ol ve ilanını güvenli escrow ile yayınla.</small>
                </div>
            </div>
        </div>

        <footer>Topluluk tarafından doğrulanan güvenli ilan & hesap satış pazarına hoş geldin.</footer>
    </div>
</body>
</html>
