<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use App\Models\User;
use Livewire\Component;

class DriverRating extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $driver;
    public $hideForm;
    public $rate;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    public function render()
    {
        $this->rate = $this->rates();

//        $comments = Rating::where('driver_id', $this->driver->id)->where('status', 1)->with('user')->get();
        // $url = "http://127.0.0.1:8000/api/rating/" . $this->driver->id;

        // $response = file_get_contents($url);
        $comments =     Rating::where('driver_id', $this->driver->id)->get();
        ;



        return view('livewire.driver-rating', compact('comments'));
    }

    public function mount()
    {
        if(auth()->user()){
            $rating = Rating::where('user_id', auth()->user()->id)->where('driver_id', $this->driver->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
        return view('livewire.driver-rating');
    }

    public function delete($id)
    {
        $rating = Rating::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }
//
//    public function rate()
//    {
//        $rating = Rating::where('user_id', auth()->user()->id)->where('driver_id', $this->driver->id)->first();
//        $this->validate();
//        if (!empty($rating)) {
//            $rating->user_id = auth()->user()->id;
//            $rating->driver_id = $this->driver->id;
//            $rating->rating = $this->rating;
//            $rating->comment = $this->comment;
//            $rating->status = 1;
//            try {
//                $rating->update();
//            } catch (\Throwable $th) {
//                throw $th;
//            }
//            session()->flash('message', 'Success!');
//        } else {
//            $rating = new Rating;
//            $rating->user_id = auth()->user()->id;
//            $rating->driver_id = $this->driver->id;
//            $rating->rating = $this->rating;
//            $rating->comment = $this->comment;
//            $rating->status = 1;
//            try {
//                $rating->save();
//            } catch (\Throwable $th) {
//                throw $th;
//            }
//            $this->hideForm = true;
//        }
//    }
    //    my function
    public function rates(){
        $rates = Rating::where('driver_id', $this->driver->id)->get();
        $count = 0;
        if(count($rates) == 0)
            return 0;

        foreach ($rates as $rate){
            $count += intval($rate->rating);
        }
        return $count/count($rates);
    }
}
