# GHS150th

<div style="display:flex; flex-direction:row; justify-content:center">
    <h1>GHS150th</h1>
    <img src="https://ghs150.acewebdesign.co.za/assets/GHS_Badge.png" style="height:150px; ">
</div>

GHS150th is a Laravel-based web application dedicated to celebrating the legacy and future of GHS. The site provides features for alumni profiles, club activities, programmes, pillar projects, and more.

## Overview

The application is built on the Laravel framework and utilizes modern CSS frameworks for responsive design. It includes:

- A dynamic navigation system for desktop and mobile devices.
- Role-based menus for admins, editors, and users.
- Interactive features such as projects, events, reservations, and an alumni network.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/yourusername/GHS150th.git
   cd GHS150th

2. Install PHP Dependencies

Make sure you have Composer installed, then run:

    ```bash
    composer install

3. Install Node Dependencies

Install Node.js packages:

    ```bash
    npm install
    
4. Configure Environment

Copy the example environment file and modify it:

    ```bash
    cp .env.example .env
    php artisan key:generate

5. Run Migrations

Set up your database by running:

    ```bash
    php artisan migrate

6. Compile Assets

Compile the front-end assets with:

    ```bash
    npm run dev 

Configuration
Assets: The GHS Badge is used throughout the site as a logo.
Routing: The navigation and menu items are defined in the Blade templates located in nav.blade.php.
Usage
Navigation: Depending on the user role, navigation menus adapt to present appropriate links such as Alumni Profile, Projects, Events, and more.
Authentication: The application is set up to allow user registration, login, and logout. The Blade templates include both desktop and mobile-specific implementations.
Role Management: Users see role-specific titles and additional menu items when logged in (Admin, Editor, or User).
For more information about Laravel, visit the Laravel Documentation.

Contributing
Contributions are welcome! Please refer to the Laravel documentation for guidelines on contributing and our Code of Conduct.

License
This project is open-sourced software licensed under the MIT license.


