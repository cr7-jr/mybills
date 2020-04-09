<div>
    <div class="position-relative">
        <input type="text" wire:model="counter_number" class="form-control input-search" placeholder="ادخل الرقم لبدء البحث">
        <span wire:loading>wait</span>
    </div>
    <a wire:click="clearTextInInput" href="{{route('new.water',['counter_number'=>$counter_number])}}" style="background-color: var(--colo_dark_bule) !important;" class=" {{$found===1?'d-=-block':'d-none'}} btn btn-primary mt-2">عرض</a>
</div>
<style>
    span{
        font-weight: bold;
        color: #163172;
        position: absolute;
        top: 4px;
        right: 7px;
        font-size: 15px;
    }
</style>

