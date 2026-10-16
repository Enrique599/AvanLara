<?php

namespace App\Http\Controllers;

use App\Models\Cliente;

require_once app_path('Libraries/fpdf.php');

class ReportePdfController extends Controller
{
    public function index()
    {
        return view('htmla.reportepdf');
    }

    public function clientes()
    {
        $clientes = Cliente::orderBy('Id_cliente')->get();
        $t = fn (string $s) => iconv('UTF-8', 'windows-1252//TRANSLIT//IGNORE', $s);

        $pdf = new class extends \FPDF {
            public string $fechaGen = '';
            public $conv;
            function Header()
            {
                $this->SetFont('Arial', 'B', 16);
                $this->Cell(0, 10, ($this->conv)('Reporte de Clientes - DAV'), 0, 1, 'C');
                $this->SetFont('Arial', '', 9);
                $this->Cell(0, 6, 'Generado: ' . $this->fechaGen, 0, 1, 'C');
                $this->Ln(4);
                $this->SetFont('Arial', 'B', 10);
                $this->SetFillColor(79, 142, 247);
                $this->SetTextColor(255);
                foreach ([[15, 'ID'], [50, 'Nombre'], [30, 'Telefono'], [75, 'Direccion'], [20, 'CP']] as [$w, $h]) {
                    $this->Cell($w, 8, $h, 1, 0, 'C', true);
                }
                $this->Ln();
                $this->SetTextColor(0);
            }
            function Footer()
            {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        };
        $pdf->conv = $t;
        $pdf->fechaGen = now()->format('d/m/Y H:i:s');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 9);

        foreach ($clientes as $c) {
            $pdf->Cell(15, 7, $c->Id_cliente, 1, 0, 'C');
            $pdf->Cell(50, 7, $t(mb_strimwidth($c->Nombre . ' ' . $c->Ap_paterno, 0, 28, '...')), 1);
            $pdf->Cell(30, 7, $t($c->Telefono), 1);
            $pdf->Cell(75, 7, $t(mb_strimwidth($c->Direccion, 0, 45, '...')), 1);
            $pdf->Cell(20, 7, $t($c->CP), 1, 1, 'C');
        }

        $pdf->Ln(4);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 8, 'Total de clientes: ' . $clientes->count(), 0, 1);

        return response($pdf->Output('S'), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="reporte_clientes_' . now()->format('Y-m-d') . '.pdf"',
        ]);
    }
}
