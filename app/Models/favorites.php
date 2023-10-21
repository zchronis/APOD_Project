<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

final class favorites extends Model {
    const TABLE = 'favorites';
    
    protected $table = self::TABLE;
    protected $fillable = [];
    
    public function user_id(): int {
        return $this->user_id;
    }

    public function apod_id(): int {
        return $this->apod_id;
    }

    public function apods() {
        return $this->hasMany(apods::class, 'apod_id', 'apod_id');
    }
}
?>
