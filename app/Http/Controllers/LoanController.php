<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    private $menu = 'emprestimos';

    public function index()
    {
        $user = Auth::user();

        $openLoans = Loan::where('return',0)
            ->orderBy('devolution', 'desc')
            ->orderBy('id', 'desc')
            ->with(['user','book'])
            ->paginate(20);
        $closeLoans = Loan::where('return',1)
            ->orderBy('devolution', 'desc')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->with(['user','book'])
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
            ->orderBy('devolution', 'desc')
            ->orderBy('id', 'desc')
            ->with(['user','book'])
            ->get();
        $closeLoans = Loan::where('return',1)
            ->where('user_id',$user->id)
            ->orderBy('devolution', 'desc')
            ->orderBy('id', 'desc')
            ->with(['user','book'])
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

        $loan = Loan::create($data);
        $loan->user->open_loan = 1;
        $loan->book->available = 0;
        $loan->push();

        return redirect()->route('dashboard.loans.index');
    }

    public function update(Loan $loan)
    {
        $loan->devolution = date('Y-m-d');
        $loan->return = 1;
        $loan->user->open_loan = 0;
        $loan->book->available = 1;
        $loan->push();

        return back();
    }
}
