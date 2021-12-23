<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FullTimeEmployee extends Model
{
    use HasFactory;

    protected $table = 'full_time_employee';
    protected $fillable = ['name', 'identity', 'mobile', 'bank_account_number', 'salary',];
}
