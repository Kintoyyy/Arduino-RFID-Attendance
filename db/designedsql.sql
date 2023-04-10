CREATE TABLE
    students_data (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        student_name VARCHAR(100) NOT NULL,
        student_section INT NOT NULL,
        student_gender VARCHAR(10),
        student_id INT NOT NULL UNIQUE,
        student_card_id INT NOT NULL UNIQUE,
        student_registered INT NOT NULL
    );

CREATE TABLE
    device_data (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        device_api_key VARCHAR(30) NOT NULL UNIQUE,
        device_name VARCHAR(30) NOT NULL,
        device_room VARCHAR(20),
        device_floor VARCHAR(20) NOT NULL,
        device_building VARCHAR(20) NOT NULL
    );

CREATE TABLE
    student_sections (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        section_name VARCHAR(20) NOT NULL,
        section_adviser VARCHAR(50) NOT NULL,
        section_room VARCHAR(20) NOT NULL,
        section_floor VARCHAR(20) NOT NULL,
        section_building VARCHAR(20) NOT NULL
    );

CREATE TABLE
    device_api_logs (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        device_api_key VARCHAR(30) NOT NULL,
        student_id INT NOT NULL,
        api_event_id INT AUTO_INCREMENT NOT NULL,
        log_time TIMESTAMP NOT NULL
    );

CREATE TABLE
    attendance_logs (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        student_id INT NOT NULL,
        api_log INT NOT NULL,
        attendance_event INT NOT NULL,
        log_time TIMESTAMP NOT NULL
    );

CREATE TABLE
    hallpass_logs (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        student_id INT NOT NULL,
        hallpass_id INT NOT NULL,
        api_log INT NOT NULL,
        log_time TIMESTAMP NOT NULL,
        hallpass_activated_time DATETIME NOT NULL
    );

CREATE TABLE
    hallpass_data (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        hallpass_name VARCHAR(50) NOT NULL,
        hallpass_destination VARCHAR(20) NOT NULL,
        hallpass_room VARCHAR(20) NOT NULL,
        hallpass_floor VARCHAR(20) NOT NULL,
        hallpass_building VARCHAR(20) NOT NULL,
        keypad_key CHAR NOT NULL UNIQUE
    );

CREATE TABLE
    device_logs (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        device_id INT NOT NULL,
        api_log INT NOT NULL,
        device_event VARCHAR(20) NOT NULL
    );

CREATE TABLE
    user_data (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        user_name VARCHAR(50) NOT NULL UNIQUE,
        user_password VARCHAR(100) NOT NULL,
        user_privilege INT NOT NULL
    );

ALTER TABLE students_data ADD CONSTRAINT students_data_student_section_student_sections_id FOREIGN KEY (student_section) REFERENCES student_sections (id);

ALTER TABLE students_data ADD CONSTRAINT students_data_student_registered_device_data_id FOREIGN KEY (student_registered) REFERENCES device_data (id);

ALTER TABLE device_api_logs ADD CONSTRAINT device_api_logs_device_api_key_device_data_device_api_key FOREIGN KEY (device_api_key) REFERENCES device_data (device_api_key);

ALTER TABLE device_api_logs ADD CONSTRAINT device_api_logs_student_id_students_data_id FOREIGN KEY (student_id) REFERENCES students_data (id);

ALTER TABLE attendance_logs ADD CONSTRAINT attendance_logs_student_id_students_data_id FOREIGN KEY (student_id) REFERENCES students_data (id);

ALTER TABLE attendance_logs ADD CONSTRAINT attendance_logs_api_log_device_api_logs_id FOREIGN KEY (api_log) REFERENCES device_api_logs (id);

ALTER TABLE hallpass_logs ADD CONSTRAINT hallpass_logs_student_id_students_data_id FOREIGN KEY (student_id) REFERENCES students_data (id);

ALTER TABLE hallpass_logs ADD CONSTRAINT hallpass_logs_hallpass_id_hallpass_data_id FOREIGN KEY (hallpass_id) REFERENCES hallpass_data (id);

ALTER TABLE hallpass_logs ADD CONSTRAINT hallpass_logs_api_log_device_api_logs_id FOREIGN KEY (api_log) REFERENCES device_api_logs (id);

ALTER TABLE device_logs ADD CONSTRAINT device_logs_device_id_device_data_id FOREIGN KEY (device_id) REFERENCES device_data (id);

ALTER TABLE device_logs ADD CONSTRAINT device_logs_api_log_device_api_logs_id FOREIGN KEY (api_log) REFERENCES device_api_logs (id);