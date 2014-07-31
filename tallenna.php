<?php
session_start();

$teksti = $_GET['teksti'];													//teksti-muuttuja minne tallennetaan lomake.php "teksti"-kent�n tieto
$url = $_GET['url'];														//url-muuttuja minne tallennetaan lomake.php "url"-kent�n tieto
$aloitusaika = $_GET['aloitusaika'];										//aloitusaika-muuttuja minne tallennetaan lomake.php "aloitusaika"-kent�n tieto
$sulkeutumisaika = $_GET['sulkeutumisaika'];								//sulkeutumisaika-muuttuja minne tallennetaan lomake.php "sulkeutumisaika"-kent�n tieto

$taulukkoTeksti = array();													//teksti-taulukko minne asetetaan sessiosta tiedot
$taulukkoUrl = array();														//url-taulukko minne asetetaan sessiosta tiedot
$taulukkoAloitusaika = array();												//aloitusaika- taulukko minne asetetaan sessiosta tiedot
$taulukkoSulkeutumisaika = array();											//sulkeutumisaika- taulukko minne asetetaan sessiosta tiedot 

if(!isset($_SESSION['teksti'])){
	/*
	Ensimm�isell� kerralla sessiota ei ole luotu, t�ss� if-ehdossa se luodaan.
	Ensiksi siirret��n tiedot taulukkoon jonka j�lkeen taulukkot serialisoidaan ja asetetaan sessioihin.
	*/
	array_push($taulukkoTeksti, $teksti);
	array_push($taulukkoUrl, $url);
	array_push($taulukkoAloitusaika, $aloitusaika);
	array_push($taulukkoSulkeutumisaika, $sulkeutumisaika);

	$_SESSION['teksti'] = serialize($taulukkoTeksti);
	$_SESSION['url'] = serialize($taulukkoUrl);
	$_SESSION['aloitusaika'] = serialize($taulukkoAloitusaika);
	$_SESSION['sulkeutumisaika'] = serialize($taulukkoSulkeutumisaika);
}else{
	/*
	Kun sessio on kertaalleen luotu, k�ytet��n t�t� else�.
	Luetaan kaikkien nelj�n session tiedot taulukkomuotoon.
	*/
	$sTeksti = unserialize($_SESSION['teksti']);							
	$sUrl = unserialize($_SESSION['url']);
	$sAloitusaika = unserialize($_SESSION['aloitusaika']);
	$sSulkeutumisaika = unserialize($_SESSION['sulkeutumisaika']);

	/*
	Lis�t��n �sken luotuihin taulukkoihin t�ytetyt tiedot
	*/
	array_push($sTeksti, $teksti);
	array_push($sUrl, $url);
	array_push($sAloitusaika, $aloitusaika);
	array_push($sSulkeutumisaika, $sulkeutumisaika);
		
	/*
	Tuhotaan edelliset session tiedostot mahdollisten ristiriitojen takia
	*/
	session_unset('teksti');
	session_unset('url');
	session_unset('aloitusaika');
	session_unset('sulkeutumisaika');
	
	/*
	luodaan uudet session tiedostot uusilla tiedoilla
	*/
	$_SESSION['teksti'] = serialize($sTeksti);
	$_SESSION['url'] = serialize($sUrl);
	$_SESSION['aloitusaika'] = serialize($sAloitusaika);
	$_SESSION['sulkeutumisaika'] = serialize($sSulkeutumisaika);
	
	/*
	Tulostetaan taulukkojen sis�lt�
	*/
	for($i=0;$i<count($sTeksti);$i++){
		echo "<p><b>Tulostetaan taulukon ".($i+1).".rivin sis�lt�:</b><br />";
		echo "<br />Teksti: ".$sTeksti[$i];
		echo "<br />Url: ".$sUrl[$i];
		echo "<br />Aloitusaika: ".$sAloitusaika[$i];
		echo "<br />Sulkeutumisaika ".$sSulkeutumisaika[$i];
		echo "</p>";
	}
}

echo "<br /><a href=\"lomake.php\"><button>lis�� uusi</button></a>";
echo "<br /><a href=\"tulostelua.php\"><button>Tallenna ja kirjoita xml</button></a>";





?>