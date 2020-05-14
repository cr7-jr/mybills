<div class="ml-auto">
    <i wire:click="like" class="fa fa-thumbs-o-up" style="cursor: pointer;{{$news->Users()->where('user_id', auth()->user()->id)->first()!=null?'color: blue':'color: red'}}"></i> {{$like}}
{{--
    <i wire:click="decrement" class="fa fa-thumbs-o-down ml-3" style="cursor: pointer"></i> {{$unlike}}
    --}}
</div>
