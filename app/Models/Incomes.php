<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' => 'integer',
        'income' => 'float',
        'isIncome' => 'boolean',
        'category_id' => 'integer'
    ];
}
