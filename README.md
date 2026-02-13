# SDC310 PHP Web Application

## Overview
This project is a PHP-based web application developed for SDC310.
It features a product catalog stored in a MySQL database and a session-based shopping cart that allows users to manage items and view totals.

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
- Calculates overall cart total

### Validation
- Validates product IDs and quantities
- Prevents invalid or missing input
- Displays safe, user-friendly behavior

### Checkout (Placeholder)
- Basic checkout page implemented
- Displays cart summary (no payment processing)

---

## Database Operations (CRUD)

- Create: Add items to cart (session-based)
- Read: Fetch products from the database
- Update: Modify item quantities in the cart
- Delete: Remove items from the cart

---

## Technologies Used
- PHP (Procedural)
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
```
   /Applications/XAMPP/htdocs/   (macOS)
   C:\xampp\htdocs\             (Windows)

```

4. Open in browser:
```
   http://localhost/shopping_cart/
```


---

## Folder Structure

```
shopping_cart/
│
├── config/
│ └── db.php # Database connection
│
├── includes/
│ ├── header.php # Navigation and layout header
│ ├── footer.php # Footer
│ ├── products.php # Product queries
│ └── cart_helpers.php # Cart logic functions
│
├── database/
│ └── shopping_cart.sql # Database export
│
├── assets/
│ └── css/
│ └── style.css # Stylesheet
│
├── index.php # Home page
├── catalog.php # Product catalog
├── cart.php # Cart view
├── checkout.php # Checkout (placeholder)
│
└── README.md
```

---

## Navigation

- Home page provides links to Catalog, Cart, and Checkout
- Catalog page allows adding/removing items
- Cart page displays current cart contents and totals
- Checkout page displays a final summary (placeholder)

---

## How the Application Works

- Products are stored in the MySQL database
- The catalog retrieves products using PHP queries
- The cart is stored using PHP sessions
- Actions like Add/Remove/Update modify session data
- The cart page calculates totals dynamically

---

## Known Limitations

- Checkout is a placeholder (no payment system)
- No user authentication
- No persistent cart (session-based only)

---

## Future Improvements

- Full checkout process with order storage
- User login system
- Persistent cart stored in database
- Improved UI styling

---

## Author
Sherika Fayson
