<?php

namespace Pvtl\VoyagerPortfolio;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use TCG\Voyager\Traits\HasRelationships;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class PortfolioCategories extends Model
{

    use Translatable,
    HasRelationships;

    protected $table = 'portfolio_categories';

    protected $translatable = ['name', 'slug'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'order'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

    public function portfolioId()
    {
        return $this->hasMany('Pvtl\VoyagerPortfolio\Portfolio')
            ->published()
            ->orderBy('created_at', 'DESC');
    }
}
