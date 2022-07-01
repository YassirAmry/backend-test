<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = ['name', 'file', 'enable'];

    public function getFileDirectoryAttribute()
    {
        return 'images/' . $this->getYearCreatedAtAttribute() . '/' . $this->getMonthCreatedAtAttribute()  . '/';
    }

    public function getFilePathAttribute()
    {
        return $this->getFileDirectoryAttribute() . $this->file;
    }

    public function getMonthCreatedAtAttribute()
    {
        return date('m', strtotime($this->created_at));
    }

    public function getYearCreatedAtAttribute()
    {
        return date('Y', strtotime($this->created_at));
    }
}
