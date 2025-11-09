CREATE TABLE rescuers (
    id INT AUTO_INCREMENT PRIMARY KEY,

    full_name VARCHAR(150) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(20) NOT NULL,
    national_id VARCHAR(50) NOT NULL,

    division VARCHAR(50) NOT NULL,
    full_address TEXT NOT NULL,

    phone VARCHAR(20) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,

    password VARCHAR(100) NOT NULL,

    experience VARCHAR(50) NOT NULL,
    certificate_id VARCHAR(100) DEFAULT NULL,
    motivation TEXT NOT NULL,

    newsletter TINYINT(1) DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

