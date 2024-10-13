<?php
namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function generatePDF()
    {
        $users = User::all();
        $pdf = Pdf::loadView('reports.users', compact('users'));
        return $pdf->download('informe_usuarios.pdf');
    }
}
