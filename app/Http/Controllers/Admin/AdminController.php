<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $statisticsController;

    public function __construct(StatisticsController $statisticsController)
    {
        $this->statisticsController = $statisticsController;
    }

    public function dashboard()
    {
        $statistics = $this->statisticsController->getAdminStatistics();
        return view('pages.admin.dashboard', compact('statistics'));
    }
}