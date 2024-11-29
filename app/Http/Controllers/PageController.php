<?php

namespace App\Http\Controllers;

use App\Services\BreadcrumbService;

class PageController extends Controller
{
    protected $breadcrumbService;

    public function __construct(BreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }

    public function about()
    {
        $this->breadcrumbService->add('Về Chúng Tôi');
        return view('pages.about');
    }

    public function policy()
    {
        $this->breadcrumbService->add('Chính sách');
        return view('pages.policy');
    }
}
