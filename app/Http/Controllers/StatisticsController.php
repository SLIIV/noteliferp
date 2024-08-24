<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Models\Categories;
use App\Models\Incomes;

class StatisticsController extends Controller
{
    public function GetStatistics() {
        //$allTimeIncome = Incomes::where('user_id', auth()->id())->sum('income');
        
        $categories = Categories::where('user_id', auth()->id())->get();
        return view('stats')->with(compact('categories'));
    }
    public function GetCategoryStats(Request $request) {
         if(count($request->categoryId) == 1) {
            echo "Доходность категории: " . Incomes::where('user_id', auth()->id())->where('category_id', $request->categoryId[0])->sum('income');
        }
         if(count($request->categoryId) > 1) {
            echo "Доходность категорий: " . Incomes::where('user_id', auth()->id())->whereIn('category_id', $request->categoryId)->sum('income');
        }

        return;
    }
    public function GetDateStats(Request $request) {
        for($i = 6; $i > 0; $i--) {
            $weekSums->push(Incomes::where('user_id', auth()->id())->where('created_at', '>', Carbon::now()->add(-$i, 'days'))->where('created_at', '<', Carbon::now()->add(-$i + 1, 'days'))->sum('income'));
        }
        
    }
}
