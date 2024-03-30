# Setting up a WordPress plugin with React and TypeScript

Link to the article ["Setting up a WordPress plugin with React and TypeScript
"](https://serhii.io/posts/setting-up-a-wordpress-plugin-with-react-and-typescript)


## How to start

If you use the Nix package manager, just type in `nix-shell`. Otherwise make sure that you have the following dependencies installed:
- Docker
- NodeJS >=18
- NPM (if you don't want to use the included YARN 4.0.2)
- PHP >=8.2 with composer

After that you can initialize the project:

```bash
cd wp/src/wp-content/plugins/wp-dynamic-form
yarn install
yarn compose
yarn build
```

Now you need to fire up the docker containers in the project root:

```bash
docker compose build
docker compose up -d --force-recreate
```

To clean up everything what was created by Wordpress, stop the docker containers and run the cleanup script:

```bash
docker compose down
./clean.sh
```

## Logging for WordPress server side

Add the following lines to the file `wp/src/wp-config.php`:

```PHP
...
define( 'WP_DEBUG', !!getenv_docker('WORDPRESS_DEBUG', '') );

// these two lines are necessary
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );
...
```