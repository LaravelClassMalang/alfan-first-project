<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExamExport;

class Export extends Controller
{
    public function exportXLS() 
    {
        return Excel::download(new ExamExport, 'users.xlsx');
        echo 'Download has begun!';
    }

    public function exportPDF() 
    {
        // 
    }
}
