[![Build Status](https://travis-ci.org/astronati/fantasy-football-quotations-parser.svg?branch=master)](https://travis-ci.org/astronati/fantasy-football-quotations-parser)

# Fantasy Football Quotations Parser
This library is used to parse files that are provided by main sport newspapers with players quotations after each
soccer match of the [Serie A](https://en.wikipedia.org/wiki/Serie_A) championship.

## Example
Here is an example to parse a spreadsheet file provided by the "Gazzetta dello Sport".
```php
$parser = new QuotationsParserFactory('quotazioni_gazzetta_01.xls');
$quotations = $parser->getQuotations();
```

## Supported Newspapers
Currently the "[Gazzetta dello Sport](http://www.gazzetta.it/)" is the only supported newspaper.

**NOTE:** To add another newspaper into the supported list, please provide us new kinds of files that need to be parsed
in order to update the php package.

## Installation
You can install the library and its dependencies using composer running:
```sh
$ composer require fantasy-football-quotations-parser
```

## API Documentation
The documentation is generated using [phpDocumentor](http://www.phpdoc.org/) and you can find it in `docs/api`.
Please use the following command to run the documentation from the root path:
```sh
$ ./vendor/phpdocumentor/phpdocumentor/bin/phpdoc -d ./src -t ./docs/api
```

## Testing
Defines how to set up an environment to write, update and run all tests.

### Tests Suite Structure
The directories structure within the `tests` folder reflects what is inside the `src` folder:
```
src
\---->[folder-name]
\-------->[file-name].js
tests
\---->[folder-name]
\-------->[file-name].test.js
```

### Installation
The environment requires "[phpunit](https://phpunit.de/)", that has been already included in the `dev-dependencies` of
the `composer.json`.

#### Install all dependencies
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
$ ./vendor/phpunit/phpunit/phpunit ./tests
```

## License
This package is released under the [MIT license](LICENSE.md).
