<?php
/**
  * @author Julio Morales
  * @author Julio Morales <julioalberto64@gmail.com>
  */

//urls test
$url = array(
    "https://finance.yahoo.com/news/holberton-school-computer-science-software-002000411.html",
    "https://finance.yahoo.com/news/argentina-requests-spy-chief-bribery-001737674.html",
    "https://finance.yahoo.com/news/avnet-present-goldman-sachs-technolog.html"
);

//error_reporting(E_ALL|E_STRICT);
//ini_set('display_errors', 'on');
//ini_set('max_execution_time', 300); 

//echo '<pre>';
//print_r($url);
//echo '<pre>';

$totalUrls      = 0;
$totalOK        = 0;
$totalRedirects = 0;
$totalNotFound  = 0;
$totalError     = 0;
foreach ($url as $urlx) {
    $totalUrls++;
    $result = get_headers($urlx, 1);
    if ($result[0] == "HTTP/1.0 404 Not Found") {
        $totalNotFound++;
        echo "<br>";
        echo $urlx;
        echo " ";
        print_r($result[0]);
        echo "<img src='images/not-found.png' width='25'>";
    } elseif ($result[0] == "HTTP/1.0 200 OK" || $result[0] == "HTTP/1.1 200 OK") {
        $totalOK++;
        echo "<br>";
        echo $urlx;
        echo " ";
        print_r($result[0]);
        echo "<img src='images/ok.png' width='25'>";
    } elseif ($result[0] == "HTTP/1.0 303 See Other" || $result[0] == "HTTP/1.1 303 See Other") {
        $totalRedirects++;
        echo "<br>";
        echo $urlx;
        echo " ";
        print_r($result[0]);
        echo "<img src='images/redirect.png' width='25'>";
    } else {
        $totalError++;
        echo "<br>";
        echo $urlx;
        echo " ";
        print_r($result[0]);
        echo "<img src='images/error.png' width='25'>";
    }
}
echo "<br><br>Total URLs OK: " . $totalOK;
echo "<br>Total URLs Redirect: " . $totalRedirects;
echo "<br>Total URLs Not Found: " . $totalNotFound;
echo "<br>Total URLs Error: " . $totalError;
echo "<br><strong>Total URLs: " . $totalUrls . "</strong>";
?> 