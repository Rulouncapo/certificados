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

    if (isset($_POST["dni"])) {      
        $geteado = $_POST["dni"];
        $con = new Conexion();
        $resultado = $con->query("SELECT * FROM `alumno` WHERE dni=$geteado");
        while($fila = mysqli_fetch_assoc($resultado)){
            $dni = $fila["dni"];
            if ($dni) {
                $dni = str_split($dni);
                $dni=($dni[0].$dni[1].".".$dni[2].$dni[3].$dni[4].".".$dni[5].$dni[6].$dni[7]);
                
            }
            $nombre = $fila["nombre"];
            $nombre = strtoupper($nombre); 
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
            $grado = $fila["grado"];
            $division = $fila["division"];
            $titulo = $fila["titulo"];
        }   
        if (isset($_POST["resolucion"])) {
            $resolucion = $_POST["resolucion"];
        }else{
            $resolucion = "302/12";
        }
    }   

    $this->SetFont('Arial','U',14);
    $this->Cell(10);
    $this->Ln(1);
    $this->Cell(45);
    $this->SetXY(40,50);
    $this->Cell(0,0, utf8_decode($title));
    $this->Ln(15);
    $this->SetFont('Arial','',12);  
    $this->SetX(65);
    $this->Ln(1);//<b>Calle</b>
    $this->WriteHTML(utf8_decode("           La Dirección de la Escuela de Educación Secundaria Técnica N° 1 Raúl Scalabrini Ortiz de Santa Teresita, Partido de la Costa, deja constancia que <b>$nombre</b> con DNI N° $dni tiene en trámite un certificado de estudios COMPLETO, hasta 7º año (o bien 7 años) del Ciclo Superior, de la especialidad en  <b>$titulo</b> Resol. Nº $resolucion")) ;
   if (isset($_POST["promedio"])) {
        $promedio = $_POST["promedio"];
        $this->Ln(10); 
        $this->WriteHTML(utf8_decode("                        $promedio")) ;
    }
   
    $this->Ln(10);
    $this->WriteHTML(utf8_decode("                        Se extiende a pedido del/la interesado/a en Santa Teresita a los ".$dia." días del mes de ".$mes." de ".$anio.", para ser presentado ante las autoridades que correspondan.   ")) ;
    $this->Ln(5);
    $this->SetFont('Arial','',14);
    $this->SetXY(40,230); 
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
$title = 'CONSTANCIA DE ANALÍTICO COMPLETO EN TRÁMITE';
$pdf->Body($title);
$pdf->SetTitle($title);
$pdf->Output();
?>


