# MamunAdda Demo (Reference Website)

This is a **reference demo** website similar in spirit to MamunAdda — built with **PHP + MySQL** and **Bootstrap**.

## Features
- Home, Menu, Contact, Order pages
- Admin: add menu items, view/update orders
- WhatsApp click-to-chat (optional)
- Responsive, clean UI

## Quick Setup
1. Create a database and import `database/mamunadda.sql`.
2. Copy `includes/config.php (sample)` to `includes/config.php` and update DB credentials:
   ```php
   $db_host = 'localhost';
   $db_user = 'root';
   $db_pass = '';
   $db_name = 'mamunadda_demo';
   ```
3. Place the project in your PHP server root (e.g., `htdocs/mamunadda-demo`).
4. Visit `http://localhost/mamunadda-demo/`.

## Notes
- Image uploads are simplified: upload files manually to `assets/images/` and reference the filename in Admin > Add Item.
- For production, add authentication to `/admin` and harden security (CSRF tokens, input validation, etc.).
