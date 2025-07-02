🎯 Project Summary
A comprehensive donation management platform demonstrating PHP/Laravel and C#/.NET Core integration with proper accounting principles, designed specifically for Christian relief organizations like Samaritan's Purse.
🏗️ Architecture Overview
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐
│   PHP/Laravel   │    │  C#/.NET Core   │    │     MySQL       │
│   (Main App)    │◄──►│   (Services)    │◄──►│   Database      │
│                 │    │                 │    │                 │
│ • Donor Mgmt    │    │ • Accounting    │    │ • Donations     │
│ • Donations     │    │ • Reporting     │    │ • Donors        │
│ • Public Portal │    │ • Analytics     │    │ • Financial     │
│ • Receipts      │    │ • Fund Tracking │    │ • Campaigns     │
└─────────────────┘    └─────────────────┘    └─────────────────┘
📁 Project Structure
donation-management-system/
├── README.md                          # Project documentation
├── docker-compose.yml                 # Container orchestration
├── 
├── frontend/                          # Shared UI assets
│   ├── css/
│   │   ├── bootstrap.min.css
│   │   └── custom-styles.css
│   ├── js/
│   │   ├── charts.js
│   │   ├── donation-form.js
│   │   └── dashboard.js
│   └── images/
│       └── samaritans-purse-logo.png
│
├── php-laravel-app/                   # Main PHP Application
│   ├── app/
│   │   ├── Http/Controllers/
│   │   │   ├── DonorController.php
│   │   │   ├── DonationController.php
│   │   │   ├── CampaignController.php
│   │   │   └── DashboardController.php
│   │   ├── Models/
│   │   │   ├── Donor.php
│   │   │   ├── Donation.php
│   │   │   └── DonationCampaign.php
│   │   ├── Services/
│   │   │   ├── PaymentService.php
│   │   │   ├── ReceiptService.php
│   │   │   └── AccountingIntegrationService.php
│   │   └── Mail/
│   │       └── DonationReceiptMail.php
│   ├── database/
│   │   ├── migrations/
│   │   │   ├── 2024_01_01_create_donors_table.php
│   │   │   ├── 2024_01_02_create_donations_table.php
│   │   │   └── 2024_01_03_create_campaigns_table.php
│   │   └── seeders/
│   │       └── TestDataSeeder.php
│   ├── resources/
│   │   └── views/
│   │       ├── dashboard.blade.php
│   │       ├── donors/
│   │       ├── donations/
│   │       └── public/
│   │           └── donate.blade.php
│   ├── routes/
│   │   ├── web.php
│   │   └── api.php
│   └── composer.json
│
├── dotnet-financial-services/         # C# .NET Core Services
│   ├── FinancialReporting.API/
│   │   ├── Controllers/
│   │   │   ├── AccountingController.cs
│   │   │   ├── ReportsController.cs
│   │   │   └── AnalyticsController.cs
│   │   ├── Models/
│   │   │   ├── JournalEntry.cs
│   │   │   ├── FinancialAccount.cs
│   │   │   └── ReportModels.cs
│   │   ├── Services/
│   │   │   ├── IAccountingService.cs
│   │   │   ├── AccountingService.cs
│   │   │   └── ReportingService.cs
│   │   ├── Data/
│   │   │   └── ApplicationDbContext.cs
│   │   ├── DTOs/
│   │   │   ├── DonationDto.cs
│   │   │   └── ReportDto.cs
│   │   ├── Program.cs
│   │   └── appsettings.json
│   └── FinancialReporting.Tests/
│       └── AccountingServiceTests.cs
│
└── database/                          # Shared Database Scripts
    ├── schema.sql                     # Complete database schema
    ├── seed-data.sql                  # Sample data for testing
    └── financial-accounts-setup.sql   # Chart of accounts setup
🚀 Key Features Demonstrated
PHP/Laravel Components:

Donor Management: CRUD operations with relationship mapping
Donation Processing: Payment integration with Stripe/PayPal simulation
Receipt Generation: PDF creation using DomPDF
Email Notifications: Automated thank-you emails and receipts
Public Donation Portal: Responsive frontend for online donations
Campaign Management: Track different fundraising campaigns

C#/.NET Core Components:

Accounting Engine: Automated journal entry creation
Financial Reporting: Generate statements and fund reports
Data Analytics: Donation trends and donor insights
RESTful APIs: Clean API design with proper HTTP methods
Fund Accounting: Restricted vs unrestricted fund tracking

Integration Features:

HTTP API Communication: PHP calls C# services via REST APIs
Shared Database: Both applications use same MySQL database
Containerization: Docker setup for easy deployment
Error Handling: Graceful failure handling between services

🛠️ Technologies Used
Backend:

PHP 8.1+ with Laravel 10
C# .NET 6 with ASP.NET Core Web API
MySQL 8.0 for data persistence
Entity Framework Core for C# data access
Eloquent ORM for PHP data access

Frontend:

HTML5/CSS3 with Bootstrap 5
JavaScript (ES6+) for interactivity
Chart.js for data visualization
Blade templating engine

DevOps & Tools:

Docker & Docker Compose for containerization
Git for version control
PHPUnit and xUnit for testing
Swagger/OpenAPI for API documentation