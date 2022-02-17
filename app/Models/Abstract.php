<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{
    protected $encryption = [];

    protected static function boot()
    {
        parent::boot();

        // When being retrieved, decrypt the attributes.
        static::retrieved(function ($instance) {
            foreach ($instance->encryption as $encryptedKey) {
                $instance->attributes[$encryptedKey] = Crypt::decryptString($instance->attributes[$encryptedKey]);
            }
        });

        // When saving (could be create or update) the modal, encrypt the attributes.
        static::saving(function ($instance) {
            foreach ($instance->encryption as $encryptedKey) {
                $instance->attributes[$encryptedKey] = Crypt::encryptString($instance->attributes[$encryptedKey]);
            }
        });

        // Once it's saved, decrypt it back so it's still readble.
        static::saved(function ($instance) {
            foreach ($instance->encryption as $encryptedKey) {
                $instance->attributes[$encryptedKey] = Crypt::decryptString($instance->attributes[$encryptedKey]);
            }
        });
    }
}