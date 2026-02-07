### Installation

1. Clone repository
   ```sh
   git clone https://github.com/username/nama-repo.git
   cd nama-repo
   ```
2. Install dependencies
    ```sh
    composer install
    ```

3. Copy env.example file to .env 
   ```sh
   cp .env.example .env
   ```

4. Generate encryption key
    ```sh
    php artisan key:generate
    ```

5. Make database file and edit .env file
    ```sh
    touch database/database.sqlite
    ```
    .env
    ```sh
    DB_CONNECTION=sqlite
    DB_DATABASE=database/database.sqlite
    ```
    
6. Migrate database
   ```sh
   php artisan migrate
   ```
   
7. Run seeder (optional)
    ```sh
    php artisan db:seed
    ```

### Running the server

1. Run Laravel server
    ```sh
    php artisan serv
    ```
2. Access server
    ```sh
    http://127.0.0.1:8000
    ```

### Available Endpoints

1. Users
   ```sh
   /api/users
   ```

2. Perusahaan
   ```sh
   /api/perusahaan
   ```

3. Magang
   ```sh
   /api/magang
   ```

4. Report
   ```sh
   /api/report
   ```
