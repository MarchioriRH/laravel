<?php
namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Generate a PDF report of all users.
     *
     * This method retrieves all users from the database, loads a view to format the data,
     * and generates a PDF file for download.
     *
     * @return \Illuminate\Http\Response The generated PDF file for download.
     */
    public function generatePDF(Request $request, $users)
    {
        // Convertir los IDs de los usuarios en un array
        $userIds = explode(',', $users);
        // Obtener los usuarios por sus IDs
        $users = User::whereIn('id', $userIds)->get();
        $pdf = Pdf::loadView('reports.users', compact('users'));
        //return $pdf->download('informe_usuarios.pdf'); // direct download
        return $pdf->stream(); // view in browser
    }
}
