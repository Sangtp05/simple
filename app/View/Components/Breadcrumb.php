<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\BreadcrumbService;

class Breadcrumb extends Component
{
    public array $breadcrumbs;

    public function __construct(BreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbs = $breadcrumbService->getBreadcrumbs();
    }

    public function render()
    {
        return view('components.breadcrumb');
    }
}
