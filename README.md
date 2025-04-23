# Amit Pandey - Personal Portfolio & Blog

A modern, responsive personal portfolio and blog website built with Laravel, featuring a clean design with vibrant gradients and modern UI components.

## 🌟 Features

### 📱 Responsive Design
- Modern, mobile-first design approach
- Smooth animations and transitions
- Glassmorphism effects and gradient backgrounds
- Optimized for all screen sizes

### 🏠 Homepage
- Hero section with dynamic gradient background
- Stats cards with glassmorphism effect
- Service cards with colorful gradient strips
- Education & Experience timeline
- Projects showcase with hover effects
- Testimonials section
- Latest blog posts
- FAQ accordion
- Call-to-action section

### 💼 Portfolio
- Project grid layout with modern card design
- Category filtering
- Project details with image galleries
- Technologies used tags
- Live demo & source code links
- Related projects suggestions

### 📝 Blog
- Clean, readable blog layout
- Category and tag organization
- Featured posts section
- Author information
- Social sharing buttons
- Related posts suggestions
- Comments section

### 📞 Contact
- Contact form with validation
- WhatsApp integration
- Social media links
- Location information
- Email contact option

### 👨‍💼 Admin Dashboard
- Secure authentication system
- Project management
- Blog post management
- Contact form submissions
- Analytics dashboard

## 🛠️ Technologies Used

- **Frontend:**
  - HTML5, CSS3, JavaScript
  - Tailwind CSS for styling
  - Alpine.js for interactivity
  - Modern design with gradients and animations

- **Backend:**
  - Laravel 10.x
  - MySQL database
  - PHP 8.2+
  - Composer for dependency management

## 📦 Installation

1. Clone the repository:
```bash
git clone https://github.com/ameetspeaks/pandeyamit.git
cd pandeyamit
```

2. Install PHP dependencies:
```bash
composer install
```

3. Copy environment file:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Configure database in `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Run migrations and seeders:
```bash
php artisan migrate --seed
```

7. Start the development server:
```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` to view the application.

## 🔒 Security

- CSRF protection enabled
- XSS prevention
- SQL injection protection
- Secure password hashing
- Rate limiting on sensitive routes

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👤 Author

**Amit Pandey**
- Website: [amitpandey.com](https://amitpandey.com)
- GitHub: [@ameetspeaks](https://github.com/ameetspeaks)
- LinkedIn: [Amit Pandey](https://linkedin.com/in/yourusername)

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The web framework used
- [Tailwind CSS](https://tailwindcss.com) - For styling
- [Alpine.js](https://alpinejs.dev) - For JavaScript interactivity
