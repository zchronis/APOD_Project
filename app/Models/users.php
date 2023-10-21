<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

final class users extends Model {
    const TABLE = 'users';
    
    protected $table = self::TABLE;
    protected $fillable = [];

    public function user_id(): int {
        return $this->user_id;
    }

    public function user_name(): string {
        return $this->user_name;
    }

    public function user_pass(): string {
        return $this->user_pass;
    }
}
?>
