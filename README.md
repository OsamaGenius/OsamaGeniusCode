# Osama Genius Portfolio System

A modern full-stack portfolio and portfolio management system built with Laravel 12, Livewire 3, Bootstrap 5, and Vite.

This project combines a professional public portfolio website with a custom admin dashboard that allows complete management of projects, skills, socials, user accounts, and profile information.

## ✨ Features
### 🌐 Public Portfolio Website
- Modern responsive portfolio interface. 
- Dynamic projects/work showcase. 
- Single project details page. 
- About section. 
- Skills presentation. 
- Social media integration. 
- Contact & interaction support. 
- Authentication pages (Login / Register). 
### 🛠️ Admin Dashboard
- Secure admin authentication system.
- Dashboard analytics overview.
- User management.
- Projects management.
- Skills management.
- Social links management.
- Profile settings management.
- Password update functionality.
- Profile image management.
### ⚡ Technical Features
- Built with Laravel 12. 
- Livewire powered dynamic components. 
- Vite asset bundling. 
- Bootstrap 5 UI system. 
- SCSS support. 
- Chart.js integration. 
- Middleware-based route protection. 
- Clean MVC architecture. 
- Component-based development structure.
  
## 🧱 Tech Stack

| Technology  | propuse                     |
| :---        | :---                        |
| Laravel 12  | Backend Framework           |
| Livewire 3  | Dynamic Frontend Components |
| Bootstrap 5 | UI Framework                |
| Vite        | Asset Bundler               |
| SCSS        | Styling Site                |
| Char.js     | Dashboard Charts            |
| MySQL       | Database Management         |
| PHP         | Server Communication        |

## 📁 Project Structure

```bash
app/
├── Http/
│   ├── Controllers/
│   └── Middleware/
│
├── Models/
│
├── Livewire/
│   ├── Auth/
│   ├── Panel/
│   └── Profile/
│
resources/
├── views/
│   ├── layouts/
│   ├── panel/
│   └── auth/
│
routes/
├── web.php
└── panel.php
```

## 🚀 Installation

### 1️⃣ Clone the repo
```
git clone https://github.com/OsamaGenius/OsamaGeniusCode
cd OsamaGeniusCode 
```
### 2️⃣ Install PHP Dependencies 
```
composer install 
```
### 3️⃣ Install Node Dependencies 
```
npm install 
```
### 4️⃣ Configure Environment 
```
cp .env.example .env
php artisan key:generate
```
Update your database credentials inside:
```
DB_DATABASE=GeniusDB
DB_USERNAME=root
DB_PASSWORD=
```
### 5️⃣ Run Migration 
```
php artisan migrate
```
### 6️⃣ Start Development Server
```
composer run dev 
```
or manually:
```
php artisan serve
---
npm run dev
```

## 🔐 Authentication & Security 

The project includes:

- Admin authentication system. 
- Route middleware protection. 
- Session-based authentication. 
- Custom panel authentication middleware.
- Protected Dashboard routes.

## 📊 Dashboard Modules

The admin panel currently includes:

- Users Management. 
- Works / Projects Management. 
- Skills Management. 
- Social Links Management. 
- Profile Settings. 
- Analytics Charts. 

## 🎯 Purpose of the Project

This project was designed as a complete portfolio management solution that demonstrates:

- Full-stack Laravel development. 
- Livewire component architecture. 
- Admin panel development. 
- Authentication systems. 
- Dynamic UI rendering. 
- Clean project Organization. 
- Scalable application structure.

## 📸 Screenshots

### Control Panel

#### Login Page
<img width="1366" height="636" alt="Screenshot (8)" src="https://github.com/user-attachments/assets/157fd3e8-900c-444a-b6ad-73895cdd062d" />

#### Dashboard Page
<img width="1353" height="638" alt="Screenshot (9)" src="https://github.com/user-attachments/assets/77a1dfcd-c92b-45b5-8559-88acaa8dfaf3" />

#### User Management Page
<img width="1348" height="633" alt="Screenshot (10)" src="https://github.com/user-attachments/assets/c0710efc-5d5e-4e3a-9a11-8c95e480adfb" />


## 🛣️ Future Improvements 

Planned improvements for upcoming versions:

- Tailwind CSS redesign. 
- Dark mode support. 
- Blog system. 
- API integration. 
- Real-time notifications. 
- Multi-language support. 
- SEO optimization. 
- Advanced analytics. 
- Media upload manager. 
- Project categories & tags. 

## 🤝 Contributing

Contributions, ideas, and improvements are always welcome.

Feel free to fork the project and submit pull requests.

## 📄 License

This project is open-source and available under the MIT License.

## 👨‍💻 Author

**Osama Abdelrahman**

Full-Stack Web Developer focused on Laravel, Livewire, and modern web technologies.

Github Profile: [Github Page](https://www.linkedin.com/in/osama-abdelrahman-ab539930a).

LinkedIn Profile: [LinkedIn Page](https://www.linkedin.com/in/osama-abdelrahman-ab539930a).

## ⭐ Support

If you like this project, consider giving it a ⭐ on GitHub.

