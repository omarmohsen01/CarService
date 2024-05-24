<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\ModelCar;
use Livewire\Component;

class EditModel extends Component
{
    public $selectedModels = [];
    public $brandId;
    public $modelId;

    // Fetch the model data to be edited
    public function mount($brandId)
    {
        $this->brandId = $brandId;
        $models = ModelCar::where('brand_id', $brandId)->pluck('id')->toArray();
        $this->selectedModels = $models;
    }

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

    public function render()
    {
        // Load brands and models for dropdowns
        $brands = Brand::all();
        $models = ModelCar::where('brand_id', $this->brandId)->get();

        return view('livewire.edit-model', compact('brands', 'models'));
    }
}
