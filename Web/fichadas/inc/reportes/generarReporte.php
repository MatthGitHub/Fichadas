<?php

// ini_set('display_errors', '1');
// ini_set('error_reporting', E_ALL);

define('FPDF_FONTPATH', 'font/');
require('mysql_table.php');
include('../config.php');
$tipo = $_GET['tipo'];


// --------- Reportes de usuarios --------------
if($tipo == 'misfi'){
  class PDF extends PDF_MySQL_Table{
      function Header()
      {
          // Titulo
          $this->SetFont('Arial', '', 18);
          $this->Cell(0, 6, 'Reporte de Usuarios', 0, 1, 'C');
          $this->Ln(10);
          // Asegurar la header de la tabla en el outpu
          parent::Header();
      }
  }

  $pdf=new PDF();
  $pdf->AddPage();
  //Primera tabla.
  $pdf->Table($conn,"SELECT * FROM fichada WHERE idEmpleado = 113 AND fecha > '2017-01-02'");
  ob_start();
  $pdf->Output();
}
//--------- Reportes de ingresos ---------------------
if($tipo == 'ingresos'){
  class PDF extends PDF_MySQL_Table{
      function Header()
      {
          // Titulo
          $this->SetFont('Arial', '', 18);
          $this->Cell(0, 6, 'Reporte de Ingresos', 0, 1, 'C');
          $this->Ln(10);
          // Asegurar la header de la tabla en el outpu
          parent::Header();
      }
  }

  $pdf=new PDF();
  $pdf->AddPage();
  //Primera tabla.
  $pdf->Table('SELECT * FROM ingreso');
  ob_start();
  $pdf->Output();
}

//--------- Reportes de egresos ---------------------
if($tipo == 'egresos'){
  class PDF extends PDF_MySQL_Table{
      function Header()
      {
          // Titulo
          $this->SetFont('Arial', '', 18);
          $this->Cell(0, 6, 'Reporte de Egresos', 0, 1, 'C');
          $this->Ln(10);
          // Asegurar la header de la tabla en el outpu
          parent::Header();
      }
  }

  $pdf=new PDF();
  $pdf->AddPage();
  //Primera tabla.
  $pdf->Table('SELECT * FROM egreso');
  ob_start();
  $pdf->Output();
}

//--------- Reportes de Ventas ---------------------
if($tipo == 'ventas'){
  class PDF extends PDF_MySQL_Table{
      function Header()
      {
          // Titulo
          $this->SetFont('Arial', '', 18);
          $this->Cell(0, 6, 'Reporte de Ventas', 0, 1, 'C');
          $this->Ln(10);
          // Asegurar la header de la tabla en el outpu
          parent::Header();
      }
  }

  $pdf=new PDF();
  $pdf->AddPage();
  //Primera tabla.
  $pdf->Table('SELECT * FROM ingreso WHERE idTipoComprobante = 1');
  ob_start();
  $pdf->Output();
}

//--------- Reportes de proveedores ---------------------
if($tipo == 'proveedores'){
  class PDF extends PDF_MySQL_Table{
      function Header()
      {
          // Titulo
          $this->SetFont('Arial', '', 18);
          $this->Cell(0, 6, 'Reporte de Proveedores', 0, 1, 'C');
          $this->Ln(10);
          // Asegurar la header de la tabla en el outpu
          parent::Header();
      }
  }

  $pdf=new PDF();
  $pdf->AddPage();
  //Primera tabla.
  $pdf->Table('SELECT * FROM proveedores');
  ob_start();
  $pdf->Output();
}

//--------- Reportes de clientes ---------------------
if($tipo == 'clientes'){
  class PDF extends PDF_MySQL_Table{
      function Header()
      {
          // Titulo
          $this->SetFont('Arial', '', 18);
          $this->Cell(0, 6, 'Reporte de Clientes', 0, 1, 'C');
          $this->Ln(10);
          // Asegurar la header de la tabla en el outpu
          parent::Header();
      }
  }

  $pdf=new PDF();
  $pdf->AddPage();
  //Primera tabla.
  $pdf->Table('SELECT * FROM clientes');
  ob_start();
  $pdf->Output();
}

//--------- Reportes de stock ---------------------
if($tipo == 'productos'){
  class PDF extends PDF_MySQL_Table{
      function Header()
      {
          // Titulo
          $this->SetFont('Arial', '', 18);
          $this->Cell(0, 6, 'Reporte de Stock', 0, 1, 'C');
          $this->Ln(10);
          // Asegurar la header de la tabla en el outpu
          parent::Header();
      }
  }

  $pdf=new PDF();
  $pdf->AddPage();
  //Primera tabla.
  $pdf->Table('SELECT * FROM productos');
  ob_start();
  $pdf->Output();
}
?>
