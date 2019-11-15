<?php declare(strict_types=1);

namespace PosLifestyle\TextFilter;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class TextFilter extends Filter
{
    /**
     * @var string
     */
    public $component = 'text-filter';

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    protected $column;

    public function __construct(string $name, string $column)
    {
        $this->name = $name;
        $this->column = $column;
    }

    /**
     * @param Request $request
     * @param Builder $query
     * @param mixed   $value
     *
     * @return Builder
     */
    public function apply(Request $request, $query, $value)
    {
        $query->where($this->column, trim($value));

        return $query;
    }

    public function options(Request $request): array
    {
        return [];
    }

    public function key(): string
    {
        return parent::key() . '_' . $this->column;
    }
}
