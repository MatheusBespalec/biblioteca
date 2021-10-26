<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    private $menu = 'emprestimos';

    public function index()
    {
        $user = Auth::user();

        $openLoans = Loan::where('return',0)
            ->join('users','loans.user_id','=','users.id')
            ->get();
        $closeLoans = Loan::where('return',1)
            ->join('users','loans.user_id','=','users.id')
            ->join('books','loans.book_id','=','books.id')
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

        $openLoans = Loan::where('return',0)->get();
        $closeLoans = Loan::where('return',1)
            ->join('books','loans.book_id','=','books.id')
            ->get();

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

        return redirect()->route('dashboard.loans');
    }

    public function update($loan)
    {
        $loan = Loan::findOrFail($loan);

        $loan->return = 1;
        $loan->devolution = date('Y-m-d');

        $loan->save();

        return redirect()->route('dashboard.loans');
    }
}
