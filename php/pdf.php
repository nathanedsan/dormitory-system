<?php
session_start();
$username = $_SESSION["Username"];
if (isset($_SESSION["loggedinStd"]) == null) {
    unset($_GET["confirm"]);
    header("location:index.php");
    exit;
}

// 引入 TCPDF 函式庫
require('../TCPDF/tcpdf.php');

// 創建 TCPDF 物件
$pdf = new TCPDF();

// 設定 PDF 文件的屬性
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('PDF Generation with TCPDF');
$pdf->SetSubject('Generating PDF using TCPDF');
$pdf->SetKeywords('TCPDF, PDF, generation, PHP');

// 添加一個新頁面
$pdf->AddPage();

// 在 PDF 中添加內容

$pdf->SetFont('msungstdlight', '', 14);
$pdf->Cell(0, 10, '宿舍繳費單', 0, 1, 'C');

$pdf->SetFont('msungstdlight', 'B', 14);
$pdf->MultiCell(0, 10, '繳費注意事項:', 0, 'J');

$pdf->SetFont('msungstdlight', '', 14);
$pdf->MultiCell(0, 10, '一、請於繳費截止日前完成繳費，並請確認繳費項目及金額。請參閱學雜費收費標準 https://daa.nuk.edu.tw/p/404-1005-4858.php?Lang=zh-tw', 0, 'J');
$pdf->MultiCell(0, 10, '二、住宿期間請遵守宿舍管理辦法、住宿公約等相關規定，擅自留宿外客及異性留宿者，依本校學生宿舍管理辦法，勒令退宿。', 0, 'J');
$pdf->MultiCell(0, 10, '三、為維護住宿生健康及安全，禁止非住宿生進入宿舍。', 0, 'J');
$pdf->MultiCell(0, 10, '四、兼顧防疫及安全考量，必要時，依本校管理辦法第17條之規定予以彈性調整寢室與床位。', 0, 'J');
$pdf->MultiCell(0, 10, '五、若欲申請退宿，可從宿舍管理系統進行申請', 0, 'J');
$pdf->MultiCell(0, 10, '六、相關業務洽詢電話：學務處生輔組-5919597', 0, 'J');

$barcodeText = '9500'; // 文本
$barcodeType = 'C39'; // 類型
$barcodeWidth = 100; // 寬度
$barcodeHeight = 10; // 高度
$style = array('position' => '', 'align' => 'C', 'stretch' => false, 'fitwidth' => true, 'cellfitalign' => '', 'border' => true, 'hpadding' => 'auto', 'vpadding' => 'auto', 'fgcolor' => array(0,0,0), 'bgcolor' => false, 'text' => true, 'font' => 'helvetica', 'fontsize' => 8, 'stretchtext' => 4);

$pdf->writeHTML('<h1>Barcode Example</h1>');


$pdf->write1DBarcode($barcodeText, $barcodeType, '', '', '', $barcodeWidth, $barcodeHeight, $style, 'N');

$textHeight = $pdf->GetY();





// 輸出 PDF
$pdf->Output('generated.pdf', 'D');
