<?php
session_start();
/*
Luodaan taulukot session muuttujista

$Teksti = array("Hae nyt","Hae joskus","kukkuu");	
$Url = array("http://www.w3schools.com/php/php_xml_dom.asp","http://www.google.com","http://www.google.com");	
$Aloitusaika = array("1.1.2013","1.2.2013","1.3.2013");	
$Sulkeutumisaika = array("20.1.2013","20.2.2013","20.3.2013");	
*/
$Teksti = unserialize($_SESSION['teksti']);
$Url = unserialize($_SESSION['url']);
$Aloitusaika = unserialize($_SESSION['aloitusaika']);
$Sulkeutumisaika = unserialize($_SESSION['sulkeutumisaika']);


/*tässä testataan tulostuuko kaikki niinkuin pitää
käydään luupilla läpi taulukot yksi kerrallaan. Huomaa
että k muuttujaa käytetään vielä xml- dokumentin tekemisessä.
*/
echo "<h1>haku.xml- tiedostoon on tallennetaan seuraavat tiedot <br /> DOMDocumentsin avulla: </h1>";
for($k = 0; $k < count($Teksti); ++$k){	
	echo "<h2>".($k+1).". link- elementti: </h2>";
	echo "<p><b>Teksti:</b> ".$Teksti[$k]."<br />";
	echo "<b>Url: </b>".$Url[$k]."<br />";
	echo "<b>Aloitusaika: </b>".$Aloitusaika[$k]."<br />";
	echo "<b>Sulkeutumisaika: </b>".$Sulkeutumisaika[$k]. "</p>";
}

/*
Tehdään xml- dokumentti ja käydään lävitse kaikki kirjoitetut rivit läpi.
Aikaisemmin käytettyä k-muuttujaa käytetään tässä ääriarvona.
*/
$doc = new DOMDocument('1.0', "UTF-8");										//xml-tiedoston metatietoja
$doc->formatOutput = true;
$juuriElementti = $doc->createElement('links');								//kerrotaan että halutaan links elementti joka toimii tässä juurena
$juuriElementti = $doc->appendChild($juuriElementti);						//luodaan juuri elementti
for ($i=0; $i<$k; $i++)
{
	$linkElementti = $doc->createElement('link');							//kerrotaan että halutaan link elementti
	$attHakualkaa = $doc->createAttribute('hakuAlkaa');						//kerrotaan että halutaan hakuAlkaa atribuutti
	$attHakuloppuu = $doc->createAttribute('hakuLoppuu');					//kerrotaan että halutaan hakuLoppuu atribuutti
	$attTeksti = $doc->createAttribute('teksti');							//kerrotaan että halutaan teksti atribuutti
	$attUrl = $doc->createAttribute('url');									//kerrotaan että halutaan url atribuutti

	$attHakualkaa->value = $Aloitusaika[$i];								//kerrotaan että halutaan asettaa hakuAlkaa atribuutille Aloitusaika taulukosta arvo
	$attHakuloppuu->value = $Sulkeutumisaika[$i];							//kerrotaan että halutaan asettaa hakuLoppuu atribuutille Sulkeutumisaika taulukosta arvo
	$attTeksti->value = $Teksti[$i];										//kerrotaan että halutaan asettaa teksti atribuutille Teksti taulukosta arvo
	$attUrl->value = $Url[$i];												//kerrotaan että halutaan asettaa url atribuutille Url taulukosta arvo

	$linkElementti->appendChild($attHakualkaa);								//luodaan hakuAlkaa atribuutti
	$linkElementti->appendChild($attHakuloppuu);							//luodaan hakuLoppuu atribuutti
	$linkElementti->appendChild($attTeksti);								//luodaan teksti atribuutti
	$linkElementti->appendChild($attUrl);									//luodaan url atribuutti

	$doc->appendChild($linkElementti);										//Luodaan link elementti
	$linkElementti= $juuriElementti->appendChild($linkElementti);			//kerrotaan että link-elementti on links-elementin lapsi-elementti
}
/*
Tuhotaan session tiedot
*/
session_unset('teksti');
session_unset('url');
session_unset('aloitusaika');
session_unset('sulkeutumisaika');

echo '<p>tallennettu: ' . $doc->save("haku.xml") . ' tavua</p>'; 			//tallennetaan xml-tiedosto nimellä haku.xml


/*
Tästä alkaa tiedoston lukuun liittyvä koodi käyttäen simplexml
*/
echo "<hr />";
echo "<h1>haku.xml-tiedoston lukua simpleXML avulla:</h1>";

$xml = simplexml_load_file("haku.xml");															//ladataan XML-tiedosto
echo "<b>Tulostetaan juuri elementti:</b> ".$xml->getName() . "<br>";							//tulostetaan juuri-elementti
foreach($xml->children() as $child)																//loopataan juuri-elementtiä niin kauan kunnes sieltä loppuu lapsi-elementit
{
	echo "<b>".$xml->getName()." elementin lapsielementti: </b>". $child->getName()."<br />";	//tulostetaan lapsi-elementti
	
	foreach($xml->link->attributes() as $atribuutti => $arvo)									//loopataan atribuutteja, haetaan atribuutin nimi sekä arvo
	{
		echo "<b>Atribuutin </b>".$atribuutti,"<b> arvo on </b>",$arvo,"</br>";					//tulostetaan atribuutteja
	}	
	echo "<br />";
}
?>
	

