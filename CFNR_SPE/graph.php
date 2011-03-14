<?php
  include 'jpgraph/jpgraph.php';
  include 'jpgraph/jpgraph_bar.php';

  $array = array(1, 2, 4, 5, 3, 3.5, 2, 1.1);
  $graph = new Graph(600,350);
  $graph->SetScale('textint');
  $plot = new BarPlot($array);
  $graph->Add($plot);
  $graph->Stroke();
?>