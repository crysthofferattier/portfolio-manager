CREATE TABLE transactions_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    symbol VARCHAR(10) NOT NULL,
    created DATETIME
) CHARSET = utf8mb4;
INSERT INTO transactions_type (id, symbol, created)
VALUES (1, 'SELIC', NOW());
INSERT INTO transactions_type (id, symbol, created)
VALUES (2, 'FII', NOW());
INSERT INTO transactions_type (id, symbol, created)
VALUES (3, 'STOCKS', NOW());
INSERT INTO transactions_type (id, symbol, created)
VALUES (4, 'CRYPTO', NOW());
CREATE TABLE assets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    symbol VARCHAR(20) NOT NULL,
    type_id INT NOT NULL,
    FOREIGN KEY (type_id) REFERENCES transactions_type(id)
);
INSERT INTO assets (symbol, type_id)
VALUES ('KNCR11', 2),
    ('PETR4F', 3),
    ('ITSA4F', 3),
    ('BBAS3F', 3),
    ('CPTS11', 2),
    ('HGLG11', 2),
    ('TAEE11F', 3),
    ('BCFF11', 2),
    ('SELIC 2029', 1);
CREATE TABLE dividends (
    id INT AUTO_insert intoINCREMENT PRIMARY KEY,
    asset_id INT NOT NULL,
    date DATE NOT NULL,
    value DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (asset_id) REFERENCES assets(id)
);
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT NOT NULL,
    quantity DECIMAL(10, 2) NOT NULL,
    value DECIMAL(10, 2) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    trade_date DATE NOT NULL,
    type_id INT NOT NULL,
    FOREIGN KEY (type_id) REFERENCES transactions_type(id),
    FOREIGN KEY (asset_id) REFERENCES assets(id),
    created DATETIME
) CHARSET = utf8mb4;
INSERT INTO transactions (
        trade_date,
        asset_id,
        value,
        quantity,
        total,
        type_id
    )
VALUES ("2023-07-20", "7", "36.13", "5", "180.65", "3")