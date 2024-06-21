<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\ModelCar;
use Livewire\Component;

class FilterModel extends Component
{
    public $selectedModelId = null;
    public $brandId = null;

    public function updatedBrandId()
    {
        $this->selectedModelId = null;
    }

    public function getBrandsProperty()
    {
        return Brand::all();
    }

    public function getModelsProperty()
    {
        return ModelCar::where('brand_id', $this->brandId)->get();
        // return $this->brandId ? ModelCar::where('brand_id', $this->brandId)->get() : collect();
    }
    public function render()
    {
        return view('livewire.filter-model');
    }
}
