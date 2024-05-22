# github-issues
Application for Displaying Assigned GitHub Issues


# Installation

1. Download a Docker Desktop https://www.docker.com/products/docker-desktop/

2. Run docker-compose up -d

3. If you want to turn off the containers, run docker-compose down


# API Installation (api folder)

1. Copy the `.env.example` file and paste it in the same folder. Rename the copied file from `.env.example(1)` to `.env`.

2. On your machine, please navigate to your host file. For Windows users, the file path is typically `C:\Windows\System32\drivers\etc\hosts`. Add the following two lines:
   ```
   127.0.0.1 api.git.dev.com
   127.0.0.1 web.git.dev.com
   ```

3. To access the Docker container, run the command `docker exec -it {container_id} sh`. You can view a list of Docker containers by executing `docker ps`.

4. Run `php artisan migrate` to execute database migrations.

5. Execute `php artisan install:api --passport`.

6. Run `php artisan passport:keys` to generate Passport keys.

7. Execute `php artisan passport:client --client`.

8. Ensure to copy the `client_id` and `client_secret` values to the `.env` file located in the `web` folder to authenticate both the API and Web App.

9. Place your GitHub personal token into the `GITHUB_PERSONAL_TOKEN` variable.

10. Occasionally, changes made to values in .env variables might not take effect immediately. Run php artisan config:cache to ensure the changes are applied.

11. If you encounter issues related to file permissions within the Docker container, you can resolve them by running the command `chmod 777 -R {filepath or directory}`.

12. I've included a Postman collection for your reference. You can import it into your Postman application.


# Web Installation (in the 'web' folder)

1. Duplicate the `.env.example` file and place it in the same directory. Rename the duplicated file from `.env.example(1)` to `.env`.

2. Update the `.env` file with the `VITE_CLIENT_ID` and `VITE_CLIENT_SECRET` values obtained from the API.

3. Execute `npm install` to install dependencies.

4. Run `npm run dev` to start the development server.

5. Access the development server to `http://web.git.dev.com:5173`