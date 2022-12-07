<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Dashr
Blog CMS made with laravel framework.
Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Dashr Features

- Intuitive Dashboard.
- Responsive Themes.
- Built-in SEO Tools.
- Detailed Analytics.
- Content Seeder.
- Login and Registration.
- Creating and editing content.
- Blogger and role-based administration.

# Demo
Front End [dashr.miguelemmara.me](https://dashr.miguelemmara.me/)
<br>
Dashboard [dashr.miguelemmara.me/login](https://dashr.miguelemmara.me/login)

Demo login
``` 
username: admin
password: password
```

## Getting Started
```shell
git clone https://github.com/MiguelEmmara-ai/dashr.git dashr
cd dashr
cp .env.example .env
composer install OR composer update
php artisan key:generate
nano .env << Configure .env
```
After opning your .env file, change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

Then we can run
```shell
php artisan migrate:fresh --seed
php artisan serve
```

Premade auth
```
username: admin
password: password
```

# How To Use

## Front End
1. Register         - This page allow the new blogers register an account
2. Login            - Login user, check if the users is on the records
3. Become A Driver  - This page is for drivers to create their new account

## Dashboard
1. Dashboard                       - Intuitive Dashboard with simple analytics
2. Settings/General Settings       - Inbuild simple seo and website settings
3. Settings/Accont Settings        - Edit user account information
4. Post/Post                       - List all the post sort from recent post
5. Post/Create Post                - Create post
6. Categories/Categories           - List all the categories
7. Categories/Create Categories    - Create Categories
7. Authors/Authors                 - List all the Authors (Only for super admin)

## Built With

This app build with below technologies

* [![HTML][HTML.com]][html-url]
* [![CSS][CSS.com]][css-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* [![Laravel][Laravel.com]][Laravel-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

# Screenshots
![Screenshot 1](https://github.com/MiguelEmmara-ai/dashr/blob/master/public/screenshots/screencapture-dashr-dashboard-2022-12-02-16_21_51.png)

# License
Copyright 2022. Code released under the MIT license.

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[HTML.com]: https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white
[html-url]: https://www.w3schools.com/html/
[CSS.com]: https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white
[css-url]: https://www.w3schools.com/css/
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
