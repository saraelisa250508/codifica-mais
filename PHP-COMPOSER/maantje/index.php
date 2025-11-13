<?php
require 'vendor/autoload.php'; //adicionei esse inicio pq nao tinha no cod

use Maantje\Charts\Bar\Bar;
use Maantje\Charts\Bar\Bars;
use Maantje\Charts\Chart;

$barChart = new Chart(
    series: [
        new Bars(
            bars: [
               new Bar(name: 'Jan', value: 222301, color: '#FF6384'),
               new Bar(name: 'Feb', value: 189242, color: '#36A2EB'),
               new Bar(name: 'Mar', value: 144922, color: '#ffc637ff'),

            ],
        ),
    ],
);

use Maantje\Charts\Line\Line;
use Maantje\Charts\Line\Lines;
use Maantje\Charts\Line\Point;

$lineChart = new Chart(
    series: [
        new Lines(
            lines: [
                new Line(
                    points: [
                        new Point(x: 0, y: 0),
                        new Point(x: 100, y: 4),
                        new Point(x: 200, y: 12),
                        new Point(x: 300, y: 8),
                    ],
                ),
                new Line(
                    points: [
                        [0, 0],
                        [100, 4],
                        [200, 12],
                        [300, 8],
                    ],
                ),
            ],
        ),
    ],
);

echo "<h2>Gráfico de Barras</h2>";
echo $barChart->render();

echo "<h2>Gráfico de Linhas</h2>";
echo $lineChart->render();
