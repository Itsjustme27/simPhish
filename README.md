📧 Phishy - Advanced Phishing Simulation Platform
![Phishy Bannerttps://img.shieldss://tps://img.shields.io/badgehy** is an innovative cybersecurity education platform that revolutionizes phishing awareness training through multi-perspective learning. Built with Laravel 11, it provides a comprehensive ecosystem where users experience cybersecurity from three critical viewpoints: Attacker, Victim, and Defender.

🌟 Key Features
🎭 Multi-Perspective Learning System
Attacker Mode: Learn social engineering tactics and email crafting techniques

Victim Mode: Experience realistic phishing scenarios in a safe environment

Defender Mode: Develop threat detection and email analysis skills

🔐 Advanced Security Features
Role-Based Access Control (RBAC) with Spatie Laravel Permission

Password Strength Tracking with real-time compliance monitoring

Comprehensive Admin Dashboard with user management capabilities

Dark/Light Mode Support for enhanced user experience

🤖 Intelligent Bot Simulation
Probability-based victim responses with realistic scoring algorithms

Event-driven architecture for seamless simulation flow

Real-time feedback on phishing campaign effectiveness

📊 Professional Admin Interface
User management with password security auditing

Real-time statistics and compliance tracking

Role assignment and permission management

Responsive design with Bootstrap 5.3

📸 Screenshots
Dashboard Overview
![Main Dashboard](screenshots/dashboar three-module learning approach*

Admin Panel
Comprehensive admin dashboard with user management and security metrics

Attacker Mode
![Attacker Interface](screenshots/attackernteraction*

Victim Mode
![Victim Experienceg email experience with educational feedback*

Defender Mode
![Defender Analysisd threat detection interface*

Dark Mode Support
Professional dark theme across all interfaces

🚀 Installation
Prerequisites
PHP 8.4+

Composer

Node.js & NPM

MySQL/PostgreSQL

Laravel 11.x

Quick Setup
Clone the repository

bash
git clone https://github.com/yourusername/phishy.git
cd phishy
Install dependencies

bash
composer install
npm install
Environment configuration

bash
cp .env.example .env
php artisan key:generate
Database setup

bash
# Configure your database in .env file
php artisan migrate
php artisan db:seed
Install Spatie Permission

bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
Build assets

bash
npm run build
# or for development
npm run dev
Start the application

bash
php artisan serve
Visit http://localhost:8000 to access Phishy!

🏗️ Architecture
Core Components
text
Phishy/
├── 🎭 Attacker Module     # Social engineering simulation
├── 👤 Victim Module       # Phishing experience training  
├── 🛡️ Defender Module     # Threat detection & analysis
├── 👑 Admin Dashboard     # User & security management
└── 🔐 RBAC System        # Role-based access control
Technical Stack
Backend: Laravel 11 with PHP 8.4+

Frontend: Bootstrap 5.3 with responsive design

Database: MySQL with Eloquent ORM

Authentication: Laravel Breeze with custom enhancements

Permissions: Spatie Laravel Permission

Assets: Vite for modern asset compilation

📚 Usage Guide
For Students/Trainees
Register with a strong password (enforced by our security system)

Choose a learning perspective:

Start with Victim Mode to understand vulnerabilities

Try Attacker Mode to learn social engineering tactics

Use Defender Mode to develop detection skills

Progress through scenarios and receive immediate feedback

For Administrators
Access admin dashboard at /admin/dashboard

Monitor user activity and password compliance

Manage user roles and permissions

Track learning progress across all modules

Default Users
After seeding, you can login with:

Admin: admin@phishy.com / AdminPhishy2025!Sec#

User: Create via registration with strong password

🎯 Educational Objectives
Learning Outcomes
Understand common phishing tactics and social engineering techniques

Recognize suspicious emails and malicious content patterns

Develop critical thinking skills for cybersecurity threats

Experience the full attack lifecycle from multiple perspectives

Build defensive mindset and threat awareness

Target Audience
Corporate employees needing cybersecurity awareness training

Students learning about information security

IT professionals developing security skills

Organizations implementing security education programs

🛠️ Development
Key Features Implementation
Password Strength Tracking
php
// Real-time password compliance monitoring
'password_meets_requirements' => $passwordStrength['meets_requirements'],
'password_strength_details' => json_encode($passwordStrength['details']),
Event-Driven Bot Simulation
php
// Probability-based victim simulation
$event = new BotLaunched($message, $subject);
event($event);
$result = $event->result; // Realistic success/failure scoring
Advanced Threat Detection
php
// Pattern-based email analysis
$suspiciousPatterns = [
    '/http[s]?:\/\/[^\s]+/i',                // Links
    '/(verify|confirm|reset).{0,20}(account|password)/i', // Phishing intent
    '/urgent|suspended|locked/i',            // Social engineering
];
Contributing
Fork the repository

Create a feature branch (git checkout -b feature/amazing-feature)

Commit your changes (git commit -m 'Add amazing feature')

Push to the branch (git push origin feature/amazing-feature)

Open a Pull Request

📈 Future Enhancements
 Multiplayer Mode - Real-time competitive phishing simulations

 Advanced Analytics - Detailed learning progress tracking

 API Integration - RESTful API for external integrations

 Mobile App - Native mobile application for training

 AI-Powered Scenarios - Dynamic phishing content generation

 Certification System - Formal cybersecurity awareness certificates

🏆 Recognition
This project demonstrates:

Innovative educational approach to cybersecurity training

Professional software development with Laravel best practices

User experience design with responsive, accessible interfaces

Security-first mindset with comprehensive protection measures

🎖️ CTF & Security Background
Built by a cybersecurity enthusiast with:

CTF Competition Experience - Currently ranked 5th in Nepal on CTFTIME

Specialization in 'misc' category challenges

Network security expertise using tools like nc and advanced networking

Real-world security administration experience

📄 License
This project is licensed under the MIT License - see the LICENSE file for details.

🤝 Acknowledgments
Laravel Community for the excellent framework and documentation

Spatie for the robust permission management package

Bootstrap Team for the responsive UI framework

CTF Community for inspiration and security best practices

Cybersecurity Community for educational methodologies


