<?php session_start();
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

class MYPDF extends TCPDF {


    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'hondalogo.jpg';
        $this->Image($image_file, 15, 10, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
        // Set font
        $this->SetFont('cordiaupc', 'B', 22);
        $this->writeHTMLCell(100,10,100,12,'<font size="18">Honda Anticipate</font>');
        $this->writeHTMLCell(100,10,88,19,'<font size="18">คาดการณ์การใช้บริการครั้งต่อไป</font>');
        $this->writeHTMLCell(190,7,10,33,'<hr/>');
  //       $this->writeHTMLCell(100,10,15,35,'<font size="18">เลขทะเบียน</font>');
		// $this->writeHTMLCell(100,10,15,42,'<font size="18">ระยะทาง</font>');
		// $this->writeHTMLCell(300,10,15,49,'<font size="18">ตรวจเช็คสภาพครั้งต่อไป </font>');
		// $this->writeHTMLCell(300,10,15,56,'<font size="18">อีกประมาณ </font>');
  //       $this->writeHTMLCell(300,10,15,63,'<font  size="18">ค่าใช้จ่ายล่วงหน้า </font>');

		$year = date('Y')+543;
		$this->writeHTMLCell(300,10,175,3,'<font size="10"> วันที่ : '.date('d').'/'.date('m').'/'.$year.'</font>');
        // Title
        //$this->Cell(0, 20, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('cordiaupc', 'B', 15);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('cordiaupc', 'B', 15);

include ("../connect.php");
require ("../function/function.php");
// add a page
$pdf->AddPage();

$sql = "SELECT * FROM checkcar WHERE registration='$registration' ORDER BY registration DESC LIMIT 1";
    $qr = $conn->prepare($sql);
    $qr->execute();
    $qr->bind_result($date_, $mile_late,$registration,$ck,$countday);

    $html = '<br><br>เลขทะเบียน : '.$registration.' <br>ระยะทางปัจจุบัน : '.($_SESSION['mile']-10000).' กิโล <br>
ตรวจเช็คสภาพครั้งต่อไป : '.$_SESSION['DateDiffP'] .'อีกประมาณ : '.$_SESSION['countdate'].' วัน <br>
<br>ค่าใช้จ่ายล่วงหน้า จำนวน '.$sum.' รายการ ราคา '.$mony.' บาท<br>';

    $html .= '<table cellspacing="0" cellpadding="5" border="1" width="650">
            <tr>
                <td width="50" align="center" height="30"><font size="+3">ลำดับ</font></td>
                <td width="300" align="center" height="30"><font size="+3">รายละเอียด</font></td>
                
                <td width="100" align="center"><font size="+3">ราคา</font></td>
              
                <td width="50" align="center"><font size="+3">หน่วย</font></td> 
               
            </tr>
            ';

//     $i = 0;
//     while ($qr->fetch()) {
//           $ar[$i]= $ck;
//       $i++;

//       if($bg == "#FFFF99") { //ส่วนของการ สลับสี 
// $bg = "#FFFFCC";
//  } else {
//  $bg = "#FFFF99";
//  }
//       $html.= '<tr>
//         <td>'.$i.'</td>
//          <td>'.$date_.'</td>
//           <td>'.$mile_late.'</td>
        
//         </tr>';

// }$_SESSION['mile']%20000==1
        if ($_SESSION['mile']%20000==1){
              $html.=    '<tr>
         <td>1</td><td>น้ำมันเครือง</td><td align="center">1000</td><td>บาท</td>
         </tr>
         <tr>
         <td>2</td><td>น็อตแหวนนำ้มันเครือง</td><td align="center">120</td><td>บาท</td>
         </tr>';
            if($_SESSION['mile']%30000==0){
             $html.=    '<tr>
                <td>3</td><td>กรองอากาศ</td><td align="center">520</td><td>บาท</td>
                </tr>';
             } 
        } else {

            $html.=    '<tr>
         <td>1</td><td>น้ำมันเครือง</td><td align="center">1000</td><td>บาท</td>
         </tr>
         <tr>
         <td>2</td><td>น็อตแหวนนำ้มันเครือง</td><td align="center">120</td><td>บาท</td>
         </tr>';
          if($_SESSION['mile']%60000==0){
             $html.=    '<tr>
                <td>3</td><td>น้ำมันเบรก</td><td align="center">180</td><td>บาท</td>
                </tr><tr>
                <td>4</td><td>น้ำมันเกีย</td><td align="center">170</td><td>บาท</td>
                </tr>';
             } 
            if($_SESSION['mile']%80000==0){
             $html.=    '<tr>
                <td>3</td><td>กรองน้ำมันเชื้อเพลิง</td><td align="center">320</td><td>บาท</td>
                </tr><tr>';
             } 
        }


$html .= '</table>';
$html .= "*หมายเหตุ ราคาอาจเปลี่ยนแปลงได้ ราคานี้ยังไม่รวมค่าแรง";
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// reset pointer to the last page
$pdf->lastPage();


//Close and output PDF document
$pdf->Output('report.pdf', 'FI');

//============================================================+
// END OF FILE                                                
//============================================================+