<?php

namespace App\View\Components;

use App\Models\Novedad;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NovedadForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $action,
        protected ?Novedad $novedad = null,

    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.novedad-form',[
            'action' => $this->action,
            'novedad' => $this->novedad,
            'editando' => $this->novedad !== null,
        ]);
    }
}
