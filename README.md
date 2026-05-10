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
<img width="1345" height="639" alt="Screenshot (16)" src="https://github.com/user-attachments/assets/23e7b963-7367-4d09-b271-cd8e0b000c4b" />

#### Public Details Page
<img width="1349" height="640" alt="Screenshot (11)" src="https://github.com/user-attachments/assets/66c07843-eea3-4861-9ffd-c339a01bce74" />

#### Galary Management Page
<img width="1351" height="639" alt="Screenshot (12)" src="https://github.com/user-attachments/assets/862ade84-be1d-4b06-a6ff-4fb7a101c30c" /> 

#### Skills & Socail Links Management
<img width="1350" height="635" alt="Screenshot (14)" src="https://github.com/user-attachments/assets/087c2cdc-aa92-44b7-9a0b-9c8dbe315c1c" />

<img width="1349" height="645" alt="Screenshot (15)" src="https://github.com/user-attachments/assets/a6fef818-f995-4e90-8066-ea3e22c7fd78" />

#### Profile Page Management
<img width="1353" height="643" alt="Screenshot (17)" src="https://github.com/user-attachments/assets/032f4f24-d649-4df5-a41f-0c17f35f385c" />

### Public view

#### Home Page
<img width="1349" height="636" alt="Screenshot (19)" src="https://github.com/user-attachments/assets/b6534e99-0b28-48eb-ab48-d176dc59cfde" />

#### Galary Page
<img width="1350" height="633" alt="Screenshot (18)" src="https://github.com/user-attachments/assets/5a015912-e6f2-40ad-a658-100ab722bcae" />

### Single Galary View
<img width="1349" height="633" alt="Screenshot (20)" src="https://github.com/user-attachments/assets/65ca8827-e9e5-4928-851a-c545b67218ff" />

#### About Page
<img width="1345" height="631" alt="Screenshot (21)" src="https://github.com/user-attachments/assets/c1d5bd06-24c4-42c6-a876-a6afcc0f30a3" />

#### Login Page
<img width="1349" height="633" alt="Screenshot (22)" src="https://github.com/user-attachments/assets/9a44a0b7-9437-4b26-9367-6cc2aedf063f" />

#### Registration Page
<img width="1350" height="633" alt="Screenshot (23)" src="https://github.com/user-attachments/assets/e1bffc7d-009c-4797-8cc3-d7a84fcfb598" />


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

