<?php


namespace App\Http\Livewire;
use Spatie\Analytics\Period;
use Livewire\Component;
use Livewire\WithPagination;
use Analytics; 

class GoogleAnalytics extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sort_google;

    public function render()
    { 
        if($this->sort_google == 'today'){
            $date = 0;
        }elseif($this->sort_google == 'yesterday'){
            $date = 1;
        }elseif($this->sort_google == 'week'){
            $date = 7;
        }elseif($this->sort_google == 'month'){
            $date = 30;
        }else{
            $date = 0;
        }
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days($date));
        return view('livewire.google-analytics')->with(compact('analyticsData'));
    }
}
