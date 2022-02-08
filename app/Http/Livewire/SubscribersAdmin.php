<?php

namespace App\Http\Livewire;
use App\Models\subscribe;
use Illuminate\Http\Request;
use Livewire\Component;

class SubscribersAdmin extends Component
{


    public function index(Request $request,$lang){
        $subscribers=subscribe::paginate(config('web.pagination'));

        return view('dashboard.subscribers.index')
            ->with('subscribers',  $subscribers)
            ->with('lang',  $lang);
    }
}
