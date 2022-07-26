<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Campaign extends Model
{
    use HasFactory;

    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function discont() : BelongsTo
    {
        return $this->belongsTo(Discont::class);
    }
}
