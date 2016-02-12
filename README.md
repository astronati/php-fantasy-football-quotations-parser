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

**NOTE:** To add another newspaper into the supported list, please provide us new kinds of files that need to be parsed in order to update the php package.

## Installation
You can install the library and its dependencies using composer running:
```sh
$ composer require fantasy-football-quotations-parser
```

**NOTE:** This library has not been yet published on *[packagist.com](https://packagist.org/)*

## API Documentation
The documentation has been created using [phpDocumentor](http://www.phpdoc.org/) and you can find it in `docs/api`.
Everytime a developer changes the code base he has to take care of updating the comments in the code and the documentation. Please use the following command to update the documentation from the root path:
```sh
$ phpdoc -d ./src -t ./docs/api
```

## Testing
The guide to write, update and run tests is defined in [`tests/README.md`](tests/README.md).

## License
This package is released under the [MIT license](LICENSE.md).
