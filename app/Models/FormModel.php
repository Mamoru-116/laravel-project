<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormModel extends Model
{
    protected $fillable = ['name', 'email', 'password', 'phone', 'dob'];
    protected $table = 'form-data';

}
