<?php 

$doc = new DOMDocument('1.0');
$doc->formatOutput = true;


$data=$_POST['html'];
echo $data; 

$doc->loadHTML("<html>\n<body>\n$data\n</body>\n</html>");


$fileName=$_POST['target'].".html";
echo 'Wrote: ' . $doc->saveHTMLFile($fileName). ' bytes'; // Wrote: 129 bytes


	
?>