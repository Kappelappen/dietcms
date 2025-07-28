
-- Table: articles
CREATE TABLE IF NOT EXISTS article (

    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    article_desc TEXT NOT NULL,
    content TEXT NOT NULL,
    author TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    
);

-- Table: categories
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);

-- Table: article_categories (many-to-many relation)
CREATE TABLE IF NOT EXISTS article_categories (
    article_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY(article_id, category_id),
    FOREIGN KEY(article_id) REFERENCES article(id) ON DELETE CASCADE,
    FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Table: tags
CREATE TABLE IF NOT EXISTS tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

-- Table: article_tags (many-to-many relation)
CREATE TABLE IF NOT EXISTS article_tags (
    article_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY(article_id, tag_id),
    FOREIGN KEY(article_id) REFERENCES article(id) ON DELETE CASCADE,
    FOREIGN KEY(tag_id) REFERENCES tags(id) ON DELETE CASCADE
);

-- Skapa tabellen om den inte redan finns

CREATE TABLE IF NOT EXISTS users (

  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE TABLE users;

-- Lösenord: admin123
INSERT INTO users (username, password, email, created_at) VALUES
('admin', '$2y$10$RrH1TfKQWsf4vlJujQnp7OLm2PRdKqLDID3umL1mmbWn1BdZfQwE6', 'admin@example.com', NOW());

-- Lösenord: editor123
INSERT INTO users (username, password, email, created_at) VALUES
('editor', '$2y$10$EazEyI0mG03vWdpwh9RYxO6gNctVRdk0Kz1gFcH3CtOCNf10xFh9S', 'editor@example.com', NOW());

-- Lösenord: user123
INSERT INTO users (username, password, email, created_at) VALUES
('user', '$2y$10$YiZrM9U6Px8fuTZ/NyqjGOGU.50zFj4w7SStD/oz9HxREsmWRLkUW', 'user@example.com', NOW());
