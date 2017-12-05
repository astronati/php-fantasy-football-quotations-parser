[![Build Status](https://travis-ci.org/astronati/php-fantasy-football-quotations-parser.svg?branch=master)](https://travis-ci.org/astronati/php-fantasy-football-quotations-parser)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/9d160340b6f645c0b370ddb385fa2088)](https://www.codacy.com/app/astronati/php-fantasy-football-quotations-parser?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=astronati/php-fantasy-football-quotations-parser&amp;utm_campaign=Badge_Grade)
[![Dependency Status](https://www.versioneye.com/user/projects/586ad24440543800417e5662/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/586ad24440543800417e5662)
[![MIT licensed](https://img.shields.io/badge/license-MIT-blue.svg)](./LICENSE.md)

# Fantasy Football Quotations PlayerDataGenerator
Provides a way to parse files that are provided by main sport newspapers with players quotations after each
soccer match of the [Serie A](https://en.wikipedia.org/wiki/Serie_A) championship.

## Supported Newspapers
Currently the "[Gazzetta dello Sport](http://www.gazzetta.it/)" is the only supported newspaper.

**NOTE:** To add another newspaper into the supported list, please provide us new kinds of files that need to be parsed
in order to update the php package.

To do that please file a new [issue](https://github.com/astronati/php-fantasy-football-quotations-parser/issues/new).

## Installation
You can install the library and its dependencies using `composer` running:
```sh
$ composer require fantasy-football-quotations-parser
```

### Usage
PlayerDataGenerator depends by some classes that have to be instantiate as follows:

#### Excel Reader
An Excel Reader plugin is not provided in order to give developer the chance to choose what the best is for the own project.
The only bond is that the Reader that will be used must implement the [SpreadsheetReaderInterface](https://github.com/astronati/php-fantasy-football-quotations-parser/blob/master/src/reader/ReaderInterface.php).

##### Example
The following snippet is extracted from the [example/sample.php](https://github.com/astronati/php-fantasy-football-quotations-parser/blob/master/example/sample.php)
file and shows how a reader can be wrapped in a custom class ([CustomSpreadsheetReader](https://github.com/astronati/php-fantasy-football-quotations-parser/blob/master/example/lib/CustomReader.php))
that implements the `SpreadsheetReaderInterface`.

```php
$reader = new CustomSpreadsheetReader(new \PHPExcelReader\SpreadsheetReader('example/files/quotazioni_gazzetta_25.xls'));
```

#### PlayerDataGenerator
Run following command to instantiate a parser for an excel file of the season 2015/2016:

```php
$parser = new PlayerDataGenerator(
  $reader,
  RowDataParserFactory::create('2015'),
  new RowDataNormalizer(new DataFactory(), new CellNormalizerFactory()),
  new RawDataFactory()
);
```

#### Quotation(s)
A `PlayerDataGenerator` instance returns a list of [PlayerData](https://github.com/astronati/php-fantasy-football-quotations-parser/blob/master/src/row/data/Data.php)
using own method [getData](https://github.com/astronati/php-fantasy-football-quotations-parser/blob/master/src/parser/ParserInterface.php#L23).
Any item in the list can be used as main argument of a [Quotation](https://github.com/astronati/php-fantasy-football-quotations-parser/blob/master/src/model/Quotation.php)
instance that represents the real model per each footballer quotation.

```php
$quotation = new Quotation($parser->getData()[0]);
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
Tests files are created next to the related file as follows:
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

Run what follows to see the code coverage:
```sh
$ composer coverage
```

See [Code Coverage](http://astronati.github.io/php-fantasy-football-quotations-parser/coverage/report/html/index.html)
for more details.

## License
This package is released under the [MIT license](LICENSE.md).
