-- Create database task_management
CREATE DATABASE IF NOT EXISTS task_management;

-- Switch to task_management database
USE task_management;

-- Create the tasks table
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    due_date DATE NOT NULL,
    priority ENUM('Low', 'Medium', 'High') NOT NULL,
    status ENUM('To Do', 'In Progress', 'Completed') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert some sample tasks
INSERT INTO tasks (title, description, due_date, priority, status) VALUES
('Complete Project', 'Work on the project documentation and code', '2025-01-30', 'High', 'In Progress'),
('Submit Assignment', 'Finish and submit the assignment by the deadline', '2025-01-28', 'Medium', 'To Do'),
('Team Meeting', 'Discuss project updates and next steps', '2025-01-27', 'Low', 'Completed');
