USE yeticave;

INSERT INTO categories (name, category_en)
VALUES  ('Доски и лыжи', 'boards'),
        ('Крепления', 'attachment'),
        ('Ботинки', 'boots'),
        ('Одежда', 'clothing'),
        ('Инструменты', 'tools'),
        ('Разное', 'other');

INSERT INTO users (email, name, password, contact)
VALUES  ('oleg.russak88@gmail.com', 'Олег', '123', 'Почта - oleg.russak88@gmail.com'),
        ('anastassia.russak@gmail.com', 'Настя', '321', 'Почта - anastassia.russak@gmail.com');

INSERT INTO lots (name, description, image, price, end_date, user_id, category_id)
VALUES  ('2014 Rossignol District Snowboard', 'Сноуборд.', 'http://1003737-yeticave-9/img/lot-1.jpg', 10999,
'01.07.2019', 1, 1),
        ('DC Ply Mens 2016/2017 Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке,
растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях,
наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим
прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,
просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
'http://1003737-yeticave-9/img/lot-2.jpg', 159999, '01.07.2019', 2, 1),
        ('Крепления Union Contact Pro 2015 года размер L/XL', 'Крепления.', 'http://1003737-yeticave-9/img/lot-3.jpg',
8000, '01.07.2019', 1, 2),
        ('Ботинки для сноуборда DC Mutiny Charocal', 'Ботинки.', 'http://1003737-yeticave-9/img/lot-4.jpg',
10999, '01.07.2019', 2, 3),
        ('Куртка для сноуборда DC Mutiny Charocal', 'Куртка.', 'http://1003737-yeticave-9/img/lot-5.jpg',
7500, '01.07.2019', 1, 4),
        ('Маска Oakley Canopy', 'Маска.', 'http://1003737-yeticave-9/img/lot-6.jpg', 5400, '01.07.2019', 2, 6);

INSERT INTO bids (bid, user_id, lot_id)
VALUES  (500000, 1, 2),
        (555000, 2, 1);

-- получить все категории
SELECT name FROM categories;

-- получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, название категории;
SELECT l.name, price, image, max(bid) as win_bid, category FROM lots l
JOIN categories c ON l.category_id = c.id
LEFT JOIN bids b ON b.lot_id = l.id
WHERE winner_id IS NULL
ORDER BY l.id DESC;

-- показать лот по его id. Получите также название категории, к которой принадлежит лот
SELECT l.id, l.name, c.name FROM lots l
JOIN categories c ON l.category_id = c.id
WHERE l.id = 1;

-- обновить название лота по его идентификатору
UPDATE lots SET name = 'Rossignol District Snowboard 2014'
WHERE id = 1;

-- получить список самых свежих ставок для лота по его идентификатору
SELECT * FROM bids
WHERE lot_id = 1
ORDER BY l.id DESC;