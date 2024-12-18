<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserComponent extends Component
{
    public function render()
    {
        $users = User::whereHas('tulovs', function ($query) use ($selectedDates) {
            $query->whereIn('tulovs.created_at', $selectedDates);
        })
            ->withCount(['tulovs as total_tulov_summa' => function ($query) {
                $query->select(DB::raw('SUM(tulovs.summa)'))
                      ->groupBy('tulovs.user_id');
            }])
            ->having('total_tulov_summa', '>', 1000000)
            ->orderBy('total_tulov_summa', 'DESC')
            ->limit(10)
            ->get();
        dd($users);
        
        
        $users = DB::table('users')
        ->join('tulovs', 'users.id', '=', 'tulovs.user_id')
        ->where('tulovs.created_at', '>=', now()->subDays(10))
        ->groupBy('users.id')
        ->having(DB::raw('SUM(tulovs.summa)'), '>', 1000000)
        ->select('users.*', DB::raw('SUM(tulovs.summa) as total_tulov'))
        ->orderBy(DB::raw('SUM(tulovs.summa)'), 'desc')
        ->limit(10)
        ->get();
    
            dd($users);
        return view('livewire.user-component');
    }
}
