{{-- Nothing in the world is as soft and yielding as water. --}}
<div class="btn-group">
    <button type="button" style="background: #163172;"  class="con-span-noti-count btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell-o"></i>
        <span class="span-noti-count {{ count(auth()->user()->unreadNotifications)!=0?'':'d-none' }}">{{count(auth()->user()->unreadNotifications)}}</span>
    </button>
    <div  class="dropdown-menu con-noti  " style="width: 400px;height: 318px;overflow-y: scroll;word-break: break-word;">
        <ul class="list-noti list-unstyled ">
            @foreach(auth()->user()->Notifications as $noti)
                <a href='/en/dashboard/questionAwaitingTheAnswer?searsh={{$noti->data['data']['id']}}' style="color:black;text-decoration: none">
                    <li wire:click="read_notification('{{$noti->id}}')" class="li-noti {{$noti->read_at==null?'new-noti':''}}  " >

                        <p style="margin-bottom: 0px;padding-left: 10px;padding-top: 5px">
                            {!!  $noti->data['data']['text_question']!!}
                        </p>
                            <hr>
                    </li>
                </a>
            @endforeach()
        </ul>
    </div>
</div>
