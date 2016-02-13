# Fantasy Football Quotations Parser Tests
Defines how to set up an environment to write, update and run all tests.

## Tests Suite Structure
The directories structure within the tests folder reflects what is inside the src folder:
```
src
\---->[folder-name]
\-------->[file-name].js
tests
\---->[folder-name]
\-------->[file-name].test.js
```

## Installation
The environment requires "[phpunit](https://phpunit.de/)", that has been already included in the `dev-dependencies` of the `composer.json`.

### Install all dependencies
To install all modules you just need to follow these steps:

- Go to the root path
- Run `$ composer install`

For example from here:
```sh
$ cd ../
$ composer install
```

## Running tests
Follow these steps to run the tests suite:

- Run `$ phpunit [tests-folder-path]`

For example from here:
```sh
$ ../vendor/phpunit/phpunit/phpunit ./
```
