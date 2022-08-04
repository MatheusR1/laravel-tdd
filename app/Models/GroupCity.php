<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupCity extends Model
{
    use HasFactory;

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function city() : BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function campaign() : BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
