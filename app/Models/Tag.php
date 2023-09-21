<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    function posts(){
        return $this->belongsToMany(Post::class);
        //هذا معناه انه البوست الواحد عشان كدا سميت الدالة بوست معناه انه ينتمي له العديد او الكثير من التاغات عشان كدا هنا عملنا العلاقة متعدد ل متعدد ف مودل التاغ علاقة بوست تربطه فيها عشان اقدر اجيب كل البوستات الي مع كل تاغ.
    }
}
