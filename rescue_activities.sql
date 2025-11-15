CREATE TABLE rescue_activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rescuer_id INT NOT NULL,
    rescue_type VARCHAR(50) NOT NULL,
    rescue_date DATE NOT NULL,
    species_name VARCHAR(100),
    size VARCHAR(50),
    location VARCHAR(255) NOT NULL,
    `condition` VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    action VARCHAR(100) NOT NULL,
    notes TEXT,
    rescue_photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (rescuer_id) REFERENCES rescuers(id)
);
