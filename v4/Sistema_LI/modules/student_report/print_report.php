<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../security.php';
include_once '../conexion.php';
require_once('../tcpdf/tcpdf.php');

// Consulta SQL
$sql = "SELECT students.user, students.name as Nombre, students.surnames as Apellido, students.sede as Sede, careers.name as Carrera, department.name as Departamento, students.documentation as Estado, 
(SELECT COUNT(*) FROM infoq WHERE infoq.user = students.user AND infoq.doc_type = 'Primer Informe Quincenal') as Quincenal_1,
(SELECT COUNT(*) FROM infoq WHERE infoq.user = students.user AND infoq.doc_type = 'Segundo Informe Quincenal') as Quincenal_2,
(SELECT COUNT(*) FROM infoq WHERE infoq.user = students.user AND infoq.doc_type = 'Tercer Informe Quincenal') as Quincenal_3,
(SELECT COUNT(*) FROM infoq WHERE infoq.user = students.user) as Info_Quin_Total,
(SELECT COUNT(*) FROM send_one WHERE send_one.user = students.user) as Envio_1,
(SELECT COUNT(*) FROM send_two WHERE send_two.user = students.user) as Envio_2
FROM students 
INNER JOIN careers ON students.career = careers.career 
INNER JOIN department ON students.departamento = department.id_department ORDER by Estado";

// Ejecutar la consulta
$resultado = $conexion->query($sql);

// Inicializar TCPDF
$pdf = new TCPDF('L', 'mm', 'A3', true, 'UTF-8', false);

// Establecer márgenes
$pdf->SetMargins(10, 10, 10);

// Agregar página
$pdf->AddPage();

// Definir el contenido del encabezado general
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 10, 'Levantamiento de Información', 0, 1, 'C');
$date = date('Y-m-d'); // Obtener la fecha actual
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, 'Fecha del reporte: ' . $date, 0, 1, 'C');

// Encabezado de la tabla
$pdf->SetFont('helvetica', 'B', 6);
$pdf->SetFillColor(200, 200, 200); // Color de fondo
$cellWidth = 20;
$cellHeight = 10;
$cellBorder = 1;
$cellAlign = 'C';

$headerCells = [
    ['Usuario', $cellWidth],
    ['Nombre', $cellWidth * 2],
    ['Apellido', $cellWidth * 2],
    ['Sede', $cellWidth],
    ['Carrera', $cellWidth * 3],
    ['Departamento', $cellWidth * 3.5],
    ['Estado', $cellWidth * 1.5],
    ['Quincenal 1', $cellWidth],
    ['Quincenal 2', $cellWidth],
    ['Quincenal 3', $cellWidth],
    ['Total Quincenal', $cellWidth * 1.5],
    ['Envio 1', $cellWidth * 0.75],
    ['Envio 2', $cellWidth * 0.75],
];

foreach ($headerCells as $cell) {
    $pdf->Cell($cell[1], $cellHeight, $cell[0], $cellBorder, 0, $cellAlign, true);
}

$pdf->Ln(); // Salto de línea

// Contenido de la consulta
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell($headerCells[0][1], $cellHeight, $fila['user'], $cellBorder, 0, $cellAlign);
        $pdf->Cell($headerCells[1][1], $cellHeight, $fila['Nombre'], $cellBorder, 0, $cellAlign);
        $pdf->Cell($headerCells[2][1], $cellHeight, $fila['Apellido'], $cellBorder, 0, $cellAlign);
        $pdf->Cell($headerCells[3][1], $cellHeight, $fila['Sede'], $cellBorder, 0, $cellAlign);
        $pdf->Cell($headerCells[4][1], $cellHeight, $fila['Carrera'], $cellBorder, 0, $cellAlign);
        $pdf->Cell($headerCells[5][1], $cellHeight, $fila['Departamento'], $cellBorder, 0, $cellAlign);
        $pdf->Cell($headerCells[6][1], $cellHeight, $fila['Estado'], $cellBorder, 0, $cellAlign);
        $pdf->Cell($headerCells[7][1], $cellHeight, $fila['Quincenal_1'], $cellBorder, 0, $cellAlign);
        $pdf->Cell($headerCells[8][1], $cellHeight, $fila['Quincenal_2'], $cellBorder, 0, $cellAlign);
        $pdf->Cell($headerCells[9][1], $cellHeight, $fila['Quincenal_3'], $cellBorder, 0, $cellAlign);
        $pdf->Cell($headerCells[10][1], $cellHeight, $fila['Info_Quin_Total'], $cellBorder, 0, $cellAlign);
        $pdf->Cell($headerCells[11][1], $cellHeight, $fila['Envio_1'], $cellBorder, 0, $cellAlign);
        $pdf->Cell($headerCells[12][1], $cellHeight, $fila['Envio_2'], $cellBorder, 1, $cellAlign);
    }
} else {
    $pdf->Cell(210, 10, 'No se encontraron resultados', 1, 1, 'C');
}

// Cerrar la conexión
$conexion->close();

// Salida del PDF
$pdf->Output('list_report.pdf', 'I');
?>
