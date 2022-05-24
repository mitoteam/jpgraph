# Composer compatible JpGraph library (v4.4.1) with PHP 8.1 support

[![GitHub Version](https://img.shields.io/github/v/release/mitoteam/jpgraph?style=flat-square&logo=github)](https://github.com/mitoteam/jpgraph)
[![Packagist Version](https://img.shields.io/packagist/v/mitoteam/jpgraph?include_prereleases&style=flat-square&logo=packagist)](https://packagist.org/packages/mitoteam/jpgraph)
[![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/mitoteam/jpgraph?style=flat-square&logo=php)](https://github.com/mitoteam/jpgraph)

Current JpGraph library version: **4.4.1**

PHP versions support: from **5.5 to 8.1**. [Original notes](https://jpgraph.net/download/manuals/chunkhtml/ch01s05.html) about PHP versions.


## Usage with composer

This package is a helper to load original JpGraph library after declaring it as your dependency in composer.json:

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

You can call `MtJpGraph::load()` method as many times as you need everywhere in your code. Internally it checks if library or module was already loaded and does not load it another time.

## Usage WITHOUT composer

Download latest version archive from [Releases](https://github.com/mitoteam/jpgraph/releases) page and unpack it.
Since JpGraph v4.4.0 has native PHP 8.1 support, so this is almost the same as downloading it from https://jpgraph.net.

## Version numbers

We started with version _4.3.5_ as latest available library version in time we started. But we need to make some patches to original library (for example to support PHP 8.1). So we had to switch to own version numbers to be able to release updates.

At 2022-02-25 we decided to switch to version number **10.0.0** to leave some margin in numbering from original library v4.3.5.

Current version numbers:

* **Version 10.1.x** of this package is latest version of JpGraph library with php 8.1 compatibility patches (latest code in "main" branch).
* **Version 4.4.x** of this package provides latest version of original JpGraph library as-is without any compatibility patches (latest code in "original" branch).


## Links

* Original JpGraph website: https://jpgraph.net
* Documentation: https://jpgraph.net/doc/
* Examples: https://jpgraph.net/features/gallery.php
