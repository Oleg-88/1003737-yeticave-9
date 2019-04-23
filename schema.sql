CREATE DATABASE yeticave
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name CHAR(64) NOT NULL -- название
);

CREATE TABLE lots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- дата размещения
    name CHAR(64) NOT NULL, -- название
    description TEXT NOT NULL, -- описание
    image CHAR(128) NOT NULL, -- изображение
    price DECIMAL NOT NULL, -- стартоваая цена
    end_date TIMESTAMP NOT NULL, -- дата завершения
    bid_step DECIMAL NOT NULL DEFAULT 100, -- шаг ставки
    user_id INT NOT NULL, -- автор, связь с users
    winner_id INT NOT NULL, -- категория, связь с users
    category_id INT NOT NULL -- победитель, связь с categories
);

CREATE TABLE bids (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bid_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- дата размещения ставки
    bid DECIMAL NOT NULL, -- ставка пользователя
    user_id INT NOT NULL, -- пользователь, связь с users
    lot_id INT NOT NULL -- лот, связь с lots
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- дата регистрации
    email CHAR(64) NOT NULL UNIQUE, -- адрес электронной почты
    name CHAR(64) NOT NULL, -- имя пользователя
    password CHAR(64) NOT NULL, -- пароль
    avatar CHAR(128), -- аватар пользователя
    contact TEXT NOT NULL, -- контактные данные
    lot_id INT NOT NULL, -- лоты пользователя, связь с lots
    bid_id INT NOT NULL -- лоты пользователя, связь с bids
);

CREATE UNIQUE INDEX u_email ON users(email); -- уникальный индекс для почтовых адресов

CREATE INDEX l_category ON lots(category_id); -- индекс для поиска по категория
CREATE INDEX l_name ON lots(name) -- индекс для поиска по названиям лотов