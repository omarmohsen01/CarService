<div class="row border-top border-bottom">
    <div class="row main align-items-center">
        @php
            $images=json_decode($item->spare_part->images);
        @endphp
        <div class="col-2"><img class="img-fluid" src="{{ asset('storage/'.$images[0]) }}"></div>
        <div class="col-2">{{ $item->spare_part->name }}</div>
        <div class="col">
            <div class="row text-muted">{{ $item->category }}</div>
            <div class="row">{{ $item->name }}</div>
        </div>
        <div class="col">
            <a href="#" wire:click.prevent="decrement">-</a>
            <a href="#" class="border">{{ $quantity }}</a>
            <a href="#" wire:click.prevent="increment">+</a>
        </div>
        <div class="col">$ {{ number_format($item->spare_part->price * $quantity, 2) }} <span class="close">&#10005;</span></div>
    </div>
    
</div>
