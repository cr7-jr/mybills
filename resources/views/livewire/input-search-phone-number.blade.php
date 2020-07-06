<div>
    <div class="position-relative">
        <input type="text" wire:model="phone_number" class="form-control input-search" placeholder="ادخل الرقم لبدء البحث">
        <span wire:loading>wait</span>
    </div>
    <a wire:click="clearTextInInput" href="{{route('new.telecome',['phone_number'=>$phone_number])}}" style="background-color: var(--colo_dark_bule) !important;" class="btn-search {{$found===1?'d-block':'d-none'}} btn btn-primary mt-2">عرض</a>
    <p class="{{$found===0?'d-block':'d-none'}}"> {{$text_not_found .' ' .$phone_number}}</p>
</div>

