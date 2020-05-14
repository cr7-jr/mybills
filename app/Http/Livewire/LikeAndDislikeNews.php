<?php

namespace App\Http\Livewire;

use App\news;
use Livewire\Component;

class LikeAndDislikeNews extends Component
{
    public $news;
   // public $clickLike=false;
   // public $clickUnLike=false;
    public $like;
    //public $unlike;
    public function mount($news)
    {
       $this->news=$news;
       $this->like=$news->like;
      // $this->unlike=$news->unlike;
    }
    public function like()
    {
        $news=news::find($this->news->id);
        //if( $news->Users()->where('user_id', auth()->user()->id)->first()==null) {

            if ($news->Users()->where('user_id', auth()->user()->id)->first()!=null) {
                $this->like--;
            } else {
                $this->like++;
            }
            $news->like = $this->like;
            $news->Users()->toggle([auth()->user()->id]);
            $news->save();
       // }
    }
    /*public function decrement()
    {
        $news=news::find($this->news->id);
        if( $news->Users()->where('user_id', auth()->user()->id)->first()==null) {
            if ($this->clickUnLike) {
                $this->unlike--;
                $this->clickUnLike = false;
            } else {
                $this->unlike++;
                $this->clickUnLike = true;

            }
            $news->unlike = $this->unlike;
            $news->save();
        }
    }*/
    public function render()
    {
        return view('livewire.like-and-dislike-news');
    }
}
