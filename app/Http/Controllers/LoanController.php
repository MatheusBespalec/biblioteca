<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    private $menu = 'emprestimos';

    public function index()
    {
        $user = Auth::user();

        $openLoans = Loan::where('return',0)
            ->join('users','loans.user_id','=','users.id')
            ->join('books','loans.book_id','=','books.id')
            ->paginate(20);
        $closeLoans = Loan::where('return',1)
            ->orderBy('devolution', 'desc')
            ->orderBy('code', 'desc')
            ->join('users','loans.user_id','=','users.id')
            ->join('books','loans.book_id','=','books.id')
            ->limit(10)
            ->get();

        return view('dashboard.loans.index',[
            'user'=>$user,
            'menu'=>$this->menu,
            'openLoans'=>$openLoans,
            'closeLoans'=>$closeLoans
        ]);
    }

    public function show()
    {
        $user = Auth::user();

        $openLoans = Loan::where('return',0)
            ->where('user_id',$user->id)
            ->join('books','loans.book_id','=','books.id')
            ->get();
        $closeLoans = Loan::where('return',1)
            ->where('user_id',$user->id)
            ->orderBy('devolution', 'desc')
            ->orderBy('code', 'desc')
            ->join('books','loans.book_id','=','books.id')
            ->paginate(10);

        return view('dashboard.loans.show',[
            'user'=>$user,
            'menu'=>$this->menu,
            'openLoans'=>$openLoans,
            'closeLoans'=>$closeLoans
        ]);
    }

    public function create()
    {
        $user = Auth::user();

        return view('dashboard.loans.create',['user'=>$user,'menu'=>$this->menu]);
    }

    public function store(StoreLoanRequest $request)
    {
        $request->validated();

        $data = $request->all();
        $data['withdraw'] = date('Y-m-d');
        $data['limit_devolution'] = date('Y-m-d', strtotime('+7 days'));

        Loan::create($data);

        $user = User::find($request->user_id);
        $user->open_loan = 1;
        $user->save();

        $user = Book::find($request->book_id);
        $user->available = 0;
        $user->save();

        return redirect()->route('dashboard.loans.index');
    }

    public function update(Loan $loan)
    {
        Loan::where('code', $loan->code)
            ->update(['return' => 1,'devolution' => date('Y-m-d')]);

        $user = User::find($loan->user_id);
        $user->open_loan = 0;
        $user->save();

        $user = Book::find($loan->book_id);
        $user->available = 1;
        $user->save();

        return redirect()->route('dashboard.loans.index');
    }
}
