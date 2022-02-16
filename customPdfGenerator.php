<?php
class CustomPdfGenerator extends TCPDF 
{
    public function Header() 
    {
        $image_file = 'icsiiip_logo.png';
        $this->Image($image_file, 15, 10, 180, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->SetFont('helvetica', 'B', 20);
        $this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln();
        // $this->Cell(0, 15, 'Katie A Falk', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    }
 
    public function Footer() 
    {
        $this->SetY(-30);
        $this->SetFont('helvetica', 'I', 8);
        $this->SetTextColor(0,0,256);
        $this->writeHTML("<hr>");
        $this->writeHTML("Corporate Office: - ICSI House, C - 36, Third Floor, Sector - 62, Noida - 201 309", true, false, false, false, 'C');
        $this->writeHTML("Tel: 0120 408 2142/ 2159 Email: info@icsiiip.in Website: www.icsiiip.in", true, false, false, false, 'C');
        
    }
 
    public function printTable($header, $data)
    {
        $this->SetFillColor(150, 150, 150);
        $this->SetTextColor(0);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B', 6);
 
        $w = array(8, 60, 10, 10, 10, 10, 13, 20, 20, 15, 15, 10);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
 
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
 
        // table data
        $fill = 0;
        $total = 0;
 
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row[0], 1, 0, 'C', $fill);
            $this->Cell($w[1], 6, $row[1], 1, 0, 'L', $fill);
            $this->Cell($w[2], 6, $row[2], 1, 0, 'C', $fill);
            $this->Cell($w[3], 6, $row[3], 1, 0, 'L', $fill);
            $this->Cell($w[4], 6, $row[4], 1, 0, 'L', $fill);
            $this->Cell($w[5], 6, $row[5], 1, 0, 'L', $fill);
            $this->Cell($w[6], 6, $row[6], 1, 0, 'L', $fill);
            $this->Cell($w[7], 6, $row[7], 1, 0, 'L', $fill);
            $this->Cell($w[8], 6, $row[8], 1, 0, 'L', $fill);
            $this->Cell($w[9], 6, $row[9], 1, 0, 'L', $fill);
            $this->Ln();
            $fill=!$fill;
            $total+=$row[3];
        }
 
    }
}