.read remove.sql

CREATE TABLE Products(
    ref INTEGER PRIMARY KEY,
    title STRING,
    img TEXT,
    description TEXT,
    prix REAL,
    color STRING,
    origin STRING,
    stock INTEGER
);

CREATE TABLE Users(
    username STRING,
    password BINARY[60]
);

CREATE TABLE CartItem(
    username STRING,
    refProduct INTEGER,
    quantity INTEGER,
    FOREIGN KEY (refProduct) REFERENCES Products(ref),
    PRIMARY KEY (username, refProduct)
);

.separator |
.import Products.txt Products
.import Users.txt Users
.import CartItem.txt CartItem
