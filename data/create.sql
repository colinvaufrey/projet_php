CREATE TABLE Products(
    ref INTEGER PRIMARY KEY,
    title STRING,
    img TEXT,
    description TEXT,
    price REAL,
    color STRING,
    origin STRING,
    stock INTEGER
);
CREATE TABLE Users(
    username STRING PRIMARY KEY,
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
