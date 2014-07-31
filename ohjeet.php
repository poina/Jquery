<?php

  switch($_GET['arvo']) {     # URL:ssä välitettiin arvo-muuttuja
   case '1':    # Jos arvo on 1
      echo "
        Tahan laitat sen tekstin jonka haluat nakyvan <br>
        mainoksessa. Esim. Tietojenkasittely<br> 
        ;)
       ";
      break;
      
      case '2': # Jos arvo on 2
      echo "
        Tahan tulee linkki<br>
        Esim. https://www.google.fi/<br>
        
       ";
      break;
	  
	  case '3': # Jos arvo on 3
      echo "
        Tahan laitetaan paivamaara<br>
        Paivamaaran laittaminen on hyvin<br>
        tarkka. Esim 24.11.1986
       ";
      break;
	  
	  case '4': # Jos arvo on 4
      echo "
        Tahan laitetaan paivamaara<br>
        Paivamaaran laittaminen on hyvin<br>
        tarkka. Esim 24.11.1986
       ";
      break;
   
   default:
  
  }
  
  ?>