<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;
class LoanController extends Controller
{
    
public function borrow($itemId)
{
    DB::transaction(function () use ($itemId) {

        $item = Item::lockForUpdate()->findOrFail($itemId);

        if ($item->stock <= 0) {
            abort(400, 'Stok habis');
        }

        Loan::create([
            'user_id' => auth()->id(),
            'item_id' => $item->id,
            'loan_date' => now(),
            'status' => 'borrowed'
        ]);

        $item->decrement('stock');
    });

    return 'Barang berhasil dipinjam';
}

public function return($loanId)
{
    DB::transaction(function () use ($loanId) {

        $loan = Loan::lockForUpdate()->findOrFail($loanId);

        if ($loan->status === 'returned') {
            abort(400, 'Sudah dikembalikan');
        }

        $loan->update([
            'status' => 'returned',
            'return_date' => now()
        ]);

        $loan->item->increment('stock');
    });

    return 'Barang dikembalikan';
}

}
