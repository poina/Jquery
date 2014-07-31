<?php
session_start();
?>
<html>
<head>
<title>T‰yt‰ tiedot</title>

 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<link rel="stylesheet" type="text/css" href="lomake.css">
<script type="text/javascript">

	$(document).ready(function(){
	  $("#valilehtiyleisesti").click(function(){
		$.get("yleisesti.txt",function(data){
		  //alert("Data: " + data);
		  $("#tabs-1").load("yleisesti.txt");
		});
	  });
	});
	
	$(document).ready(function(){
	  $("#valilehtijava").click(function(){
		$.get("javascript.txt",function(data){
		  //alert("Data: " + data);
		  $("#tabs-2").load("javascript.txt");
		});
	  });
	});
	
	$(document).ready(function(){
	  $("#valilehtijQuery").click(function(){
		$.get("jQuery.txt",function(data){
		  //alert("Data: " + data);
		  $("#tabs-3").load("jQuery.txt");
		});
	  });
	});
	
	$(document).ready(function(){
	  $("#valilehtiPHP").click(function(){
		$.get("php.txt",function(data){
		  //alert("Data: " + data);
		  $("#tabs-4").load("php.txt");
		});
	  });
	});
	
	
	
	
	$(function() {
	$( "#tabs" ).tabs();
	});
	
	$(function() {
	//$( "#accordion" ).accordion();
	$( "#accordion" ).accordion({ heightStyle: "fill" });
	});

	$(function() {
	$( "#datepicker" ).datepicker({ dateFormat: "dd.mm.yy" });
	});

   function tarkistustyhja() {
     if (document.input.teksti.value == "") {
     alert("Tekstikentt‰‰n pit‰‰ kirjoittaa jotain");
	 }
	}
   
   function taytetty()
   {
		if(document.input.teksti.value != "" && document.input.teksti.value != "" && document.input.url.value != ""
		&& document.input.aloitusaika.value != "" && document.input.sulkeutumisaika.value != "")
		{
		 	 document.getElementsByName("laheta")[0].disabled = false;
		}
		else{
		document.getElementsByName("laheta")[0].disabled = true;
		}
   }

  // Original JavaScript code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.

  function checkDate()
  {
    
    var minYear = 1902;
    var maxYear = 2100;
	
    var errorMsg = "";

    // regular expression to match required date format
    re = /^(\d{1,2})\.(\d{1,2})\.(\d{4})$/;

    if(document.input.aloitusaika.value != "") {
      if(regs = document.input.aloitusaika.value.match(re)) {
        if(regs[1] < 1 || regs[1] > 31) {
          errorMsg = "v‰‰r‰ p‰iv‰m‰‰r‰: " + regs[1] + "  Valitse p‰iv‰m‰‰r‰ v‰lilt‰ 1 - 31";
		  document.input.aloitusaika.value="";
        } else if(regs[2] < 1 || regs[2] > 12) {
          errorMsg = "V‰‰r‰ kuukausi: " + regs[2] + "  Valitse kuukausi v‰lilt‰ 1 - 12";
		  document.input.aloitusaika.value="";
        } else if(regs[3] < minYear || regs[3] > maxYear) {
          errorMsg = "V‰‰r‰ vuosiluku: " + regs[3] + " - vuoden pit‰‰ olla v‰lilt‰ " + minYear + " ja " + maxYear;
		  document.input.aloitusaika.value="";
        }
      } else {
        errorMsg = "V‰‰r‰ muoto: " + document.input.aloitusaika.value + " Oikea muoto on esim. dd.mm.yyyy tai d.mm.yyyy";
		document.input.aloitusaika.value="";
      }
    } else  {
      errorMsg = "T‰‰h‰n oli tyhj‰, ei sellaista hyv‰ksyt‰";
    }

    if(errorMsg != "") {
      alert(errorMsg);
      document.input.aloitusaika.value.focus();
	  
      
    }
		
    
  }

	function mDown(obj)
	{
	obj.style.backgroundColor="#1ec5e5";
	obj.innerHTML="Release Me"
	}
	
	function lataa(arvo) { 
		
		try { 
		xmlhttp = window.XMLHttpRequest?new XMLHttpRequest(): 
		new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		
		catch (e) { // M‰‰rittele t‰h‰n, mit‰ tapahtuu, jos selain ei tue AJAXia
		} 
		

		xmlhttp.onreadystatechange = responsenKasittelija; 

		linkki='ohjeet.php?arvo='+arvo+'&rnd='+Math.random()*4; //lis‰t‰‰n linkkiin rnd-parametri, jotta selaimen v‰limuisti ei tekisi tepposia
		xmlhttp.open('GET', linkki); 
		xmlhttp.send(null); 
		} 



	function responsenKasittelija() {

		if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
			document.getElementById("ohjetekstip").innerHTML = xmlhttp.responseText;
		} 
	}

</script>

<noscript>Selaimesi ei tue Javascriptia, ole hyva ja laita javascript paalle</noscript>


</head>
<body>
<?php

?>
<div class="kokopohja">
	<div class="pohja">
		<div class="otsikko">
			<h1>LOMAKE</h1>
		</div>
		
		<h2>Tahan tulee mainoksen tiedot</h2>
		
		<form name="input" action="tallenna.php" method="get">
			<div class="tekstipohja">
			
			<a a href="javascript:lataa('1')">Teksti:</a>
			</div>
			<input type="text" size="50" name="teksti" onBlur="tarkistustyhja(); javascript:taytetty()"><br /><br />
			<a href="javascript:lataa('2')">WWW-osoite</a>
			<input type="text" size="50" name="url" onBlur="taytetty()"><br /><br />
			<a href="javascript:lataa('3')">Aloitusaika</a>
			<input type="text" size="50" name="aloitusaika" onBlur="javascript:checkDate(); javascript:taytetty()"><br /><br />
			<a href="javascript:lataa('4')">Sulkeutumisaika</a>
			<input type="text" size="50" id="datepicker" name="sulkeutumisaika" onBlur="javascript:taytetty()"><br />
			
			<div class="otsikko">
				<button type="Laheta" name="laheta" disabled="disabled">Tallenna</button> 
			</div>
		</form>
		

	</div>
	
	<div class="pohjaohje">
			<div class="otsikko">
				<h1>OHJE</h1>
			</div>
	<p id="ohjetekstip" >T‰m‰ on tarkoitettu Flash- mainoksen sis‰llon tuottamiseen
	T‰yt‰ tekstikentat ja sen j‰lkeen tallenna. Ohjelman antaa lis‰infoa painamalla
	tekstikent‰t otsikosta</p>
	</div>
	<div class="pohjaohjetommi">

		<div id="accordion">
			
			<h5>Yleisesti</h5>
			<div>
				Tekstikenttiin on tehty tarkistuksia joista enemm‰n alapuolella. Lis‰ksi olen tehnyt JS:ll‰ 
				jokaisen tekstikent‰n otsikkoon metodin, jolla kutsun PHP- tiedostosta lukua vastaavan tekstin.
				Teksti tulee oikeanpuoleiseen Ohje- diviin. <br /> <br />
				Alunperin  minun piti tehd‰ viel‰ Div jonka sis‰ll‰ 
				olisi teksti ja sen v‰ri muuttuu sit‰ mukaan, kun siihen menee hiirell‰ ja/tai sit‰ painaessa 
				v‰ri muuttuu samanv‰riseksi, kuin ohje- divin v‰ri, jolloin on helpompi j‰sent‰‰ mit‰ tapahtuu
				linkist‰
				
				
			</div>
			
			
			<h5>Yleisesti tarkistuksista</h5>
			<div>
			<p>
				Yleisesti t‰st‰ sivusta. T‰m‰ on aikaisemman teht‰v‰ksiannon parantelua. Aikaisemmin
				emme osanneet tehd‰ tarkastuksia ollenkaan js:ll‰ ja nyt liitin ne osaksi t‰t‰ teht‰v‰‰.
				</p> 
				<p>
				Vasemmalla on lomake, johon t‰ytet‰‰n kaikki tarvittavat kent‰t. Tekstikenttien otsikoista
				saa oikealle ohjeeseen palvelimen php- tiedostosta haettua ohjeen kyseiseen tekstiboxiin liittyen.
				</p> 
				<p>
				Kun kaikki kent‰t on t‰ytetty,niin tallenna nappi tulee saataville. 
				</p>
				<p>
				K‰yn seuraavissa v‰lilehdiss‰ l‰vitse tekemi‰ni tarkistuksia, joita olen rakentanut vasemmalla olevaan 
				lomakkeeseen. Tarkistuksia on tehty suoraan Teksti, Aloitusaika ja Sulkeutumisaika- tekstikenttiin
				</p>
			</div>
			
			<h5>Teksti</h5>
				<div>
					<p>
					T‰ss‰ tekstikent‰ss‰ on yksinkertainen tarkistus, jossa katsotaan vain, ett‰ tekstikentt‰‰n on kirjoitettu jotain. Mik‰li
					tekstikent‰st‰ poistuttaessa ei ole yht‰‰n merkki‰ laitettu, niin j‰rjestelm‰ ilmoittaa tyhj‰st‰ kent‰st‰. 
					</p>
					<p>function tarkistustyhja() {
					 if (document.input.teksti.value == "") {
					 alert("Tekstikentt‰‰n pit‰‰ kirjoittaa jotain");
					 }
					}
					</p>
				</div>
				
			<h5>Aloitus- ja Sulkeutumisaika</h5>
			<div>
				<p>
				Tarkistuksen runko on tehty If- lauseilla. Ensin tarkistetaan onko kentt‰ tyhj‰. Seuraavaksi katsotaan ett‰ annettu arvo on 
				ennaltam‰‰ritellyn kaltainen.  Seuraavaksi katsotaan, ett‰ ensimm‰inen luku on v‰lilt‰ 1 ñ 31, ja seuraava taas v‰lilt‰ 
				1 ñ 12. Viimeisen‰ katsotaan annetun vuoden oikeellisuus verraten annettuihin parametreihin. T‰ss‰ sivussa ne ovat 
				1902 ñ 2100. Mik‰li jossain kohdassa lˆydett‰‰n virhe. Siit‰ annetaan virheilmoitus k‰ytt‰j‰lle ja aloitusaika- tekstikentt‰ 
				tyhjennet‰‰n. 
				</p>
				<p>
				function checkDate()<br />
				  {					<br />
					var minYear = 1902;<br />
					var maxYear = 2100;<br />
					<br />
					var errorMsg = "";<br />
				<br />
				
					// regular expression to match required date format<br />
					re = /^(\d{1,2})\.(\d{1,2})\.(\d{4})$/;<br />
				
					if(document.input.aloitusaika.value != "") {<br />
					  if(regs = document.input.aloitusaika.value.match(re)) {<br />
						if(regs[1] < 1 || regs[1] > 31) {<br />
						  errorMsg = "v‰‰r‰ p‰iv‰m‰‰r‰: " + regs[1] + "  Valitse p‰iv‰m‰‰r‰ v‰lilt‰ 1 - 31";<br />
						  document.input.aloitusaika.value="";<br />
						} else if(regs[2] < 1 || regs[2] > 12) {<br />
						  errorMsg = "V‰‰r‰ kuukausi: " + regs[2] + "  Valitse kuukausi v‰lilt‰ 1 - 12";<br />
						  document.input.aloitusaika.value="";<br />
						} else if(regs[3] < minYear || regs[3] > maxYear) {<br />
						  errorMsg = "V‰‰r‰ vuosiluku: " + regs[3] + " - vuoden pit‰‰ olla v‰lilt‰ " + minYear + " ja " + maxYear;<br />
						  document.input.aloitusaika.value="";<br />
						}<br />
					  } else {<br />
						errorMsg = "V‰‰r‰ muoto: " + document.input.aloitusaika.value + " Oikea muoto on esim. dd.mm.yyyy tai d.mm.yyyy";<br />
						document.input.aloitusaika.value="";<br />
					  }<br />
					} else  {<br />
					  errorMsg = "T‰‰h‰n oli tyhj‰, ei sellaista hyv‰ksyt‰";<br />
					}<br />
					<br />
					if(errorMsg != "") {<br />
					  alert(errorMsg);<br />
					  document.input.aloitusaika.value.focus();<br />
					  <br />
					  
					}
				</p>
			</div>
			
			<h5>Lis‰ksi</h5>
			<div>
				<p>
				Lis‰ksi jokaisesta teksikent‰st‰ poistuttaessa kutsutaan metodia, joka tarkistaa kaikki tekstikent‰t, ett‰ onko teksti‰
				Mik‰li kaikissa on jotain, niin vapautuu Tallenna- nappi k‰yttˆˆn. Periaatteessa olisi ollut parempi tehd‰ erilainen nappi
				viereen jossa lukee tarkista ja siin‰ kutsutaan kaikkia n‰it‰ edell‰ k‰ytyj‰ metodeja. 
				T‰ss‰ on ongelma t‰ll‰ hetkell‰, jota en korjannut. Sulkeutumisaika t‰ytet‰‰n jQueryll‰ ja se t‰ytt‰ess‰ ei ns. poistu tekstikent‰st‰
				jolloin Tallenna- nappi ei vapaudu. T‰llˆin joutuu menem‰‰n tekstikentt‰‰n uudelleen ja poistumaan siit‰ uudelleen. T‰m‰ olisi voitu korjata
				erillisell‰ tarkista napilla
				</p>
				<p>
				function taytetty()<br />
			   {<br />
					if(document.input.teksti.value != "" && document.input.teksti.value != "" && document.input.url.value != ""<br />
					&& document.input.aloitusaika.value != "" && document.input.sulkeutumisaika.value != "")<br />
					{<br />
						 document.getElementsByName("laheta")[0].disabled = false;<br />
					}<br />
					else{<br />
					document.getElementsByName("laheta")[0].disabled = true;<br />
					}<br />
			   }<br />
				</p>
			</div>

		</div>
	</div>
	

			<h2>Alla on lis‰tietoja</h2>



	<div id="tabs">
		<ul>
		<li><a href="#tabs-1" id="valilehtiyleisesti">Yleisesti</a></li>
		<li><a href="#tabs-2" id="valilehtijava">Javasript</a></li>
		<li><a href="#tabs-3" id="valilehtijQuery">jQuery</a></li>
		<li><a href="#tabs-4" id="valilehtiPHP">PHP</a></li>
		</ul>
		<div id="tabs-1">
		<p>Havainnollistaen. Paina Yleisesti- v‰lilehte‰, niin t‰h‰n vaihtuu teksti. K‰yn l‰vitse t‰t‰ toiminoa enemm‰n jQuery v‰lilehdell‰</p>
		</div>
		<div id="tabs-2">
		<p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
		</div>
		<div id="tabs-3">
		<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
		<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
		</div>
		<div id="tabs-4">
		<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
		<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
		</div>
	</div>
</div>



	</body>
	</html>


<?php
//debuggausta p‰‰asiassa
if(isset($_SESSION['teksti']))													//mik‰li teksti sessionissa on sis‰ltˆ‰...
{
echo "<p>";
echo "<b>Session-tiedostojen sis‰ltˆ:</p><br /> ";
echo $_SESSION['teksti']."<br />";												//tulostetaan teksti-session tiedot
echo $_SESSION['url']."<br />";													//tulostetaan url-session tiedot
echo $_SESSION['aloitusaika']."<br />";											//tulostetaan aloitusaika-session tiedot
echo $_SESSION['sulkeutumisaika']."<br />";										//tulostetaan sulkeutumisaika-session tiedot
echo "</p>";
}
?>