<div>
        <select wire:model="brandId" name="brand_id" id="brandSelect" style="margin-bottom: 20px">
            <option value="">Select Brand</option>
            @foreach ($this->brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>

        <select wire:model="selectedModelId" name="model_id" id="modelSelect" >
            <option value="">Select Model</option>
            @if ($this->models->isNotEmpty())
                @foreach ($this->models as $model)
                    <option value="{{ $model->id }}">{{ $model->code }}</option>
                @endforeach
            @endif
        </select>
</div>
