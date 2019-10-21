CREATE TABLE Cart(
  ref INTEGER,
  refProduct INTEGER FOREIGN KEY REFERENCES Products(ref),
  quantity INTEGER
);
CREATE TABLE Users(
  username STRING,
  password HASH
  myCart INTEGER FOREIGN KEY REFERENCES Cart(ref),
);
CREATE TABLE Products(
  ref INTEGER PRIMARY KEY,
  img TEXT,
  title TEXT,
  description TEXT,
  prix REAL
);
