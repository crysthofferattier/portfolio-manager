create database portfolio;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` VALUES (1,'test@email.com','$2y$10$1n8QVsQUACvu.Bxj8ka6heaZxvMcrsA35BtS8gDGqj/Y.LPCn/ciG','2023-07-28 21:23:32','2023-07-28 21:23:32'),(2,'test1@email.com','$2y$10$fwqK6F.rCCfU.99kMKq3i.Bg8U8vLkwP/DgizfmWHjnqART9wKew6','2023-07-29 02:09:28','2023-07-29 02:09:28');

CREATE TABLE assets_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(10) NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP
) CHARSET = utf8mb4;

insert into assets_type (name, created) values ('FII', NOW());
insert into assets_type (name, created) values ('STOCK', NOW());

CREATE TABLE assets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    symbol VARCHAR(20) NOT NULL,
    name VARCHAR(75) NOT NULL,
    asset_type_id INT NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (asset_type_id) REFERENCES assets_type(id)
);

CREATE TABLE dividends (
    id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT NOT NULL,
    date DATE NOT NULL,
    share INT NOT NULL,
    value DECIMAL(10, 2) NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (asset_id) REFERENCES assets(id)
);

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT NOT NULL,
    quantity DECIMAL(10, 2) NOT NULL,
    value DECIMAL(10, 2) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    trade_date DATE NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (asset_id) REFERENCES assets(id)
) CHARSET = utf8mb4;