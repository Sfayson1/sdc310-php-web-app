# SDC310 PHP Web Application

## Overview
This project is a PHP-based web application developed for SDC310.
It features a product catalog stored in a MySQL database and a session-based shopping cart.

The application has been refactored using the MVC (Model-View-Controller) architecture to improve organization, maintainability, and separation of concerns.

---

## Features (Phase 3)

### Product Catalog
- Displays 5+ products from the MySQL database
- Shows product ID, name, description, and cost
- Displays current quantity in cart

### Shopping Cart
- Add items to cart
- Remove items from cart
- Increase / decrease item quantity
- Prevent negative quantities

### Cart Summary
- View all items in the cart
- Displays quantities and line totals
- Calculates subtotal, tax, shipping, and total

### Validation
- Validates product IDs and quantities
- Prevents invalid or missing input
- Ensures safe, user-friendly behavior

### Checkout
- Displays order confirmation message
- Clears cart after checkout
- Redirects user back to the catalog page

---

## Database Operations (CRUD)

- Create: Add items to cart (session-based)
- Read: Fetch products from the database
- Update: Modify item quantities in the cart
- Delete: Remove items from the cart

---

## Technologies Used
- PHP (Procedural + MVC Structure)
- MySQL
- XAMPP (Apache + MySQL)
- HTML / CSS
- PHP Sessions

---

## Setup Instructions

1. Start Apache and MySQL using XAMPP

2. Import the database:
   - Open phpMyAdmin
   - Create a database named `shopping_cart`
   - Import:
     ```
     database/shopping_cart.sql
     ```

3. Place the project folder inside:
   /Applications/XAMPP/htdocs/ (macOS)
   C:\xampp\htdocs\ (Windows)


4. Open in browser:
   http://localhost/shopping_cart/public/


---

## Folder Structure (MVC)

```
shopping_cart/
│
├── app/
│ ├── controllers/
│ │ ├── HomeController.php
│ │ ├── CatalogController.php
│ │ ├── CartController.php
│ │ └── CheckoutController.php
│ │
│ ├── models/
│ │ ├── ProductModel.php
│ │ └── CartModel.php
│ │
│ └── views/
│ ├── home_view.php
│ ├── catalog_view.php
│ ├── cart_view.php
│ └── checkout_view.php
│
├── config/
│ └── db.php
│
├── public/
│ └── index.php # Front controller (routing)
│
├── database/
│ └── shopping_cart.sql
│
├── assets/
│ └── css/
│ └── style.css
│
└── README.md
```

---

## Navigation

- Home page provides links to Catalog and Cart
- Catalog page allows adding/removing items
- Cart page displays current cart contents and totals
- Checkout page confirms order and resets cart

---

## How the Application Works

- Products are stored in the MySQL database
- Models handle data logic (products and cart)
- Controllers handle requests and business logic
- Views display data to the user
- The cart is stored using PHP sessions
- Actions (add/remove/update) modify session data
- The front controller (`index.php`) routes requests to the correct controller

---

## Known Limitations

- Checkout does not process payments
- No user authentication system
- Cart is session-based (not persistent)

---

## Future Improvements

- Full checkout process with order storage
- User authentication and accounts
- Persistent cart stored in database
- Improved UI styling and responsiveness

---

## Author
Sherika Fayson
