<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function GroupCities()
    {
        return $this->hasMany(GroupCity::class);
    }

    public function Campaign()
    {
        return $this->hasOne(Campaign::class);
    }
}
