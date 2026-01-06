INSERT INTO users (name, email, password, role) VALUES
('Demo Satıcı', 'satici@demo.com', '$2y$10$examplehash', 'seller'),
('Demo Alıcı', 'alici@demo.com', '$2y$10$examplehash', 'buyer'),
('Yönetici', 'admin@admin.com', '$2y$12$Z8UQbcx2eAZuTTLoZM8Xmu.fXwajBWvbzrFHqJj30C5F/nu/LApdS', 'admin'),
('Kullanıcı', 'kullanici@kullanici.com', '$2y$12$Z8UQbcx2eAZuTTLoZM8Xmu.fXwajBWvbzrFHqJj30C5F/nu/LApdS', 'seller');

INSERT INTO stores (user_id, name, slug, support_email, address) VALUES
(1, 'Demo Mağaza', 'demo-magaza', 'destek@demo.com', 'İstanbul, Türkiye');

INSERT INTO listings (user_id, store_id, title, category, price, stock, delivery_methods, description, tags, status) VALUES
(1, 1, '4K Drone', 'Elektronik', 3200.00, 5, JSON_ARRAY('Kargo', 'Elden Teslim'), '4K kamera, 30dk uçuş süresi, sıfır kutu.', 'drone,4k,kargo', 'published'),
(1, 1, 'Vintage Plak', 'Koleksiyon', 450.00, 12, JSON_ARRAY('Kargo'), 'Temiz koleksiyon ürünü, koruma kılıfı ile gönderilir.', 'plak,vintage', 'pending');

INSERT INTO campaigns (name, category, commission_rate, discount_rate, active) VALUES
('Kış İndirimi', 'Elektronik', 8.00, 2.00, TRUE),
('Yeni Satıcı', 'Moda', 6.00, 0.00, TRUE);

INSERT INTO categories (name, schema_definition) VALUES
('Elektronik', JSON_OBJECT('fields', JSON_ARRAY('Marka', 'Garanti', 'Durum'))),
('Koleksiyon', JSON_OBJECT('fields', JSON_ARRAY('Sertifika', 'Yıl', 'Baskı')));
