<?php

namespace App\Http\Livewire;

use App\notifications;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class ListNotification extends Component
{
    protected $listeners = ['renderListNotifications' => 'render'];

    public  function read_notification($id)
    {
       $notification=notifications::find($id);
       $notification->read_at=Carbon::now();
       $notification->save();


    }
    public function render()
    {
        return view('livewire.list-notification');
    }
}
