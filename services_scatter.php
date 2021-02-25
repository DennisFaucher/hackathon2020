<?php


$pandl = $_POST["pl"];
if ($pandl==""){
    $pandl_print="All P&Ls";
}
else{
    $pandl_print=$pandl;
}

$practice_var = $_POST["practice"];
if ($practice_var==""){
    $practice_var_print="All Practicess";
}
else{
    $practice_var_print=$practice_var;
}

echo "You chose ";
echo $pandl_print;
echo " and ";
echo $practice_var_print;
echo "<br>";

echo "(Large data sets can take a while to render. Please be patient.☕️)<br>";

echo "<b>NOTE:</b> High rates may be due to external costs. Please drill into the IR.<br>";


$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=innovation;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        'mysql', //'mysql',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	

//DMF Next line works
//$sql_var="select ext_rev as x, discount as y, customer as z, manuf as w from innovation.ne_nj_tbl where pnl like 'Commercial NE Majors%' and manuf like '%'";
$sql_var="select Revenue as x, Rate as y, Account as z, Practice as w from innovation.services where Organization like '$pandl%' and Practice like '$practice_var%'";
$handle = $link->prepare($sql_var); 
//$handle = $link->prepare('select ext_rev as x, discount as y, customer as z, manuf as w from innovation.ne_nj_tbl where pnl like \'Commercial NE Majors%\' and manuf like \'%\' '); 

$handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
		
    foreach($result as $row){
//        array_push($dataPoints, array("x"=> $row->x, "y"=> $row->y));
        array_push($dataPoints, array("x"=> $row->x, "y"=> $row->y, "z"=> $row->z, "w"=> $row->w));
//        array_push($dataPoints, array("ext_rev"=> $row->x, "gp"=> $row->y));
    }
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
        zoomEnabled: true,
        zoomType: "xy",
        title: {
            text: "Services Scatter Graph"
        },
        subtitles: [
            {
                text: "Try Zooming and Panning"
            }
        ],
        animationEnabled: true,
        axisX: {
            title: "Revenue",
            valueFormatString: "$#,###,###",
    },
        axisY: {
            title: "Hourly Rate",
            valueFormatString: "$###",
        //    valueFormatString: "$#,##0k",
        //    lineThickness: 2,
            includeZero: false
        },
        data: [
        {
            type: "scatter",
//            toolTipContent: "<span style='\"'color: {color};'\"'><strong>Revenue:$ </strong></span>{x} <br/><span style='\"'color: {color};'\"'><strong>Discount: </strong></span>{y} % ",
            toolTipContent: "<span style='\"'color: {color};'\"'><strong>Revenue: $</strong></span>{x} <br/><span style='\"'color: {color};'\"'><strong>Rate: $</strong></span>{y}<br/> <span style='\"'color: {color};'\"'><strong>Customer: </strong></span>{z}<br/><span style='\"'color: {color};'\"'><strong>Practice: </strong></span>{w}",

            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });

chart.render();
 
}
</script>
</head>
<body>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<a href="Innovation.html">Home</a><br>

</body>
</html>   