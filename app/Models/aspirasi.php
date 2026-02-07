<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aspirasi extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori');
    }

    public function inputaspirasi()
    {
        return $this->belongsTo(inputaspirasi::class, 'inputaspirasi_id');
    }

    public static function booted()
    {
        static::updated(function ($aspirasi){
            $parent = $aspirasi->inputaspirasi;
            if ($parent) {
                $parent->update([
                    'status' => $aspirasi->status,
                    'feedback' => $aspirasi->feedback,
                ]);
            }
        });
    }
}
