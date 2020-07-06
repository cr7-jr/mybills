<div>
    <div class="position-relative">
        <input type="text" wire:model="hour_number" class="form-control input-search" placeholder="ادخل الرقم لبدء البحث">
        <span wire:loading>wait</span>
    </div>
    <a wire:click="clearTextInInput" href="{{route('new.electricity',['hour_number'=>$hour_number])}}" style="background-color: var(--colo_dark_bule) !important;" class="btn-search {{$found===1?'d-=-block':'d-none'}} btn btn-primary mt-2">عرض</a>
    <p class="{{$found===0?'d-block':'d-none'}}"> {{$text_not_found .' ' .$hour_number}}</p>

</div>

