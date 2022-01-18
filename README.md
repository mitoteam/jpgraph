# Composer compatible JpGraph library

[![GitHub Version](https://img.shields.io/github/v/release/mitoteam/jpgraph?style=flat-square)](https://github.com/mitoteam/jpgraph)
[![Packagist Version](https://img.shields.io/packagist/v/mitoteam/jpgraph?include_prereleases&style=flat-square)](https://packagist.org/packages/mitoteam/jpgraph)
[![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/mitoteam/jpgraph?style=flat-square)](https://jpgraph.net/download/manuals/chunkhtml/ch01s05.html)

Current JpGraph library version: **4.3.5**

PHP version support: from **5.5 to 8.0**. Unfortunately PHP 8.1 is not supported by JpGraph library itself.

## Usage

This is just a helper to load original JpGraph library after declaring it as your dependency in composer.json:

```
composer require mitoteam/jpgraph
```

Then you can load library from anywhere in your code:
```php
use mitoteam\jpgraph\MtJpGraph;

// load library and modules
MtJpGraph::load();                # not really useful without modules
//or
MtJpGraph::load('bar');           # load with single module
//or
MtJpGraph::load(['bar', 'line']); # load with several modules

//using original JpGraph classes
$graph = new Graph(200, 300);
```

## Links

* Original JpGraph website: https://jpgraph.net
* Documentation: https://jpgraph.net/doc/
* Examples: https://jpgraph.net/features/gallery.php
