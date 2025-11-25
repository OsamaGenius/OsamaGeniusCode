<?php

namespace App\Livewire\Charts;

use Livewire\Component;

class Traffic extends Component
{
    public $id;
    public $labels;
    public $sales;
    public $revenue;

    public function mount()
    {
        $this->generateData();
    }

    public function generateData()
    {
        $this->labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jon', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $this->sales = [
            rand(50, 150),
            rand(50, 150),
            rand(50, 150),
            rand(50, 150),
            rand(50, 150),
            rand(50, 150),
            rand(50, 150),
            rand(50, 150),
            rand(50, 150),
            rand(50, 150),
            rand(50, 150),
            rand(50, 150),
        ];

        $this->revenue = [
            rand(150, 900),
            rand(150, 900),
            rand(150, 900),
            rand(150, 900),
            rand(150, 900),
            rand(150, 900),
            rand(150, 900),
            rand(150, 900),
            rand(150, 900),
            rand(150, 900),
            rand(150, 900),
            rand(150, 900),
        ];

        $this->dispatch('updateChart',
            labels: $this->labels,
            sales: $this->sales,
            revenue: $this->revenue,
        );
    }

    public function render()
    {
        return view('livewire.charts.traffic');
    }
}
