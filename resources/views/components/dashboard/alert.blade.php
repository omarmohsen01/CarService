@if (session()->has('success'))
    <div class="alert text-white bg-success" role="alert">
        <div class="iq-alert-icon">
        <i class="ri-alert-line"></i>
        </div>
        <div class="iq-alert-text">{{ session('success') }}</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ri-close-line"></i>
        </button>
    </div>
@elseif (session()->has('fail'))
    <div class="alert text-white bg-danger" role="alert">
        <div class="iq-alert-icon">
        <i class="ri-information-line"></i>
        </div>
        <div class="iq-alert-text">{{ session('fail') }}</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ri-close-line"></i>
        </button>
    </div>
@endif
