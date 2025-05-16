<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use App\Stats\BorrowingStats;
use Carbon\Carbon;
use Livewire\Component;

class DashboardAction extends Component
{
    public function render()
    {
        $books = Book::get();
        $borrowings = Borrowing::pluck('borrowed_at');
        $user_count = User::count();

        $overdueBooksCount = 0;

        foreach ($books as $book) {
            if ($book->status === 'overdue') $overdueBooksCount++;
        }

        $borrowedTodayCount = 0;

        foreach ($borrowings as $borrowment) {
            if (Carbon::parse($borrowment)->greaterThan(today())) $borrowedTodayCount++;
        }

        //? Stats

        $borrowingStats = BorrowingStats::query()
            ->start(now()->subMonth())
            ->end(now()->subSecond())
            ->groupByDay()
            ->get();

        return view('livewire.dashboard-action', [
            'borrowingStats' => $borrowingStats->pluck('value'),
            'books' => $books,
            'user_count' => $user_count,
            'overdueBooksCount' => $overdueBooksCount,
            'borrowedTodayCount' => $borrowedTodayCount
        ]);
    }
}
