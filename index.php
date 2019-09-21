<?php

	require 'vendor/autoload.php';
	use KubAT\PhpSimple\HtmlDomParser;
	function getWord(){
		$url = "http://www.rususa.com/dictionary/random.asp";

		$dom = HtmlDomParser::file_get_html( $url );
		$div = $dom->find('.randomResults',0);
		$b = $div->find('b',0);
		$eng = $b->outertext;
		$ru = $div->find("#divTranslation",0)->plaintext;
		return array("ru"=>$ru,"eng"=>$eng);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>10 random words</title>
</head>
<body>
	<style type="text/css">
		table tr td{
			border: 1px solid #f0f0f0;
			padding: 10px;
		}
	</style>
	<table>
		<?php
			for($i = 0; $i<10; $i++){
				$res = getWord();
				echo "<tr>";
					echo "<td>".$res['eng']."</td>";
					echo "<td>".$res['ru']."</td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>