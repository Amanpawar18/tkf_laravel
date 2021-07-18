<?php

namespace App\Models;

use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class TdsTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'user_id',
        'period', 'period_start',
        'period_end'
    ];

    protected static function boot()
    {
        parent::boot();

        $url = url()->current();
        static::addGlobalScope('hasUser', function (Builder $builder) {
            $builder->orderBy('id', 'DESC');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getCurrentPeriodStart()
    {
        if (Setting::get('tds_percent') && Setting::get('tds_percent') > 0 && Setting::get('tds_period')) {
            $chunks = self::getPeriodChunks();
            foreach ($chunks as $key => $collection) {
                if ($collection->contains(Carbon::now()->month)) {
                    $date = Carbon::createFromDate(Carbon::now()->year, $collection->first(), 1);
                    $startOfYear = $date->copy()->startOfMonth()->toDateString();
                    $periodStart = $startOfYear;
                }
            }
        }
        return $periodStart;
    }

    public static function getCurrentPeriodEnd()
    {
        $periodEnd = "";
        if (Setting::get('tds_percent') && Setting::get('tds_percent') > 0 && Setting::get('tds_period')) {
            $chunks = self::getPeriodChunks();
            foreach ($chunks as $key => $collection) {
                if ($collection->contains(Carbon::now()->month)) {
                    $date = Carbon::createFromDate(Carbon::now()->year, $collection->last(), 1);
                    $endOfYear   = $date->copy()->endOfMonth()->toDateString();
                    $periodEnd = $endOfYear;
                }
            }
        }
        return $periodEnd;
    }

    public static function getPeriodChunks()
    {
        $monthsArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $monthsCollection = collect($monthsArray); // total count of the array monthsArray
        if (Setting::get('tds_period') == Setting::TDS_PERIOD_YEARLY) {
            $chunks =  $monthsCollection->chunk(12);
        } else if (Setting::get('tds_period') == Setting::TDS_PERIOD_HALF_YEARLY) {
            $chunks =  $monthsCollection->chunk(6);
        } else if (Setting::get('tds_period') == Setting::TDS_PERIOD_QUARTERLY) {
            $chunks =  $monthsCollection->chunk(3);
        } else if (Setting::get('tds_period') == Setting::TDS_PERIOD_MONTHLY) {
            $chunks =  $monthsCollection->chunk(1);
        }
        return $chunks;
    }
}
