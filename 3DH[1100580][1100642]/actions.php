<?php

if (isset($_GET["method"])) {
    if ($_GET["method"] == "mostPopularTags") {
        $qtTags = intval($_GET["qtTags"]);
        getTopTags($qtTags);
    }else if($_GET["method"] == "topTracks"){
		$tag = $_GET["tag"];
		$tagNoSpace = str_replace(" ", "%20", $tag);
		$qtTracks = $_GET["qtTracks"];
		showTopTracks($tagNoSpace,$qtTracks);
	}else if($_GET["method"] == "trackInfo"){
		$track = $_GET["track"];
		$artist = $_GET["artist"];
		getInfo($track,$artist);
	}
}


//a),b)
function getTopTags($number) {
	$pedido = "TopTags";
	$url = "http://ws.audioscrobbler.com/2.0/?method=tag.getTopTags&api_key=9ea9fca6eece195f233afbff9328b8ba";
    $retornoTags = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=tag.getTopTags&api_key=9ea9fca6eece195f233afbff9328b8ba"); //Retrieve das tagas por pedido à API
    $xmlFile = new DOMDocument('1.0', 'ISO-8859-1');
    $xmlFile->loadXML($retornoTags); //var xml contém agora a resposta do pedido à API
    $tags = $xmlFile->getElementsByTagName("name");
	$answer = "";
	for($i=0;$i<$number;$i++){
		$item = $tags->item($i);
		$value = $item->nodeValue;
		$answer .= $value . ",";
	}
	saveToDb($pedido,$url);
    print $answer; //retorno para ajax
}
//c)
function showTopTracks($tag,$qtTracks){
	$url = "http://ws.audioscrobbler.com/2.0/?method=tag.gettoptracks&tag=" . $tag . "&api_key=9ea9fca6eece195f233afbff9328b8ba";
	$pedido = "TopTracks";
    $respTopTracks = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=tag.gettoptracks&tag=" . $tag . "&api_key=9ea9fca6eece195f233afbff9328b8ba");
	$xmlFile = new DOMDocument('1.0', 'ISO-8859-1');
    $xmlFile->loadXML($respTopTracks); //var xml contém agora a resposta do pedido à API
	$tracks = $xmlFile->getElementsByTagName("track");
    $answer = "";
	for($i=0;$i<$qtTracks;$i++){
		$name = $tracks->item($i)->childNodes->item(1)->nodeValue;
		$url = $tracks->item($i)->childNodes->item(7)->nodeValue;
		$answer .= $name . "|" . $url . "%";
	}
	saveToDb($pedido,$url);
    print $answer;
}

function getInfo($track,$artist){
	$answer = "";
	
	$trackNoSpaces = str_replace("%20", " ", $track);
    $artistNoSpaces = str_replace("%20", " ", $artist);
	
	$resp = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=9ea9fca6eece195f233afbff9328b8ba&artist=$artist&track=$name");
    $xml = new DOMDocument('1.0', 'ISO-8859-1'); //Cria um objecto representativo de uma ficheiro XML.
    $xml->loadXML($resp);
	$album = $xml->getElementsByTagName("album")->item(0)->childNodes->item(3)->nodeValue;
	
	$resp = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=artist.gettopalbums&artist=$artist&api_key=9ea9fca6eece195f233afbff9328b8ba");
    $xml->loadXML($resp);
	$top3 = $xmlFile->getElementsByTagName("album");
	$str = "";
	for($k = 0; $k < 3; $k++){
		$str .= $top3->item($k)->childNodes->item(1)->nodeValue . "|";
	}
	
	$resp = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=$artist&api_key=9ea9fca6eece195f233afbff9328b8ba");
    $xml->loadXML($resp);
	$img = $xml->getElementsByTagName("artist")->item(0)->childNodes->item(11)->nodeValue;
	
	$resposta = file_get_contents("http://ws.audioscrobbler.com/2.0/?method=artist.gettoptracks&artist=$artist&api_key=4bb733314b7ef5d7baf04356a6412d0f");
    $xml->loadXML($resp);
	$list = $xml->getElementsByTagName("track");
    $topTrack = $list->item(0)->childNodes->item(1)->nodeValue;
	
	$answer .= $trackNoSpaces . "#" . $artistNoSpaces . "#" . $album . "#" . $str . "#" . $img . "#" . $topTrack;
	
	print $answer;
}


function saveToDb($pedido,$url){
	$dbname = "i100580";
	$conn = mysql_connect('localhost',"i100580","992564");
	mysql_select_db($dbname,$conn);
	$sqlQuery = "INSERT INTO Pedidos (Pedido, Url)
					VALUES ('$pedido','$url')";
	mysql_query($sqlQuery,$conn);
}
?>