<?php

namespace App\Nova;

use Ctessier\NovaAdvancedImageField\AdvancedImage;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Page extends Resource
{
    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Pages');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Page');
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Page::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title_a';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title_a', 'title_b'
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
            Avatar::make(__('Cover'), 'cover')->onlyOnIndex(),
            AdvancedImage::make(__('Cover'), 'cover')->croppable(4 / 1)->resize(960)->disk('public')->path('pages')->onlyOnForms(),
            Text::make(__('Title Main'), 'title_a')
                ->sortable()
                ->rules('required', 'max:72'),
            Text::make(__('Title Alt'), 'title_b')
                ->sortable()
                ->rules('max:72'),
            Text::make(__('Caption Main'), 'caption_a')
                ->sortable()
                ->rules('required', 'max:72'),
            Text::make(__('Caption Alt'), 'caption_b')
                ->sortable()
                ->rules('max:72'),
            Trix::make(__('Description Main'), 'content_a')->hideFromIndex()
                ->rules('required'),
            Trix::make(__('Description Alt'), 'content_b')->hideFromIndex(),


            Boolean::make(__('Available'), "available")
                ->sortable()
                ->withMeta(["value" => 1]),
            Boolean::make(__('Nav'), "nav")
                ->sortable(),
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
}
