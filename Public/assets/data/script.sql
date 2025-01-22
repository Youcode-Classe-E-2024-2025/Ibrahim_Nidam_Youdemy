CREATE DATABASE IF NOT EXISTS youdemy_db;

USE youdemy_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'pending_teacher', 'teacher', 'admin') NOT NULL DEFAULT 'student',
    is_active BOOLEAN DEFAULT TRUE
);

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    content_type ENUM('video', 'document') NOT NULL,
    content_path VARCHAR(255) NOT NULL,
    category_id INT NOT NULL,
    rating TINYINT(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Rating from 0 to 5',
    approval ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    student_id INT NOT NULL,
    UNIQUE (course_id, student_id),
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS course_tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    tag_id INT NOT NULL,
    UNIQUE (course_id, tag_id),
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);

-- Insert Users (Admin, Teachers, Students, Visitors)
INSERT IGNORE INTO users (name, email, password, role, is_active) VALUES
('Admin User', 'a@y.com', '$2a$12$5snq9l/oHpX1ECB62HJSaOZWCRm3rOWTxaifdbW.C9jxLM11MbiEO', 'admin', TRUE),
('John Teacher', 't1@y.com', '$2a$12$5snq9l/oHpX1ECB62HJSaOZWCRm3rOWTxaifdbW.C9jxLM11MbiEO', 'teacher', TRUE),
('Jane Teacher', 't2@y.com', '$2a$12$5snq9l/oHpX1ECB62HJSaOZWCRm3rOWTxaifdbW.C9jxLM11MbiEO', 'teacher', TRUE),
('Alice Student', 's1@y.com', '$2a$12$5snq9l/oHpX1ECB62HJSaOZWCRm3rOWTxaifdbW.C9jxLM11MbiEO', 'student', TRUE),
('Bob Student', 's2@y.com', '$2a$12$5snq9l/oHpX1ECB62HJSaOZWCRm3rOWTxaifdbW.C9jxLM11MbiEO', 'student', TRUE),
('Charlie Student', 's3@y.com', '$2a$12$5snq9l/oHpX1ECB62HJSaOZWCRm3rOWTxaifdbW.C9jxLM11MbiEO', 'student', TRUE);

-- Insert Categories
INSERT IGNORE INTO categories (name) VALUES
('Programming'),
('Design'),
('Data Science'),
('Business'),
('Marketing');

-- Insert Tags
INSERT IGNORE INTO tags (name) VALUES
('Python'),
('JavaScript'),
('Web Development'),
('Graphic Design'),
('Machine Learning'),
('UI/UX'),
('Leadership'),
('SEO');

-- Insert Courses (created by teachers)
INSERT IGNORE INTO courses (teacher_id, title, description, content_type, content_path, category_id) VALUES
(2, 'Python for Beginners', 'Learn the basics of Python programming', 'video', 'path/to/python-course.mp4', 1),
(2, 'Web Development 101', 'Introduction to HTML, CSS, and JavaScript', 'document', 'path/to/web-dev-guide.pdf', 1),
(3, 'Graphic Design Masterclass', 'Become a pro at graphic design using Adobe tools', 'video', 'path/to/design-course.mp4', 2),
(3, 'Leadership Skills', 'Learn leadership skills for managers and professionals', 'document', 'path/to/leadership-guide.pdf', 4),
(2, 'Machine Learning Essentials', 'Introduction to machine learning concepts and techniques', 'video', 'path/to/ml-course.mp4', 3);

-- Insert Course Tags (many-to-many)
INSERT IGNORE INTO course_tags (course_id, tag_id) VALUES
(1, 1),  -- Python for Beginners -> Python
(1, 3),  -- Python for Beginners -> Web Development
(2, 2),  -- Web Development 101 -> JavaScript
(2, 3),  -- Web Development 101 -> Web Development
(3, 4),  -- Graphic Design Masterclass -> Graphic Design
(3, 6),  -- Graphic Design Masterclass -> UI/UX
(4, 7),  -- Leadership Skills -> Leadership
(5, 5);  -- Machine Learning Essentials -> Machine Learning

-- Insert Enrollments (students enrolling in courses)
INSERT IGNORE INTO enrollments (course_id, student_id) VALUES
(1, 4),  -- Alice Student enrolls in Python for Beginners
(1, 5),  -- Bob Student enrolls in Python for Beginners
(2, 4),  -- Alice Student enrolls in Web Development 101
(2, 6),  -- Charlie Student enrolls in Web Development 101
(3, 5),  -- Bob Student enrolls in Graphic Design Masterclass
(4, 6),  -- Charlie Student enrolls in Leadership Skills
(5, 4);  -- Alice Student enrolls in Machine Learning Essentials
