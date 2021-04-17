<?php

namespace App\Nova\Metrics;

use App\Thread;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;

class ThreadPartition extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this->count($request, Thread::class, 'indoor')
            ->label(function ($value) {
                switch ($value) {
                    case 0:
                        return __('Outside');
                        break;
                    case 1:
                        return __('Inside');
                        break;
                    default:
                        return ucfirst($value);
                }
            })->colors([
                __('Outside') => '#e74c3c',
                __('Inside') => '#27ae60',
                // photo will use the default color from Nova
            ]);
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'thread-partition';
    }
}
