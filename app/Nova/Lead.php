<?php

namespace App\Nova;

use App\Nova\Actions\ApprovePayment;
use Bissolli\NovaPhoneField\PhoneNumber;
use Illuminate\Http\Request;
use Inspheric\Fields\Email;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Lead extends Resource
{
    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Leads');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Lead');
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Lead::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'email';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name', 'email', 'phone'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make(__('Name'), 'name'),
            Email::make(__('Email'), 'email'),
            PhoneNumber::make(__('Phone'), 'phone'),
            Text::make('Title', function () {
                $title = json_decode($this->title);
                return $title->package . '/' . $title->bundle;
            })->onlyOnIndex(),
            Trix::make('Title', 'title'),
            Trix::make('Note', 'note'),
            Badge::make(__('Status'), 'status', function () {
                return $this->statusLabel($this->status);
            })
                ->map([
                    $this->statusLabel(0) => 'warning',
                    $this->statusLabel(1) => 'success',
                ]),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
    private function statusLabel($status)
    {
        $label = '#E';
        switch ($status) {
            case 0:
                $label = __('Pending');
                break;
            case 1:
                $label = __('Authorized');
                break;
        }
        return $label;
    }
}
