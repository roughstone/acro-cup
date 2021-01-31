<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CompetitionExport implements FromView
{

    public function __construct($competition)
    {
        $this->competition = $competition;
    }

    public function view(): View
    {
        return view('admin.exports.competition', [
            'competition' => $this->competition
        ]);
    }
}
