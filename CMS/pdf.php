<?php
// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
$connect = mysqli_connect("localhost", "root", "", "cms");
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 

// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
//$id=$_POST['id'];
$print="SELECT `message` FROM `cms_posts` WHERE id=16";
$a1=mysqli_query($connect, $print);
//echo $print;
//$print1= echo $print; 
// Load content from html file 
$html = file_get_contents("$a1"); 
$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("codexworld", array("Attachment" => 0));