# PlayPulse

PlayPulse is a social game-tracking web application built with **Laravel 11, Livewire 3, Volt, Tailwind CSS, and MySQL**.

I designed and developed this project independently as a hands-on way to move beyond basic CRUD applications and learn how a larger Laravel application is structured. The project combines authentication, reactive interfaces, social features, admin tools, and several types of database relationships.

## Why I Built This Project

After learning the fundamentals of Laravel, I wanted to build an application that required me to connect many concepts together instead of practicing them separately.

My main goals were to learn how to:

- structure a larger Laravel project
- model real relationships with Eloquent ORM
- build reactive interfaces without creating a separate JavaScript frontend
- manage authentication and authorization
- create social features such as follows, favorites, and activity feeds
- keep controllers, models, Blade views, and Livewire components organized
- debug application state across the database and user interface

## Main Features

### Authentication and Users

- User registration, login, and logout
- Google sign-in using Laravel Socialite
- Public user profiles
- Profile images
- Admin and regular-user roles
- Admin-protected pages and actions

### Game Tracking

- Browse individual games and game listings
- Add games to a personal game list
- Organize games by status, such as playing or completed
- Search a user's game list
- Filter games by their current status
- View games from another user's public profile

### Social Features

- Follow and unfollow users
- View followers and following lists
- Add games to favorites
- View a user's favorite games
- Global activity feed
- Following-based activity feed
- Automatically create activity records when a user updates a game status

### Game Information and Content Management

- Games
- Genres
- Characters
- Voice actors
- Character roles inside a game
- Voice actors connected to characters and games
- Sequels and prequels
- Admin forms for creating and connecting content

## Tech Stack

### Backend

- PHP 8.2+
- Laravel 11
- Eloquent ORM
- Laravel authentication
- Laravel Socialite
- MySQL

### Frontend

- Blade templates
- Livewire 3
- Volt
- Tailwind CSS
- Alpine-powered interactions through Livewire
- Vite

### Development Tools

- Composer
- npm
- Git and GitHub

## Database Relationships Practiced

A major goal of PlayPulse was learning how to model connected data correctly.

### Many-to-Many Relationships

Games can belong to multiple genres, and genres can contain multiple games.

### Three-Model Pivot Relationship

The `game_voice_actor_character` pivot table connects:

- a game
- a character
- a voice actor

It also stores additional pivot information such as the character's role in the game.

### Self-Referential Relationships

Games can be connected to other games as sequels and prequels through a self-referencing many-to-many relationship.

### Polymorphic Relationships

The project uses polymorphic-style records for features such as:

- user favorites
- user follows

This allowed me to learn how one interaction system can be designed to support different model types.

## Reactive UI with Livewire

Livewire was used to create interactive features while keeping most application logic in PHP.

Examples include:

- updating a user's game status
- switching between global and following activity feeds
- searching and filtering game lists
- following and unfollowing users
- adding and removing favorites
- creating games and relationships through reactive forms

This helped me understand component state, lifecycle methods, validation, server-side actions, and keeping the interface synchronized with database changes.

## What I Learned

While building PlayPulse, I practiced and improved my understanding of:

- Laravel's MVC structure
- routes, controllers, middleware, and Blade views
- Eloquent models and query building
- one-to-many, many-to-many, polymorphic, and self-referential relationships
- database migrations and pivot tables
- authentication and Google OAuth
- role-based access control
- Livewire components and reactive state
- form handling and validation
- reusable UI components
- search and filtering
- activity-feed logic
- eager loading related models
- organizing a growing codebase
- debugging backend and frontend behavior together

The most important lesson was that a full-stack application is not only a collection of pages. Features such as game lists, favorites, followers, and activity feeds depend on good database design and clear relationships between the models.

## Project Structure

```text
app/
├── Enums/             # Game-list statuses and other fixed values
├── Http/
│   ├── Controllers/   # Page and authentication controllers
│   └── Middleware/    # Admin access control
├── Livewire/          # Reactive UI components
└── Models/            # Eloquent models and relationships

database/
└── migrations/        # Tables, foreign keys, and pivot tables

resources/
├── css/               # Tailwind styles
├── js/                # Frontend bootstrap code
└── views/             # Blade and Livewire views

routes/
└── web.php             # Web routes
```

## Local Setup

### Requirements

- PHP 8.2 or newer
- Composer
- Node.js and npm
- MySQL

### 1. Clone the repository

```bash
git clone https://github.com/haidarjouni/PlayPulse.git
cd PlayPulse
```

### 2. Install backend and frontend dependencies

```bash
composer install
npm install
```

### 3. Create the environment file

Create a `.env` file and configure the Laravel application and database values.

Example database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=playpulse
DB_USERNAME=root
DB_PASSWORD=
```

Generate the application key:

```bash
php artisan key:generate
```

### 4. Configure Google sign-in (optional)

To use Google authentication, add the following values to `.env`:

```env
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

### 5. Prepare the database and public storage

```bash
php artisan migrate
php artisan storage:link
```

### 6. Run the application

Start the Laravel server:

```bash
php artisan serve
```

In another terminal, start Vite:

```bash
npm run dev
```

The application will normally be available at:

```text
http://127.0.0.1:8000
```

## Project Status

PlayPulse is a completed learning-focused portfolio project. Its core features demonstrate the Laravel and full-stack concepts I was studying at the time.

Possible future improvements include:

- automated feature and unit tests
- Laravel policies for more centralized authorization
- pagination and query optimization for larger datasets
- refactoring older components as my coding style improves
- Docker-based local setup
- CI/CD and production deployment

## Author

**Haidar Jouni**

- GitHub: [haidarjouni](https://github.com/haidarjouni)
- LinkedIn: [Haidar Jouni](https://www.linkedin.com/in/haidar-jouni-55269538a/)

---

This repository represents an important stage in my development journey: moving from small exercises to a complete application with real users, connected data, reactive interfaces, and social features.
