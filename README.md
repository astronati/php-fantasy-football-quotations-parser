[![Build Status](https://travis-ci.org/astronati/php-fantasy-football-quotations-parser.svg?branch=master)](https://travis-ci.org/astronati/php-fantasy-football-quotations-parser)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/9d160340b6f645c0b370ddb385fa2088)](https://www.codacy.com/app/astronati/php-fantasy-football-quotations-parser?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=astronati/php-fantasy-football-quotations-parser&amp;utm_campaign=Badge_Grade)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/9d160340b6f645c0b370ddb385fa2088)](https://www.codacy.com/app/astronati/php-fantasy-football-quotations-parser?utm_source=github.com&utm_medium=referral&utm_content=astronati/php-fantasy-football-quotations-parser&utm_campaign=Badge_Coverage)
[![Dependency Status](https://www.versioneye.com/user/projects/586ad24440543800417e5662/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/586ad24440543800417e5662)
[![Latest Stable Version](https://poser.pugx.org/astronati/fantasy-football-quotations-parser/v/stable)](https://packagist.org/packages/astronati/fantasy-football-quotations-parser)
[![License](https://poser.pugx.org/astronati/fantasy-football-quotations-parser/license)](https://packagist.org/packages/astronati/fantasy-football-quotations-parser)

# Fantasy Football Quotations Parser
Provides a way to parse files that are provided by main sport newspapers with players quotations after each soccer match
of the [Serie A](https://en.wikipedia.org/wiki/Serie_A) and [FIFA World Cup](https://en.wikipedia.org/wiki/FIFA_World_Cup)
championship.

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

#### Example
The following snippet is extracted from the
[example/sample.php](https://github.com/astronati/php-fantasy-football-quotations-parser/blob/master/example/sample_2017.php)
file and shows how parsing an excel file of the season 2017/2018

```php
// Obtain a QuotationsParser
$quotationsParser = QuotationsParserFactory::create(QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017);

// Get the quotations, ready to be used
$quotations = $quotationsParser->getQuotations('example/files/2017_quotazioni_gazzetta_02.xls');
```

#### Supported Formats
Take a look at the Gazzetta [folder](https://github.com/astronati/php-fantasy-football-quotations-parser/tree/master/src/Map/Gazzetta)
to know which formats are supported and at the
[QuotationsParserFactory](https://github.com/astronati/php-fantasy-football-quotations-parser/blob/master/src/Parser/QuotationsParserFactory.php#L18)
to determine which constant using.

#### Quotation(s)
A [Quotation](https://github.com/astronati/php-fantasy-football-quotations-parser/blob/master/src/Model/Quotation.php)
instance allows to map a single row and to return information as follows:

```php
$quotations[0]->isWithoutVote();
$quotations[0]->getGoalsMagicPoints();
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
Tests files are created in dedicates folders that replicate the
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

## License
This package is released under the [MIT license](LICENSE.md).
