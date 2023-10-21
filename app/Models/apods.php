<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

final class apods extends Model {
    const TABLE = 'apods';
    
    protected $table = self::TABLE;
    protected $fillable = [];

    public function apod_id(): int {
        return $this->apod_id;
    }

    public function copyright(): string {
        return $this->copyright;
    }

    public function photo_date(): string {
        return $this->photo_date;
    }

    public function explanation(): string {
        return $this->explanation;
    }

    public function hdurl(): string {
        return $this->hdurl;
    }

    public function title(): string {
        return $this->title;
    }

}
?>
