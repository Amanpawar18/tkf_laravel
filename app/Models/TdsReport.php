<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TdsReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'period',
        'period_start', 'period_end',
        'report'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');

        if (
            file_exists(public_path('frontend/uploads/tdsReports/' . $this->report))
            && is_file(public_path('frontend/uploads/tdsReports/' . $this->report))
        )
            $path = asset('frontend/uploads/tdsReports/' . $this->report);

        return $path;
    }
}
