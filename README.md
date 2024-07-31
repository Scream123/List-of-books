## Description

This is a book rating application developed using Laravel, JavaScript, and Bootstrap. Users can add books, sort them by various criteria, and leave ratings.

## Features

- User registration and authentication
- Adding books (only for registered users)
- Sorting books by various criteria
- Rating books (only for registered users)
- Automatic book list updates every 60 seconds
- Show and hide long book descriptions

## Installation

1. Clone the repository:
   \`\`\`bash
   git clone https://github.com/yourusername/book-rating-app.git
   \`\`\`

2. Navigate to the project directory:
   \`\`\`bash
   cd book-rating-app
   \`\`\`

3. Install dependencies:
   \`\`\`bash
   composer install
   npm install
   \`\`\`

4. Copy the .env.example file to .env and configure the parameters:
   \`\`\`bash
   cp .env.example .env
   \`\`\`

5. Generate the application key:
   \`\`\`bash
   php artisan key:generate
   \`\`\`

6. Run the database migrations:
   \`\`\`bash
   php artisan migrate
   \`\`\`

7. Build the frontend assets:
   \`\`\`bash
   npm run dev
   \`\`\`

## Usage

### Running the Local Server

Start the local development server:
\`\`\`bash
php artisan serve
\`\`\`
The application will be accessible at: http://localhost:8000

### Registration and Authentication

- Navigate to the registration page and create a new user.
- Use your credentials to log in.

### Adding a Book

1. Click the \"Add Book\" button.
2. Fill out the book addition form.
3. Click \"Submit\" to add the book.

### Sorting Books

- Click on the column header in the book table to sort books by the selected criterion.

### Rating a Book

1. Navigate to the book you want to rate.
2. Use the stars to rate the book.

## Project Structure

- app/ - Controllers, models, and other application classes.
- resources/views/ - Blade templates.
- public/ - Publicly accessible files (JS, CSS).
- routes/ - Route files.
- database/migrations/ - Database migrations.

## Important Files

### JavaScript

The public/js/app.js file contains the main JavaScript code for sorting and rating books, as well as handling the book addition form.

### Controllers

The app/Http/Controllers/BookController.php file contains methods for managing books:

- index - Displays the list of books.
- store - Handles adding a new book.
- rateBook - Handles rating a book.

## Dependencies

- Laravel
- Bootstrap 5
- Axios (for AJAX requests)

## License

This project is licensed under the MIT License. > README.md
