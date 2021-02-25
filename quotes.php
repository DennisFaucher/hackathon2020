<!DOCTYPE html>
<html>
<head>
<h1>WWT OEM Discount Guidance</h1>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<a href="Innovation.html">Home</a><br>

<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "mysql";


// $pandl = $_POST["pl"];
// $manuf_var = $_POST["oem"];
// $sort_var = $_POST["sort"];

$pandl = $_POST["pl"];
if ($pandl==""){
    $pandl_print="All P&Ls";
}
else{
    $pandl_print=$pandl;
}

$manuf_var = $_POST["oem"];
if ($manuf_var==""){
    $manuf_var_print="All OEMs";
}
else{
    $manuf_var_print=$manuf_var;
}

$sort_var = $_POST["sort"];
if ($sort_var==""){
    $sort_var_print="Discount";
    $sort_var="discount";
}
else{
    $sort_var_print=$sort_var;
}

echo "You chose ";
echo $pandl_print;
echo " and ";
echo $manuf_var_print;
echo " sorted by ";
echo $sort_var_print;
echo "<br>";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $sql = "SELECT quote_number, FORMAT(ext_rev,2) as rev_fmt, discount*100 as disc100, gp_perc*100 as gp100, manuf, pnl, customer FROM ne_nj_tbl where pnl like '$pandl%' and manuf like '$manuf_var%' order by discount desc";
$sql = "SELECT quote_number, FORMAT(ext_rev,2) as rev_fmt, discount*100 as disc100, gp_perc*100 as gp100, manuf, pnl, customer, vendor FROM innovation.ne_nj_tbl where pnl like '$pandl%' and manuf like '$manuf_var%' order by $sort_var desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Quote</th><th>Revenue</th><th>Max<br>Cust Disc%</th><th>Quote<br>GP%</th><th>OEM</th><th>Region</th><th>Customer</th><th>Distributor</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
//        echo "<tr><td>" . $row["quote_number"]. "</td><td>$" . $row["rev_fmt"].  "</td><td>" . $row["disc100"].  "%</td><td>" . $row["gp100"].  "%</td><td>" . $row["manuf"].  "</td><td>" . $row["pnl"].  "</td><td>" . $row["customer"].  "</td></tr>";
        $quote_url="<a href=\"https://quote-system.apps.wwt.com/#/quotes/" . $row["quote_number"] . "/versions/1/setupQuote\" target=\"_blank\">" . $row["quote_number"] . "</a>";
        echo "<tr><td>" . $quote_url. "</td><td>$" . $row["rev_fmt"].  "</td><td>" . $row["disc100"].  "%</td><td>" . $row["gp100"].  "%</td><td>" . $row["manuf"].  "</td><td>" . $row["pnl"].  "</td><td>" . $row["customer"].  "</td><td>" . $row["vendor"].  "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>