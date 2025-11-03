<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardCard extends Component
{
    public $title;
    public $value;
    public $color;
    public $subtitle;

    public function __construct($title, $value, $color = 'gray', $subtitle = '')
    {
        $this->title = $title;
        $this->value = $value;
        $this->color = $color;
        $this->subtitle = $subtitle;
    }

    public function render()
    {
        return view('components.dashboard-card');
    }
}