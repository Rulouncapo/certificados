<?php
require('../writehtml.php');
class Conexion extends Mysqli{
    function __construct(){
        parent::__construct('localhost','root','','certificados');
        $this->set_charset('utf8');
            $this->connect_error == NULL ? 'Conexión exitosa' : die('Error al conectarse');
    }
} 
 
class PDF extends PDF_HTML
{
function Header()
{   
    $this->Ln(1);
    $this->Image('../img/logo.png',15,0,26);
    $this->SetFont('Arial','',9);
    $this->cell(22);
    $this->MultiCell(100,6,utf8_decode('DIRECCION GENERAL DE CULTURA Y EDUCACION  DIRECCION DE EDUCACION TECNICA  '),0,'C');
        $this->cell(52);
        $this->SetFont('Arial','B',9);
        $this->cell(80,6, utf8_decode("E.E.S.T Nº1 - LA COSTA"));
    $this->Image('../img/logoeest.png',160,2,30);
    $this->Line(10,34,196,34);
}
function Body($title)
{
    if (isset($_POST['dni'])) {      
            $dni = $_POST["dni"];
            $nombre = $_POST["nombre"];
            $nombre = strtoupper($nombre); 
            $grado = $_POST["curso"];
            $division = $_POST["division"];
            $dia = date("j");
            $mes =date("F");
            $anio =date("Y");
            switch ($mes) {
                case 'January':
                   $mes = "Enero";
                    break;
                case 'February':
                   $mes = "Febrero";
                    break;
                case 'March':
                   $mes = "Marzo";
                    break;
                case 'April':
                   $mes = "Abril";
                    break;
                case 'May':
                   $mes = "Mayo";
                    break;
                case 'June':
                   $mes = "Junio";
                    break;
                case 'July':
                   $mes = "Julio";
                    break;
                case 'August':
                   $mes = "Agosto";
                    break;
                case 'September':
                   $mes = "Septiembre";
                    break;
                case 'October':
                   $mes = "Octubre";
                    break;
                case 'November':
                   $mes = "Noviembre";
                    break;
                case 'December':
                   $mes = "Diciembre";
                    break;
                
                default:
                    # code...
                    break;
            };
    }   
    $this->SetFont('Arial','BU',14);
    $this->Cell(10);
    $this->Ln(1);
    $this->Cell(45);
    $this->SetXY(70,50);
    $this->Cell(0,0, utf8_decode($title));
    $this->Ln(25);
    $this->SetFont('Arial','',12);  
    $this->SetX(26);
    $this->Ln(1);//<b>Calle</b>
    $this->WriteHTML(utf8_decode("La Dirección de la E.E.S.T. Nº1 Raúl Scalabrini Ortíz de la localidad de Santa Teresita Provincia de Buenos Aires hace constar que existe vacante para ".$grado."° año, división ".$division." para la alumno/a ".$nombre." <b>DNI ".$dni."</b> solicitando el pase del mismo hacia este establecimiento.")) ;
    $this->Ln(10);
    $this->WriteHTML(utf8_decode("Se extiende el presente en la ciudad de Santa Teresita, a los ".$dia." días del mes ".$mes." de ".$anio.", al solo efecto de ser presentada ante las autoridades que correspondan.- ")) ;
    $this->Ln(5);
    $this->SetFont('Arial','',14);
    $this->SetXY(40,230); 
    //$this->Image('../img/sello.png',45,180,46);
    if (isset($_POST["check"])) {
        $this->Image('../img/sello.png',45,160,46);
        $this->Image('../img/firma.png',135,180,46);

    }
    $this->SetFont('Arial','',14); 
    $this->Cell(0,0,"Sello del establecimiento");
    $this->SetXY(120,230); 
    $this->Cell(0,0,"Firma y sello de la autoridad");

}

function Footer()
{
    $this->Line(10,270,200,270);    
    $this->SetFont('Arial','B',9);
    $this->SetXY(0,274);
    $this->MultiCell(200,5,utf8_decode("CALLE 104 N° 1440 - SANTA TERESITA\n (7107)\n PARTIDO DE LA COSTA\n     TEL/FAX 02246 - 423529  420535 "),0,"C");
}
}   
$pdf = new PDF('P','mm','A4');
$pdf->AddFont('Calibri','','Calibri.php');
// $pdf->AddFont('Calibrib','','Calibrib.php');

$pdf->SetMargins(30, 7.175, 30);
$pdf->AddPage();
$title = 'CONSTANCIA DE VACANTE';
$pdf->Body($title);
$pdf->SetTitle($title);
$pdf->Output();
?>


