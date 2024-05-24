<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="modelSelect"><b>Brand:</b></label>
            <select wire:model="brandId" class="custom-select" name="brand_id" placeholder="Select brand">
                <option value="">Select Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <label for="modelSelect"><b>Models:</b></label>
        <div class="form-group">
            @foreach ($models as $model)
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input wire:model="selectedModels.{{ $model->id }}" type="checkbox" class="custom-control-input" value="{{ $model->id }}" name="model_id[]" id="customCheck{{ $model->id }}">
                    <label class="custom-control-label" for="customCheck{{ $model->id }}">{{ $model->code }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
