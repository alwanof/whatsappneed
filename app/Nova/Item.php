<?php

namespace App\Nova;

use Benjacho\BelongsToManyField\BelongsToManyField;
use Ctessier\NovaAdvancedImageField\AdvancedImage;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Item extends Resource
{
    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Items');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Item');
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Item::class;

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
        'title_a',
        'title_b',
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
            Avatar::make(__('Avatar'), 'avatar')->onlyOnIndex(),
            AdvancedImage::make(__('Avatar'), 'avatar')->croppable(16 / 9)->resize(320)->disk('public')->path('items')->onlyOnForms(),
            Text::make(__('Title Main'), 'title_a')
                ->sortable()
                ->rules('required', 'max:72'),
            Text::make(__('Title Alt'), 'title_b')
                ->sortable()
                ->rules('max:72'),
            Text::make(__('Description Main'), 'desc_a')->hideFromIndex(),
            Text::make(__('Description Alt'), 'desc_b')->hideFromIndex(),
            Number::make(__('Price'), 'price')
                ->sortable()
                ->rules('required', 'min:0'),

            Boolean::make(__('Available'), "available")
                ->sortable()
                ->withMeta(["value" => 1]),
            Text::make(__("Category"), function () {
                return implode(', ', $this->categories()->pluck('title_a')->toArray());
            })->onlyOnIndex(),
            BelongsToMany::make(__("Category"), "categories"),
            BelongsToManyField::make(__("Category"), "categories", "App\Nova\Category")->onlyOnForms(),

            Avatar::make(__('Image1'), 'image1')->onlyOnDetail(),
            AdvancedImage::make(__('Image1'), 'image1')->croppable(16 / 9)->resize(800)->disk('public')->path('item_image_1')->onlyOnForms(),

            Avatar::make(__('Image2'), 'image2')->onlyOnDetail(),
            AdvancedImage::make(__('Image2'), 'image2')->croppable(16 / 9)->resize(800)->disk('public')->path('item_image_2')->onlyOnForms(),

            Avatar::make(__('Image3'), 'image3')->onlyOnDetail(),
            AdvancedImage::make(__('Image3'), 'image3')->croppable(16 / 9)->resize(800)->disk('public')->path('item_image_2')->onlyOnForms(),

            Avatar::make(__('Image4'), 'image4')->onlyOnDetail(),
            AdvancedImage::make(__('Image4'), 'image4')->croppable(16 / 9)->resize(800)->disk('public')->path('item_image_2')->onlyOnForms(),

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
