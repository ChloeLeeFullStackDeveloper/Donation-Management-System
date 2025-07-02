-- Save this as: database/scripts/setup.sql

USE donation_system;

-- Donors table
CREATE TABLE donors (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Donation campaigns
CREATE TABLE donation_campaigns (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    description TEXT,
    target_amount DECIMAL(12,2) DEFAULT 0,
    current_amount DECIMAL(12,2) DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Donations table
CREATE TABLE donations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    donor_id INT NOT NULL,
    campaign_id INT NULL,
    amount DECIMAL(10,2) NOT NULL,
    donation_type ENUM('one-time', 'recurring') DEFAULT 'one-time',
    fund_restriction ENUM('unrestricted', 'restricted') DEFAULT 'unrestricted',
    fund_purpose VARCHAR(200),
    transaction_id VARCHAR(100),
    donation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    receipt_sent BOOLEAN DEFAULT FALSE,
    receipt_number VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (donor_id) REFERENCES donors(id) ON DELETE CASCADE,
    FOREIGN KEY (campaign_id) REFERENCES donation_campaigns(id) ON DELETE SET NULL
);

-- Financial accounts for accounting
CREATE TABLE financial_accounts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    account_code VARCHAR(20) UNIQUE NOT NULL,
    account_name VARCHAR(200) NOT NULL,
    account_type ENUM('asset', 'liability', 'equity', 'revenue', 'expense') NOT NULL,
    is_active BOOLEAN DEFAULT TRUE
);

-- Journal entries
CREATE TABLE journal_entries (
    id INT PRIMARY KEY AUTO_INCREMENT,
    entry_date DATE NOT NULL,
    reference_number VARCHAR(50) UNIQUE NOT NULL,
    description TEXT NOT NULL,
    total_amount DECIMAL(12,2) NOT NULL,
    source_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Journal entry lines
CREATE TABLE journal_entry_lines (
    id INT PRIMARY KEY AUTO_INCREMENT,
    journal_entry_id INT NOT NULL,
    account_id INT NOT NULL,
    debit_amount DECIMAL(10,2) DEFAULT 0.00,
    credit_amount DECIMAL(10,2) DEFAULT 0.00,
    description TEXT,
    FOREIGN KEY (journal_entry_id) REFERENCES journal_entries(id) ON DELETE CASCADE,
    FOREIGN KEY (account_id) REFERENCES financial_accounts(id) ON DELETE RESTRICT
);

-- Users for admin
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff') DEFAULT 'staff',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert basic financial accounts
INSERT INTO financial_accounts (account_code, account_name, account_type) VALUES
('1000', 'Cash - General Fund', 'asset'),
('1001', 'Cash - Restricted Fund', 'asset'),
('4000', 'Revenue - Unrestricted', 'revenue'),
('4001', 'Revenue - Restricted', 'revenue');

-- Insert sample campaigns
INSERT INTO donation_campaigns (name, description, target_amount) VALUES
('General Ministry Fund', 'Support ongoing ministry work', 100000.00),
('Emergency Relief', 'Disaster response and emergency aid', 50000.00),
('Children Programs', 'Support for children education and welfare', 75000.00);

-- Insert admin user (password: 'password')
INSERT INTO users (name, email, password, role) VALUES
('Admin User', 'admin@samaritan.ca', '$2y$12$LQv3c1ydiCSmqmdHK4uiXOoKkM6/VE1CvEFKxG.3o4F4z.gqfR1fW', 'admin');

-- Insert sample donors
INSERT INTO donors (first_name, last_name, email, phone) VALUES
('John', 'Smith', 'john@example.com', '403-555-0101'),
('Sarah', 'Johnson', 'sarah@example.com', '403-555-0102'),
('Michael', 'Brown', 'michael@example.com', '403-555-0103');

-- Insert sample donations
INSERT INTO donations (donor_id, campaign_id, amount, fund_restriction, transaction_id, receipt_number) VALUES
(1, 1, 250.00, 'unrestricted', 'TXN001', 'RCP24001'),
(2, 2, 500.00, 'restricted', 'TXN002', 'RCP24002'),
(3, 3, 100.00, 'restricted', 'TXN003', 'RCP24003');