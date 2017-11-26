[![Build Status](https://travis-ci.org/astronati/php-fantasy-football-quotations-parser.svg?branch=master)](https://travis-ci.org/astronati/php-fantasy-football-quotations-parser)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/9d160340b6f645c0b370ddb385fa2088)](https://www.codacy.com/app/astronati/php-fantasy-football-quotations-parser?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=astronati/php-fantasy-football-quotations-parser&amp;utm_campaign=Badge_Grade)
[![Dependency Status](https://www.versioneye.com/user/projects/586ad24440543800417e5662/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/586ad24440543800417e5662)
[![MIT licensed](https://img.shields.io/badge/license-MIT-blue.svg)](./LICENSE.md)

# Fantasy Football Quotations Parser
This library is used to parse files that are provided by main sport newspapers with players quotations after each
soccer match of the [Serie A](https://en.wikipedia.org/wiki/Serie_A) championship.

## Supported Newspapers
Currently the "[Gazzetta dello Sport](http://www.gazzetta.it/)" is the only supported newspaper.

**NOTE:** To add another newspaper into the supported list, please provide us new kinds of files that need to be parsed
in order to update the php package through the [issue tracker](https://github.com/astronati/php-fantasy-football-quotations-parser/issues/new).

## Installation
You can install the library and its dependencies using `composer` running:
```sh
$ composer require fantasy-football-quotations-parser
```

### Usage
Parser depends by some classes that have to be instantiate as follows:

#### Excel Reader
A Excel Reader plugin is not provided in order to give developer the chance to choose what the best is for the own project.
The only bond is that the Reader that will be used must implement the provided [ReaderInterface](tree/master/src/reader/ReaderInterface.php).

##### Example
The following snippet is extracted from the [example/sample.php](tree/master/example/sample.php) file and shows how a reader has been
wrapped in a custom class (`CustomReader`) that implements the `ReaderInterface`.

```php
$reader = new CustomReader(new \PHPExcelReader\SpreadsheetReader('example/files/quotazioni_gazzetta_25.xls'));
```

#### Parser
Run following command to instantiate a parser for an excel file of the season 2015/2016:

```php
$parser = new Parser(
  $reader,
  RowMapFactory::create('2015'),
  new RowNormalizer(new DataFactory(), new CellNormalizerFactory()),
  new RawDataFactory()
);
```

## Development
The environment requires [phpunit](https://phpunit.de/), that has been already included in the `dev-dependencies` of the
`composer.json`.

### Dependencies
To install all modules you just need to run following command:

```sh
$ composer install
```

### Testing
Tests files are created next to related file as follows:
```
.
+-- src
|   +-- [folder-name]
|   |   +-- [file-name].php
|   |   +-- [file-name]Test.php
```

Execute following command to run the tests suite:
```sh
$ composer test
```

Run what follows to show the code coverage:
```sh
$ composer coverage
```

See [Code Coverage](http://astronati.github.io/php-fantasy-football-quotations-parser/coverage/report/html/index.html)
for more details.

## License
This package is released under the [MIT license](LICENSE.md).
