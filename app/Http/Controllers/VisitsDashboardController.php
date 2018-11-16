<?php

namespace App\Http\Controllers;

use App\VisitUniqVisits;
use App\VisitUniq;
use App\VisitsTotal;

use Illuminate\Http\Request;

class VisitsDashboardController extends Controller
{
    public static function views()
    {
        try {
            if(!\Request::is(['admin/*','login'])) { // Não executa o código nas páginas citadas

                /*
                *********************************
                * Sistema de Visitantes
                *********************************
                */

                // Adiciona uma Visita no site
                $verificaVisitas = VisitsTotal::where('id', 1)->count(); // Verifica se existe um ID 1 dentro da tabela visits_totals

                if($verificaVisitas == 0){
                    // Adiciona ID 1 no Banco de Dados para o funcionamento do sistema de Visitas.
                    $AddIdVisitas = new VisitsTotal;
                    $AddIdVisitas->id = 1;
                    $AddIdVisitas->views = 0;
                    $AddIdVisitas->save();
                }   

                // Adiciona views nas Visitas
                $UpdateVisitas = VisitsTotal::find(1);
                $UpdateVisitas->views = ++$UpdateVisitas->views;
                $UpdateVisitas->save();

                /*
                *********************************
                * Sistema de Visitantes Únicos 
                *********************************
                */

                $ip = \Request::ip(); // Pega IP do Usuário
                $verificaVisits = VisitUniq::where('ip', $ip)->get(); // Verifica por IP para deletar do Banco de Dados a cada 24 Horas.
                $visitas = VisitUniq::where('ip', $ip)->count(); // Verifica no Banco de Dados o IP acessado 

                $verifyVisitUniqVisits = VisitUniqVisits::where('id', 1)->count(); // Verifica se existe um ID 1 dentro da tabela visit_uniq_visits

                if($visitas == 0){ // Verifica se existe o IP do usuário que está acessando, já consta no Banco de Dados
                    if($verifyVisitUniqVisits == 0){ // Se for igual á 0, e porque não existe, então ele cria.
                        // Adicionar ID 1 no Banco de dados para o funcionamento do sistema de Views Únicas.
                        $AddIdVisitsUniq = new VisitUniqVisits;
                        $AddIdVisitsUniq->id = 1;
                        $AddIdVisitsUniq->views = 0;
                        $AddIdVisitsUniq->save();
                    }

                    // Adiciona IP em ViewsUniq
                    $addUniqViews = new VisitUniq;
                    $addUniqViews->ip = $ip;
                    $addUniqViews->created_at = time();
                    $addUniqViews->save();

                    // Update ViewsUniq
                    $UpdateViewsUniq = VisitUniqVisits::find(1);
                    $UpdateViewsUniq->views = ++$UpdateViewsUniq->views;
                    $UpdateViewsUniq->save();
                } else {
                    foreach($verificaVisits as $visit) { // Entra no foreach, caso o IP seja igual ao que esta no Banco de Dados
                        if(time() - $visit->created_at > 60*60*24) { // Verifica se já passou 24 horas do acesso e deleta do Banco de Dados
                            // Deleta do banco de dados
                            $deleteUniqView = VisitUniq::find($visit->id);
                            $deleteUniqView->delete();
                        }
                    }
                }
            } // Fim do if
        } catch (\Exception $e) {
            return [];
        }
    }
}
