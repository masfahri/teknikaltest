<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory;
    protected $table = 'phones';
    protected $fillable = ['phone_no', 'provider', 'user_id'];
    protected $encryption = ['phone_no'];

    public function setPhoneNoAttribute($value)
    {
        $this->attributes['phone_no'] = $value;
    }
    
    public function getPhoneNoAttribute($value)
    {
        $this->attributes['phone_no'] = $value;
    }

    public static function checkPhoneNo($phone_no)
    {
        $isAvailable = $this->wherePhoneNo($phone_no)->isExist();
        dd($isAvailable);
    }
}
