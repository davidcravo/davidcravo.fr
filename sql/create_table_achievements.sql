CREATE TABLE IF NOT EXISTS achievements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    client VARCHAR(255) NOT NULL,
    technologies VARCHAR(255) NOT NULL,
    description TEXT,
    date VARCHAR(255),
    url TEXT,
    image VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;