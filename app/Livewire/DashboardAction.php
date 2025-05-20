<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use App\Stats\BorrowingStats;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardAction extends Component
{
    public function render()
    {
        $books = Book::with(['borrowings', 'currentBorrowing'])->get();
        $borrowings = Borrowing::pluck('borrowed_at');

        $user_count = User::count();
        $booksCount = $books->count();
        $overdueBooksCount = 0;
        $availableBooksCount = 0;
        $borrowedBooksCount = 0;

        $borrowedTodayCount = 0;

        foreach ($books as $book) {
            if ($book->status === 'overdue') $overdueBooksCount++;
            elseif ($book->status === 'available') $availableBooksCount++;
            elseif ($book->status === 'borrowed') $borrowedBooksCount++;
        }

        foreach ($borrowings as $borrowment) {
            if (Carbon::parse($borrowment)->greaterThan(today())) $borrowedTodayCount++;
        }

        //? Stats
        $borrowingStats = Cache::remember('borrowing_stats_monthly', 60 * 60, function () {
            return BorrowingStats::query()
                ->start(now()->subMonth())
                ->end(now()->subSecond())
                ->groupByDay()
                ->get();
        });

        // not borrowed
        $notBorrowedCount = Book::with(['borrowings'])->doesntHave('borrowings')->count();

        $bookStatusList = [$notBorrowedCount, $availableBooksCount - $notBorrowedCount, $borrowedBooksCount, $overdueBooksCount];

        return view('livewire.dashboard-action', [
            'borrowingStats' => $borrowingStats->pluck('value'),
            'bookStatusList' => $bookStatusList,
            'bookCount' => $booksCount,
            'userCount' => $user_count,
            'overdueBooksCount' => $overdueBooksCount,
            'borrowedTodayCount' => $borrowedTodayCount
        ]);
    }
}
