# G7 E-Commerce System - Enhanced Edition
## Professional E-Commerce Platform with Advanced Admin Panel

🎓 **Course:** RCS 212 - Development of Web Applications  
📅 **Project:** E-Commerce System  
👨‍💻 **Developer:** Israel Zumba  
🚀 **Version:** 2.0 - Enhanced with IRCO Portal Features  

---

## ⭐ Key Features

### **Customer Frontend (Public)**
✅ Home Page - Hero, categories, featured products  
✅ Products Page - Full catalog with live database fetch  
✅ About Page - Company story, team, values, stats  
✅ Contact Page - Google Maps, form, hours, social links  
✅ Professional Footer - Social media, newsletter, quick links  

### **Admin Panel (Backend)**
✅ Secure Login - Session-based authentication  
✅ Dashboard - Stats, recent activity, search  
✅ Product Management - Add, edit, delete, view, **search**  
✅ User Management - Register, update, delete, **toggle active/inactive**, **search**  
✅ RBAC - Role-based access (Admin vs Staff)  
✅ Modern UI - Dark theme with gold accent  

---

## 🆕 What's Enhanced (IRCO-Inspired)

1. **Search Functionality** - Products & Users  
2. **Toggle User Status** - Activate/Deactivate users  
3. **Recent Activity** - Last 5 products added  
4. **Inventory Value** - Total stock worth  
5. **Icon-Based Actions** - View, Edit, Delete, Toggle  
6. **Better Empty States** - Helpful messages  
7. **Status Badges** - Visual role & status indicators  
8. **Enhanced Tables** - Thumbnails, avatars, color coding  

👉 **See `ENHANCEMENTS.md` for full details**

---

## 🚀 Quick Start

### 1. Import Database
```bash
mysql -u root -p
CREATE DATABASE g7_ecommerce;
USE g7_ecommerce;
SOURCE database.sql;
```

### 2. Configure Database
Edit `config/db.php`:
```php
define('DB_USER', 'root');  // Your MySQL username
define('DB_PASS', '');      // Your MySQL password
```

### 3. Access System

**Customer Store:**  
`http://localhost/g7_ecommerce/public/index.php`

**Admin Panel:**  
`http://localhost/g7_ecommerce/admin/login.php`

**Admin Credentials:**
- Username: `israelzumba`
- Password: `Zumba@2002`
- Role: Admin (full access)

**Staff Credentials:**
- Username: `demostaff`
- Password: `Staff@123`
- Role: Staff (limited access)

---

## 📂 File Structure

```
g7_ecommerce/
├── database.sql              Database schema + sample data
├── README.md                 This file
├── ENHANCEMENTS.md           Detailed enhancement docs
│
├── config/
│   └── db.php                Database connection
│
├── includes/
│   ├── session.php           RBAC engine
│   ├── admin_header.php      Admin navigation
│   └── admin_footer.php      Admin footer
│
├── admin/
│   ├── login.php             Secure login
│   ├── index.php             Dashboard (enhanced)
│   ├── upload_product.php    Add products
│   ├── update_product.php    Edit products
│   ├── delete_product.php    Delete products
│   ├── users.php             User list (enhanced with search & toggle)
│   ├── register_user.php     Add users
│   ├── update_user.php       Edit users
│   ├── delete_user.php       Delete users
│   └── logout.php            Session destroy
│
└── public/
    ├── index.php             Complete frontend (4 pages)
    └── api/
        └── get_products.php  JSON API for products
```

---

## 🔐 RBAC Permissions Matrix

| Action | Admin | Staff |
|--------|-------|-------|
| View Products | ✅ | ✅ |
| Add Products | ✅ | ✅ |
| Update Products | ✅ | ✅ |
| Delete Products | ✅ | ❌ |
| View Users | ✅ | ❌ |
| Register Users | ✅ | ❌ |
| Update Users | ✅ | ❌ |
| Delete Users | ✅ | ❌ |
| Toggle User Status | ✅ | ❌ |

---

## 🎨 Design System

**Color Palette:**
- Primary: `#f59e0b` (Amber/Gold)
- Background: `#0f172a` (Dark Blue)
- Cards: `#1e293b` (Slate)
- Success: `#22c55e` (Green)
- Danger: `#ef4444` (Red)
- Info: `#3b82f6` (Blue)

**Typography:**
- Headers: Raleway (Google Fonts)
- Body: DM Sans (Google Fonts)
- Monospace: For usernames/IDs

---

## 📊 Database Tables

1. **users** - System users (admin, staff)
2. **products** - Product catalog
3. Categories stored in product.category field

**Sample Data Included:**
- 12 Products across 4 categories
- 2 Users (1 admin, 1 staff)

---

## 🛡️ Security Features

✅ Password hashing with `password_hash()`  
✅ Prepared statements (SQL injection safe)  
✅ XSS protection with `htmlspecialchars()`  
✅ Session-based authentication  
✅ RBAC enforcement on all pages  
✅ CSRF tokens ready (can be added)  
✅ Input validation on all forms  

---

## 📱 Browser Support

- Chrome ✅
- Firefox ✅
- Safari ✅
- Edge ✅
- Mobile browsers ✅

---

## 🐛 Troubleshooting

**"Access Denied" page:**
- Check your role in database
- Verify session is working
- Clear browser cache

**Can't login:**
- Import database.sql first
- Check MySQL credentials in config/db.php
- Verify password hash in database

**Products not showing:**
- Check database connection
- Verify products table has data
- Check browser console for errors

**Search not working:**
- Clear form and try again
- Check if products/users exist
- Verify database connection

---

## 🎯 Project Requirements Met

✅ **Frontend** - HTML, JavaScript, CSS  
✅ **Backend** - PHP  
✅ **Database** - MySQL  
✅ **4 Customer Pages** - Home, Products, About, Contact  
✅ **5 Admin Pages** - Login, Dashboard, Upload, Register, Users  
✅ **Product Display** - Name, brand, price, quantity from DB  
✅ **Form Validation** - JavaScript alerts  
✅ **Delete & Update** - With confirmations  
✅ **RBAC** - Admin vs Staff roles  
✅ **Session Management** - user_id, username, role  
✅ **Security** - password_hash(), sessions destroyed on logout  
✅ **About Page** - Detailed company info  
✅ **Contact Page** - Google Maps, form, social links  

---

## 📞 Support

For issues or questions:
- Email: zumbaemanuel2@gmail.com
- Check ENHANCEMENTS.md for feature details

---

## 📄 License

Educational project for RCS 212 course.

---

**🎉 Built with care for Tanzania's e-commerce future!**
