<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUtilsUML
{
    public static function transform($lbl)
    {
        //Convert to title and replace _ with space
        return str_replace('_', ' ', ucfirst(Str::lower($lbl)));
    }

    public static function editBtn()
    {
        return [
            'class' => 'shadow-lg bg-gray-100 rounded-md p-2 border-b-4 border-amber-500 text-ugreen-500 hover:bg-gray-200',
        ];
    }

    public static function deleteBtn()
    {
        return [
            'class' => 'shadow-lg bg-gray-100 rounded-md p-2 border-b-4 border-red-500 text-ugreen-500 hover:bg-gray-200',
        ];
    }
}
