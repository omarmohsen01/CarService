<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\ModelCar;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ShowModels extends Component
{
    public $selectedModels = [];

    public $brandId;
    public $modelId;
    public function updatedBrandId()
    {
        $this->reset(['selectedModels']);
    }

    public function updatedSelectedModels($value, $modelId)
    {
        if ($value) {
            $this->selectedModels[] = $modelId;
        } else {
            $index = array_search($modelId, $this->selectedModels);
            unset($this->selectedModels[$index]);
        }
    }
    #[Computed()]
    public function brands()
    {
        return Brand::all();
    }
    #[Computed()]
    public function models()
    {
        return ModelCar::where('brand_id',$this->brandId)->get();
    }

    public function render()
    {
        return view('livewire.show-models');
    }
}
