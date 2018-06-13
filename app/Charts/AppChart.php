<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class AppChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->displayLegend(false);
        $this->options([
            'backgroundColor' => 'rgba(210, 214, 222, 1)',
            'strokeColor' => 'rgba(210, 214, 222, 1)',
            'pointColor' => 'rgba(210, 214, 222, 1)',
            'pointStrokeColor' => '#c1c7d1',
            'pointHighlightFill' => '#fff',
            'pointHighlightStroke'=>'rgba(220,220,220,1)'
        ]);
    }
}
