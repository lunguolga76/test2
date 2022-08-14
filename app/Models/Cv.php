<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Cv extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['name','address','education', 'work', 'experience'];

    public function toSearchableArray()
    {
        $array = [
            'id' => $this->id,
            'title'=>$this->title
        ];
        return $array;
    }
}
