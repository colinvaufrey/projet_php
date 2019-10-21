CREATE TABLE Products(
    ref INTEGER PRIMARY KEY,
    title STRING,
    img TEXT,
    description TEXT,
    prix REAL,
    color STRING,
    origin STRING
);
CREATE TABLE Cart(
    ref INTEGER,
    refProduct INTEGER,
    quantity INTEGER,
    FOREIGN KEY (refProduct) REFERENCES Products(ref)
);
CREATE TABLE Users(
    username STRING,
    password STRING,
    myCart INTEGER,
    FOREIGN KEY (myCart) REFERENCES Cart(ref)
);
