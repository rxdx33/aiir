<meta http-equiv="refresh" content="5">
<!DOCTYPE html>

<html>
<head>
<title>
AIIR
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('https://images.pexels.com/photos/7130549/pexels-photo-7130549.jpeg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>
</head>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
    AIIR
  </div>
  <div class="w3-display-middle">

  <?php

# Grab file contents and split it up into a variables string
# Using regex, split up strings using commas
$data = file_get_contents("data.txt");
$vars = preg_split('/[\s,]+/', $data);

# Prints raw array, good for debugging
#print_r ($vars);
#echo $data;

# Each variable is assigned from vars array
$hum = floor($vars[0]);
$tem = floor($vars[1]);
$feel = floor($vars[2]);
$voc = $vars[3];
$co = $vars[4];
$index = $vars[5];

#print"<h1 class='w3-jumbo w3-animate-top;'>Overview:</h1>";
if ($index == "0") {
    print"<h1 class='w3-jumbo;'><h1 style='font-size:50px'>Everything looks good!</h1></p>";    
} elseif ($index == "1") {
    print"<h1 class='w3-jumbo;'>Temperature is high, try opening a window</p>";
} elseif ($index == "2") {
    print"<h1 class='w3-jumbo;'>Temperature is low, try closing a window</p>";
} elseif ($index == "3") {
    print"<h1 class='w3-jumbo;'>Humidity is high, try opening a window</p>";
} elseif ($index == "4") {
    print"<h1 class='w3-jumbo;'>Humidity is low, try closing a window</p>";
} elseif ($index == "5") {
    print"<h1 class='w3-jumbo;'>CO2 is high, try opening a window</p>";
} elseif ($index == "6") {
    print"<h1 class='w3-jumbo;'>TVOCs are high, try opening a window</p>";
} elseif ($temp && $hum == "0") {
    print"<h1 class='w3-jumbo;'>Internal error. Sensors not reporting data</p>";
}

print"<h3 style='text-align:center;'>Temperature: $tem C</h3>";
print"<h3 style='text-align:center;'>Humidity: $hum %</h3>";
print"<h3 style='text-align:center;'>Feels like $feel C</h3>";
print"<h3 style='text-align:center;'>TVOCs: $voc ppb</h3>";
print"<h3 style='text-align:center;'>C02: $co ppm</h3>";

?>

    <!--<h1 class="w3-jumbo w3-animate-top">COMING SOON</h1>
    <hr class="w3-border-grey" style="margin:auto;width:40%">
    <p class="w3-large w3-center">35 days left</p>-->
  </div>
  
</div>



<div class="w3-display-bottomleft w3-padding-large">
AIIR is an open-source project by Rados Nikacevic. Find the repo <a href="https://www.github.com/rxdx33/aiir">here</a>
  </div>
</body>
</html>

