<h1 align="center">
  PazMuseu - Museum Tourguide Website
</h1>

![demo](https://github.com/iJosiasCastro/pazmuseu/blob/master/demo/screenshot.png?raw=true)

## Introduction

PazMuseu is a website developed for the 2022 Technical Computing Olympiad in the province of Buenos Aires. The primary objective of this website is to serve as a comprehensive tour guide for a museum. It provides information about each exhibition available in the museum and allows visitors to sign up for guided tours, displaying various available tour dates. The system also sends email notifications for tour confirmations, cancellations, and postponements. Additionally, guides can access the platform to view the list of registered visitors and other relevant information.

## Project Database Schema

![demo](https://github.com/iJosiasCastro/pazmuseu/blob/master/demo/der.jpg?raw=true)

## Technologies Used

The website is developed using Laravel, a popular PHP framework known for its robustness and scalability.

## Getting Started

To run this Laravel project, follow these steps:

1. Clone the repository to your local machine.
2. Configure your environment variables, including database credentials and email settings, in the `.env` file.
3. Install project dependencies using Composer:

```bash
composer install
```

4. Generate a new application key:

```bash
php artisan key:generate
```

5. Run database migrations to create the required tables:

```bash
php artisan migrate
```

6. Serve the application locally:

```bash
php artisan serve
```

You can access the website in your web browser at `http://localhost:8000`.

Feel free to explore the website and its features, and don't forget to refer to the Laravel documentation for any additional configuration or customization needs.
