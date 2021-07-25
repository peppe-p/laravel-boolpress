<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMail extends Model
{
    protected $fillable = ['name', 'email', 'message'];
}