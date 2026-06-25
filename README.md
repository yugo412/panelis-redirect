# Panelis Redirect

Manage redirects, destination rules, and URL forwarding behavior directly from the Panelis admin panel.

## Features

* Redirect management
* Source and destination URL mapping
* Permanent (301) and temporary (302) redirects
* Redirect status management
* Automatic Panelis plugin discovery

## Requirements

* PHP 8.3+
* Laravel 13+
* Filament 5+

## Installation

Install the package via Composer:

```bash
composer require yugo/panelis-redirect
```

Run migrations:

```bash
php artisan migrate
```

## Usage

After installation, a **Redirects** menu will be available in the Panelis admin panel.

The Redirect module provides a simple way to manage URL redirections without modifying application routes.

Available fields include:

* Source URL
* Destination URL
* Redirect type
* Status

Supported redirect types include:

* **301** – Permanent Redirect
* **302** – Temporary Redirect

Common use cases include:

* Redirecting renamed pages
* Migrating legacy URLs
* Handling broken links
* Marketing and campaign redirects

## License

The MIT License (MIT).
