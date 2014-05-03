<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Layanan Web</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />
	</head>
	
	<body>
		<div id="background">
			<img src="images/absolute-img.jpg" alt="abs-img" class="abs-img" />
			<div class="page">
				<div class="sidebar">
					<div id="connect">
						<h2>Stay Informed:</h2>
						<a href="http://facebook.com" class="facebook">Facebook</a>
						<a href="http://twitter.com" class="twitter">Twitter</a>
						<form action="">
							<input type="text"/>
							<input type="submit" class="submit" value=""/>
						</form>
					</div>
					<p>&#169; Copyright 2014. All Rights Reserved.</p>
				</div>
				<div class="body">
					
					<form action="" id="search">
						<input type="text"/>
						<input type="submit" value="" id="submit"/>
					</form>
					<h1><a href="index.php">PROJECT TUBES 1</a></h1>
					<?php
					// we can specify a localy version or a remote xml as in example
					$xml = simplexml_load_file("http://rss.detik.com/index.php/otomotif");
					// if I use a local file saved in /tmp directory: $xml = simplexml_load_file("/tmp/podcast.xml");
 
					// now make a XPath selection: select all <item> tag.
					$items = $xml->xpath("/rss/channel/item");
 
					// Now, $items contains a class version of a <item> tag.
					// So, if I'd like to print only the title of news item:
					foreach($items as $item){
					echo $item->title."<br/>";
					}
					?>
					<br/>
					<br/>
					<br/>
					<?php
					echo "Data BMKG Cuaca <br/>";
					$url = "http://data.bmkg.go.id/cuaca_indo_1.xml";
					$sUrl = file_get_contents($url, False);
					$xml = simplexml_load_string($sUrl);
					for ($i=0; $i<sizeof($xml->Isi->Row); $i++) {
						$row = $xml->Isi->Row[$i];
						if(strtolower($row->Kota) == "bandung") {
						echo "<b>" . strtoupper($row->Kota) . "</b><br/>";
						echo "Cuaca :" . $row->Cuaca . "<br/>";
						echo "<img src='http://www.bmkg.go.id/ImagesStatus/" . $row->Cuaca . ".png' alt='" . $row->Cuaca . "'><br/>";
						echo "Suhu : " . $row->SuhuMin . " - ".$row->SuhuMax . " &deg;C<br/>";
						echo "Kelembapan : " . $row->KelembapanMin . " - " . $row->KelembapanMax . " %<br/>";
						break;
						}
					}
					?>
			</div>
		</div>
	</body>
</html>
