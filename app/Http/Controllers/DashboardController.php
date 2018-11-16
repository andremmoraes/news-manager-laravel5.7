<?php

namespace App\Http\Controllers;

use App\NewsList;
use App\VisitUniqVisits;
use App\VisitsTotal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Conta total de notícias cadastrado
        $totalNews = NewsList::count();

        // Lista noticias por data
        $listNews = NewsList::orderBy('created_at', 'DESC')->simplePaginate(5);

        // Conta total de Visualizações Únicas no site
        $countViewsUniq = VisitUniqVisits::first();

        // Conta total de Visualizações no site
        $countViews = VisitsTotal::first();

        // Conta total de Visualizações em notícias
        $viewsNews = NewsList::sum('views');

        return view('auth.admin.dashboard.dashboard', compact(['totalNews','listNews','countViewsUniq','countViews','viewsNews']));
    }
}
