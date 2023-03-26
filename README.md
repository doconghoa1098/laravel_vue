# Docker Local Development Environment

- [Prerequisites](#prerequisites)
- [Quickstart by using gnu `make`](#quickstart-by-using-gnu-make)
    - [`make help`](#make-help)
    - [`make on-app`](#make-on-app)
    - [`make off-app`](#make-off-app)
    - [`make ssh-app`](#make-ssh-app)
    - [`make composer-install`](#make-composer-install)
    - [`make up-db`](#make-up-db)
    - [`make seed-db`](#make-seed-db)
    - [`make show-log-app`](#make-show-log-app)
    - [See other commands run `make help`](#see-other-commands-run-make-help)

### Install app on docker env

1. pull source code from gitlab to WSL
2. go to source path
#### WSL Window
    ```bash
    cd source_path
    make on-app
    make composer-install
    make ssh-app
    php artisan key:generate
    ```
#### Docker ubuntu
    In file .docker/Dockerfile line 127 -> 132
    please remove 
        RUN set -eux; \
            echo "$GIT_BRANCH_NAME - $GIT_COMMIT_HASH" > VERSION; \
            echo "DUMP autoload class for production"; \
            cd /var/www/html/timesheet && \
            composer dumpautoload -a;

    after running like WSL Window above

3. create database sample
    - connect postgres by navicat
    #### Please fill config
    - DB_CONNECTION=timesheet_db
    - DB_HOST=localhost
    - DB_PORT=3308
    - DB_DATABASE=timesheet
    - DB_USERNAME=root
    - DB_PASSWORD=timesheet
    

4. cd source_path and config env
```bash
cd source_path
cp .env.example .env 
```

5. run migrate and seed 
```bash
make up-db
make seed-db 
```

6. Open chrome with url: <http://localhost:9000/login>

