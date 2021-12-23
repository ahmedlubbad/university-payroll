<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartTimeEmployee extends Model
{
    use HasFactory;

    protected $table = 'part_time_employee';
    protected $fillable = ['name', 'identity', 'mobile', 'bank_account_number', 'salary',];

}
