# JpGraph library composer package with PHP 8.3 support

[![Packagist Version](https://img.shields.io/packagist/v/mitoteam/jpgraph?include_prereleases&style=flat-square&logo=packagist)](https://packagist.org/packages/mitoteam/jpgraph)
[![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/mitoteam/jpgraph?style=flat-square&logo=php)](https://github.com/mitoteam/jpgraph)
[![Packagist Total Downloads](https://img.shields.io/packagist/dt/mitoteam/jpgraph?style=flat-square)](https://packagist.org/packages/mitoteam/jpgraph/stats)
[![Packagist Monthly Downloads](https://img.shields.io/packagist/dm/mitoteam/jpgraph?style=flat-square)](https://packagist.org/packages/mitoteam/jpgraph/stats)

[![GitHub Version](https://img.shields.io/github/v/release/mitoteam/jpgraph?style=flat-square&logo=github)](https://github.com/mitoteam/jpgraph)
[![GitHub Release Date](https://img.shields.io/github/release-date/mitoteam/jpgraph?style=flat-square)](https://github.com/mitoteam/jpgraph/releases)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/mitoteam/jpgraph?style=flat-square)
[![GitHub contributors](https://img.shields.io/github/contributors-anon/mitoteam/jpgraph?style=flat-square)](https://github.com/mitoteam/jpgraph/graphs/contributors)
[![GitHub commit activity](https://img.shields.io/github/commit-activity/y/mitoteam/jpgraph?style=flat-square)](https://github.com/mitoteam/jpgraph/commits)

Current JpGraph library version: **4.4.2**

PHP versions support: from 5.5 to **8.3**. [Original notes](https://jpgraph.net/download/manuals/chunkhtml/ch01s05.html) about PHP versions.


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
//or
MtJpGraph::load(['bar', 'line'], true); # load with several modules in Extended Mode (see below)

//using original JpGraph classes
$graph = new Graph(200, 300);
```

You can call `MtJpGraph::load()` method as many times as you need everywhere in your code. Internally it checks if library or module was already loaded and does not load it another time.

## Usage without composer

Download latest version archive from [Releases](https://github.com/mitoteam/jpgraph/releases) page and unpack it.

## Version numbers

We started with version _4.3.5_ as latest available library version in time we started. But we need to make some patches to original library (for example to support latest PHP versions). So we had to switch to own version numbers to be able to release updates.

At 2022-02-25 we decided to switch to version number **10.0.0** to leave some margin in numbering from original library v4.3.5.

Current version numbers:

* **Version 10.4.x** of this package is latest version of JpGraph library with php **8.2-8.3** compatibility patches (latest code in "main" branch). Can be loaded in Extended Mode (see below).
* **Version 4.4.x** of this package provides latest version of original JpGraph library as-is without any compatibility patches (latest code in "original" branch).

All changes to the original library can be examined as [difference between **main** and **original** branches](https://github.com/mitoteam/jpgraph/compare/original..main#files_bucket).

## Extended Mode

We started with just patches for compatibility with recent PHP versions. Before version 10.3 there were no any changes to original code except adding some typecasting or declaring some class members explicitly.

But after library was used wider there were some bugs discovered in original code. We aware to change functionality of the original library so **Extended Mode** was introduced in version **10.3.0**. Now you can pass `true` as second argument to `MtJpGraph::load()` method to enable Extended Mode. This will enable several more patches to the original code to overcome some bugs.

Extended Mode is disabled by default, you can enable it explicitly only.

## Links

* Original JpGraph website: https://jpgraph.net
* Documentation: https://jpgraph.net/doc/
* Examples: https://jpgraph.net/features/gallery.php
