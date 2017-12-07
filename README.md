[![Build Status](https://travis-ci.org/astronati/php-fantasy-football-quotations-parser.svg?branch=master)](https://travis-ci.org/astronati/php-fantasy-football-quotations-parser)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/9d160340b6f645c0b370ddb385fa2088)](https://www.codacy.com/app/astronati/php-fantasy-football-quotations-parser?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=astronati/php-fantasy-football-quotations-parser&amp;utm_campaign=Badge_Grade)
[![Codacy Badge](https://api.codacy.com/project/badge/coverage/91c01b9eef2c412ab1812eaa99a9348f)](https://www.codacy.com/app/astronati/php-fantasy-football-quotations-parser/dashboard)
[![Dependency Status](https://www.versioneye.com/user/projects/586ad24440543800417e5662/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/586ad24440543800417e5662)
[![MIT licensed](https://img.shields.io/badge/license-MIT-blue.svg)](./LICENSE.md)

# Fantasy Football Quotations Parser
Provides a way to parse files that are provided by main sport newspapers with players quotations after each soccer match
of the [Serie A](https://en.wikipedia.org/wiki/Serie_A) championship.

## Supported Newspapers
Currently the "[Gazzetta dello Sport](http://www.gazzetta.it/)" is the only supported newspaper.

**NOTE:** To add another newspaper into the supported list, please provide us new kinds of files that need to be parsed
in order to update the php package.

To do that please file a new [issue](https://github.com/astronati/php-fantasy-football-quotations-parser/issues/new).

## Installation
You can install the library and its dependencies using `composer` running:
```sh
$ composer require astronati/fantasy-football-quotations-parser
```

### Usage
The library allows to return a model per each quotation (player, vote, etc...).

##### Example
The following snippet is extracted from the
[example/sample.php](https://github.com/astronati/php-fantasy-football-quotations-parser/blob/master/example/sample.php)
file and show how parsing an excel file of the season 2017/2018

```php
// Obtain a QuotationsParser
$quotationsParser = QuotationsParserFactory::create(QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015);

// Get the PlayerData information, ready to be used
$quotations = $quotationsParser->getQuotations('example/files/2015_quotazioni_gazzetta_25.xls');
```

#### Quotation(s)
A [Quotation](https://github.com/astronati/php-fantasy-football-quotations-parser/blob/master/src/model/Quotation.php)
instance allows to map a single row and to return information as follows:

```php
$quotations[0]->isWithoutVote();
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
Tests files are created in a dedicate folder that replicates the
[src](https://github.com/astronati/php-fantasy-football-quotations-parser/tree/master/src) structure as follows:
```
.
+-- src
|   +-- [folder-name]
|   |   +-- [file-name].php
|   ...
+-- tests
|   +-- [folder-name]
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
