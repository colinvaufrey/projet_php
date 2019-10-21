CREATE TABLE Cart(
    ref INTEGER,
    refProduct INTEGER FOREIGN KEY REFERENCES Products(ref),
    quantity INTEGER
);
CREATE TABLE Users(
    username STRING,
    password STRING,
    myCart INTEGER FOREIGN KEY REFERENCES Cart(ref)
);
CREATE TABLE Products(
    ref INTEGER PRIMARY KEY,
    title STRING,
    img TEXT,
    description TEXT,
    prix REAL,
    color STRING,
    origin STRING
);
