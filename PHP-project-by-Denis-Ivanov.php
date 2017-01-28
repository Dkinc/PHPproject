<?php

	if( isset($_GET["name"]) ) {
		$movieTitle = $_GET["name"];
		$movieTitle = str_replace(" ", "+", $movieTitle);
		$service_url = 'http://www.omdbapi.com/?t=' . $movieTitle . '&y=&plot=short&r=json';
		$curl = curl_init($service_url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$curl_response = curl_exec($curl);
			if ($curl_response === false) {
				$info = curl_getinfo($curl);
				curl_close($curl);
				die('error occured during curl exec. Additioanl info: ' . var_export($info));
			}
		curl_close($curl);
		$decoded = json_decode($curl_response);
			if ($decoded->Response == 'False') {
				die('error occured: ' . $decoded->Error);
			}	
		echo 'Title : ' . $decoded->Title . "<br>";
		echo 'Year : ' . $decoded->Year . "<br>";
		echo 'Rated : ' . $decoded->Rated . "<br>";
		echo 'Released : ' . $decoded->Released . "<br>";
		echo 'Runtime : ' . $decoded->Runtime . "<br>";
		echo 'Genre : ' . $decoded->Genre . "<br>";
		echo 'Director : ' . $decoded->Director . "<br>";
		echo 'Writer : ' . $decoded->Writer . "<br>";
		echo 'Actors : ' . $decoded->Actors . "<br>";
		echo 'Plot : ' . $decoded->Plot . "<br>";
		echo 'Language : ' . $decoded->Language . "<br>";
		echo 'Awards : ' . $decoded->Awards . "<br>";
		echo 'Poster : ' . '<br> <img src=' . $decoded->Poster . '/><br>';
		echo 'Metascore : ' . $decoded->Metascore . "<br>";
		echo 'imdbRating : ' . $decoded->imdbRating . "<br>";
		echo 'imdbVotes : ' . $decoded->imdbVotes . "<br>";
		echo 'imdbID : ' . $decoded->imdbID . "<br>";
		echo 'Type : ' . $decoded->Type . "<br>";
		
	exit();
   }
?>
<html>
   <body>
   
      <form action = "" method = "GET">
         Movie Name: <input type = "text" name = "name" />
         <input type = "submit" />
      </form>
      
   </body>
</html>