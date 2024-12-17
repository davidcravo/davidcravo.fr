CREATE TABLE IF NOT EXISTS experience (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(255) NOT NULL,
    company VARCHAR(255) NOT NULL,
    start_date VARCHAR(50) NOT NULL,
    end_date VARCHAR(50),
    city VARCHAR(255) NOT NULL,
    description TEXT,
    logo TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;