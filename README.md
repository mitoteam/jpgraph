# JpGraph library composer compatible loader

Current JpGraph library version: **4.3.5**

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

##Links

* Original JpGraph website: https://jpgraph.net
* Documentation: https://jpgraph.net/doc/
* Examples: https://jpgraph.net/features/gallery.php
