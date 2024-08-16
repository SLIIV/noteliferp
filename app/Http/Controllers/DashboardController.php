<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Incomes;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function storeCategory(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required'
        ]);
        $category = new Categories;
        $category->user_id = $request->user_id;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('dashboard')->with('success');
    }

    public function storeIncome(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'income' => 'required',
            'isIncome',
            'category_id'
        ]);
        $income = new Incomes;
        $income->user_id = $request->user_id;
        $income->income = $request->income;
        $income->isIncome = $request->isIncome;
        if($income->isIncome == null) {
            $income->isIncome = 0;
        }
        if($income->isIncome == 0) {
            if(strval($income->income)[0] != '-') {
                $str = strval($income->income);
                $str = "-".$str;
                $income->income = intval($str);
            }
        }
        $income->category_id = $request->category_id;
        $income->save();
        return redirect()->route('dashboard')->with('success');
    }

    public function destroyCategory(Categories $category) {
        $category->delete();
        return redirect()->route('dashboard')->with('success');
    }

    public function GetDashboardInfo() {
        $categories = Categories::where('user_id', auth()->id())->get();
        $incomes = Incomes::where('user_id', auth()->id())->get()->sortByDesc('created_at');
        $incomesToday = Incomes::where('user_id', auth()->id())->where('created_at', '>', Carbon::now()->add(-1, 'days'))->sum('income');
        $allTimeIncomes = Incomes::where('user_id', auth()->id())->sum('income');
        $weekSums = collect([]);
        for($i = 6; $i > 0; $i--) {
            $weekSums->push(Incomes::where('user_id', auth()->id())->where('created_at', '>', Carbon::now()->add(-$i, 'days'))->where('created_at', '<', Carbon::now()->add(-$i + 1, 'days'))->sum('income'));
        }
        //dd($weekSums);
        return view('dashboard')->with(compact('categories', 'incomes','incomesToday', 'allTimeIncomes', 'weekSums'));
    }
}
