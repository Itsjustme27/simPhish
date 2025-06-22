## 📧 Phishy - Advanced Phishing Simulation Platform

**Phishy** is an innovative cybersecurity education platform that revolutionizes phishing awareness training through multi-perspective learning. Built with Laravel 11, it provides a comprehensive ecosystem where users experience cybersecurity from three critical viewpoints: Attacker, Victim, and Defender.

## 🌟 Key Features

### 🎭 Multi-Perspective Learning System

- Attacker Mode: Learn social engineering tactics and email crafting techniques

- Victim Mode: Experience realistic phishing scenarios in a safe environment

- Defender Mode: Develop threat detection and email analysis skills

### 🔐 Advanced Security Features:

- Role-Based Access Control (RBAC) with Spatie Laravel Permission

- Password Strength Tracking with real-time compliance monitoring

- Comprehensive Admin Dashboard with user management capabilities

- Dark/Light Mode Support for enhanced user experience


### 🤖 Intelligent Bot Simulation:

- Probability-based victim responses with realistic scoring algorithms

- Event-driven architecture for seamless simulation flow

- Real-time feedback on phishing campaign effectiveness

📊 Professional Admin Interface:

- User management with password security auditing

- Real-time statistics and compliance tracking

- Role assignment and permission management

- Responsive design with Bootstrap 5.3

### 📸 Screenshots:

- Main Dashboard:
![Dashboard Screenshot](https://via.placeholder.com/800x500/f8f9fa/6c757d?text=Dashboard+Screenshot*

- Admin Panel:
![Admin Panel Screenshot](https://via.placeholder.com/800x500/e74a3b/ffffff?text=Admin+d security metrics*

-Attacker Mode
![Attacker Mode Screenshot](https://via.placeholder.com/800x500/dc3545/ffffff?text=Attacker+Mode+Screenshot+ interaction and probability scoring*

- Victim Mode:
![Victim Mode Screenshot](https:// experience with educational feedback*

- Defender Mode:
![Defender Mode Screenshot](https://via.placeholder.com/800x500/007bff/ffffff?text=Defender recognition*

- Dark Mode Support
![Dark Mode Screenshot](https://via.placeholder.com/800x500/343a40/ffffff?text=Dark+Mode dark theme across all interfaces*

🚀 Installation:

- Prerequisites:
  
- PHP 8.4+

- Composer 2.x

- Node.js 18+ & NPM

- MySQL 8.0+ or PostgreSQL 13+

- Laravel 11.x

Quick Setup:

- Clone the repository

```bash
git clone https://github.com/yourusername/phishy.git
cd phishy
Install dependencies
```

```bash
composer install
npm install
Environment configuration
```

```bash
cp .env.example .env
php artisan key:generate
Database setup
```

```bash
# Configure your database in .env file
php artisan migrate
php artisan db:seed



Install Spatie Permission
```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
Build assets
```

```bash
npm run build
# or for development
npm run dev
Start the application
```

```bash
php artisan serve
Visit http://localhost:8000 to access Phishy!
```

🏗️ Architecture:

- Core Components

```text
Phishy/
├── 🎭 Attacker Module     # Social engineering simulation
│   ├── Email crafting interface
│   ├── Bot simulation system
│   └── Probability-based scoring
├── 👤 Victim Module       # Phishing experience training
│   ├── Realistic email inbox
│   ├── Fake login pages
│   └── Educational feedback
├── 🛡️ Defender Module     # Threat detection & analysis
│   ├── Email pattern recognition
│   ├── Suspicious content scanner
│   └── Security analysis tools
├── 👑 Admin Dashboard     # User & security management
│   ├── User management system
│   ├── Password compliance tracking
│   └── Real-time statistics
└── 🔐 RBAC System        # Role-based access control
    ├── User roles (admin/user)
    ├── Permission management
    └── Secure authentication
```

### Technical Stack:
  
Component	Technology:

- Backend : Laravel 11 with PHP 8.4+
- Frontend : Bootstrap 5.3 with responsive design
- Database : MySQL with Eloquent ORM
- Authentication : Laravel Breeze with custom enhancements
- Permissions : Spatie Laravel Permission
- Assets : Vite for modern asset compilation
- UI Framework : Bootstrap 5.3 with custom SCSS
- Icons : Font Awesome 6.0


### 📚 Usage Guide:

- For Students/Trainees
    -Register with a strong password (enforced by our security system)

1) Choose a learning perspective:

    - Start with Victim Mode to understand vulnerabilities

    - Try Attacker Mode to learn social engineering tactics

    - Use Defender Mode to develop detection skills

    - Progress through scenarios and receive immediate feedback

2) For Administrators

    - Access admin dashboard at /admin/dashboard

    - Monitor user activity and password compliance

    - Manage user roles and permissions

    - Track learning progress across all modules


### 🎯 Educational Objectives:

1) Learning Outcomes:

✅ Understand common phishing tactics and social engineering techniques

✅ Recognize suspicious emails and malicious content patterns

✅ Develop critical thinking skills for cybersecurity threats

✅ Experience the full attack lifecycle from multiple perspectives

✅ Build defensive mindset and threat awareness

2) Target Audience:
🏢 Corporate employees needing cybersecurity awareness training

🎓 Students learning about information security

💻 IT professionals developing security skills

🏛️ Organizations implementing security education programs

### 🛠️ Development
- Key Features Implementation
- Password Strength Tracking

```php
// Real-time password compliance monitoring
protected function create(array $data)
{
    $passwordStrength = $this->evaluatePasswordStrength($data['password']);
    
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'password_meets_requirements' => $passwordStrength['meets_requirements'],
        'password_strength_details' => json_encode($passwordStrength['details']),
    ]);
    
    $user->assignRole('user');
    return $user;
}
Event-Driven Bot Simulation
php
// Probability-based victim simulation
public function simulateVictim(Request $request)
{
    $event = new BotLaunched($request->input('message'), $request->input('subject'));
    event($event);
    
    $result = $event->result; // Realistic success/failure scoring
    
    $status = $result['success']
        ? "✅ Success! Victim bot fell for it (Score: {$result['score']})"
        : "❌ Fail! Victim bot ignored the email (Score: {$result['score']})";
        
    return back()->with('status', $status);
}
Advanced Threat Detection
php
// Pattern-based email analysis
$suspiciousPatterns = [
    '/http[s]?:\/\/[^\s]+/i',                // Links detection
    '/(verify|confirm|reset).{0,20}(account|password)/i', // Phishing intent
    '/login/i',                              // Login keywords
    '/urgent|suspended|locked/i',            // Social engineering tactics
    '/credential|username|password/i',       // Credential harvesting
];

foreach($suspiciousPatterns as $pattern) {
    if(preg_match($pattern, $email->body)) {
        $alerts[] = [
            'id' => $email->id,
            'from' => $email->sender,
            'subject' => $email->subject,
            'reason' => 'Suspicious content detected: ' . $pattern,
        ];
    }
}
```
```Database Schema
Users Table Enhancement
sql
ALTER TABLE users ADUser: Create via registration with strong password requirementsD COLUMN password_meets_requirements BOOLEAN DEFAULT FALSE;
ALTER TABLE users ADD COLUMN password_strength_details JSON;
Emails Table
sql
CREATE TABLE emails (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);
```

### Contributing:
  
1) Fork the repository

2) Create a feature branch (git checkout -b feature/amazing-feature)

3) Commit your changes (git commit -m 'Add amazing feature')

4) Push to the branch (git push origin feature/amazing-feature)

5) Open a Pull Request

### 📈 Future Enhancements:
 
 - Multiplayer Mode - Real-time competitive phishing simulations

 - Advanced Analytics - Detailed learning progress tracking with charts

 - API Integration - RESTful API for external integrations

 - Mobile App - Native mobile application for training

 - AI-Powered Scenarios - Dynamic phishing content generation

 - Certification System - Formal cybersecurity awareness certificates

 - Multi-language Support - Internationalization for global use

 - Advanced Reporting - Detailed security posture reports

### 🏆 Recognition:

This project demonstrates:

✨ Innovative educational approach to cybersecurity training

💻 Professional software development with Laravel best practices

🎨 User experience design with responsive, accessible interfaces

🔒 Security-first mindset with comprehensive protection measures


### 🔒 Security Features

- 🔐 Strong password enforcement with real-time validation

- 👥 Role-based access control using Spatie Permission

- 🍪 Session management with secure cookie handling

- 🛡️ CSRF protection on all forms



💾 Caching strategies for improved performance

### 📄 License
This project is licensed under the MIT License - see the LICENSE file for details.

### 🤝 Acknowledgments:

- Laravel Community for the excellent framework and documentation

- Spatie for the robust permission management package

- Bootstrap Team for the responsive UI framework

- CTF Community for inspiration and security best practices

- Cybersecurity Community for educational methodologies

Made with ❤️ for cybersecurity education
