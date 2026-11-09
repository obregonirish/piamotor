PIA MOTOR RENTAL - PHP + MySQL + Bootstrap starter project

REQUIREMENTS
- XAMPP with Apache and MySQL
- A modern browser
- Internet connection for Bootstrap CDN and Google Fonts

INSTALLATION
1. Extract the pia_motor_rental folder into:
   C:\xampp\htdocs\
   Your path should be C:\xampp\htdocs\pia_motor_rental

2. Open XAMPP Control Panel. Start Apache and MySQL.

3. Open http://localhost/phpmyadmin
   Choose Import, select database.sql from this folder, then click Import/Go.
   The SQL creates the database pia_motor_rental and sample motorcycles.

4. Check config.php. Default XAMPP MySQL settings are:
   host localhost, database pia_motor_rental, username root, password blank.
   If your MySQL root has a password, update DB_PASS.

5. Visit this address once to create the starter admin:
   http://localhost/pia_motor_rental/admin/create_admin.php

6. IMPORTANT: Delete admin/create_admin.php immediately after it reports success.
   Admin starter login:
   Email: admin@piamotorental.local
   Password: ChangeMe123!
   Change the password to a strong private password before using this site.

7. Open:
   http://localhost/pia_motor_rental/

CUSTOMER FEATURES
- Home, About, Contact, Motorcycle listing
- Customer registration and login
- Submit a motorcycle booking request
- View own booking history and status

ADMIN FEATURES
- Admin login and dashboard
- Add, edit, and delete motorcycles
- View booking requests and update status
- View registered customers

NOTES
- This is a starter/local development project, not ready for public deployment.
- Before publishing online, configure HTTPS, secure database credentials, remove setup scripts,
  add stronger admin account management, review privacy/data retention, and validate rental
  availability to prevent overlapping reservations.
- Contact details are placeholders. Replace them with your real business contact information.
- Motorcycle photos are placeholders. Add your own licensed photos in assets/images and update
  the image path for each motorcycle in Admin > Motorcycles.
