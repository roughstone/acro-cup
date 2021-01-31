<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Team;
use App\Exports\CompetitionExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller
{
    /**
     * Export DB records to excel
     *
     * @return \Maatwebsite\Excel\Facades\Excel
     */
    public function export($table, $id, $order)
    {
        if ($table == "competition") {
            $competition = Competition::where('id', $id)->first();
            $teams = Team::where('competition_id', $id)->orderBy($order, 'desc')->get();
            $competition->teams = $teams;
            for ($i=0; $i < count($competition->teams); $i++) {
                $competition->teams[$i]->user = $competition->teams[$i]->user;
                $competition->teams[$i]->competitors = $competition->teams[$i]->competitors;
            }

            /* return view('admin.exports.competition', ['competition' => $competition]); */

            return Excel::download(new CompetitionExport($competition), 'competition.xlsx');
        }
    }
}
