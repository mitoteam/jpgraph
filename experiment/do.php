<?php

require_once __DIR__ . '/../src/MtJpGraph.php';

use mitoteam\jpgraph\MtJpGraph;

#region Environment info
MtJpGraph::load(['line', 'bar'], true);
print 'PHP: ' . phpversion() . PHP_EOL;
print 'JpGraph library version: ' . JPG_VERSION . PHP_EOL;
#endregion

#region Helpers
function mt_stroke($graph, $filename)
{
  if(file_exists($filename . '.png'))
  {
    unlink($filename . '.png');
  }

  $graph->Stroke($filename . '.png');
}
#endregion

#region Simple line
$graph = new Graph(300, 250);
$graph->SetScale("textlin");

$graph->SetTheme(new UniversalTheme());

$p1 = new LinePlot([10, 20, 25, 28, 30]);
$graph->Add($p1);
$p1->SetLegend('Line 1');

if(file_exists('line.png'))
{
  unlink('line.png');
}

mt_stroke($graph, 'line');
#endregion

#region Simple bar
$graph = new Graph(300, 200);
$graph->SetScale('intlin');

// Create a bar pot
$bplot = new BarPlot([4, 2, 8, 1, 4, 7]);

// Adjust fill color
$bplot->SetFillColor('magenta');
$graph->Add($bplot);

mt_stroke($graph, 'bar');
#endregion

#region HTML
$php_version = phpversion();
$lib_version = JPG_VERSION;

$html = <<<HTML
<html>
    <head>
        <title>MtJpGraph experiment</title>
    </head>
    <body style="font-family: Roboto, Arial, Helvetica, sans-serif; font-size: larger;">
        <style>
            .mt-block
            {
                margin: 10px; 
                padding: 10px;
                border: 1px solid grey;
                vertical-align: top;
            }
        </style>
        <div class="mt-block">
            PHP: $php_version, JpGraph library version: $lib_version
        </div>
        <div class="mt-block">
            <div>Simple line</div>
            <img src="line.png" />
        </div>
        <div class="mt-block">
            <div>Simple bar</div>
            <img src="bar.png" />
        </div>
    </body>
</html>
HTML;

file_put_contents('index.html', $html);
#endregion
