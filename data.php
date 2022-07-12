<?php

function push($conn, $tname, $dat) {
        $value = $dat[$tname];
        $sql = "INSERT INTO $tname (grade) VALUES (
        $value
        )";
        $conn->query($sql);
}

function getGrades($conn, $tname) {

        $sql = "SELECT * FROM $tname ORDER BY rand()";
        $result = $conn->query($sql);
        $res = array();
        while($row = $result->fetch_assoc()) array_push($res, floatval($row["grade"]));
        return $res;
}
// db login is only possible from local
$conn = new mysqli("localhost", "root", "*****");

$conn->query("USE NotenDB");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dat=json_decode(file_get_contents('php://input'),true);
	//Semester 1
        if (!empty($dat["InfI"])) push($conn, "InfI", $dat);
        if (!empty($dat["MatI"])) push($conn, "MatI", $dat);
        if (!empty($dat["GP"])) push($conn, "GP", $dat);
        if (!empty($dat["GET"])) push($conn, "GET", $dat);

	//Semester 2
        if (!empty($dat["InfII"])) push($conn, "InfII", $dat);
        if (!empty($dat["MatII"])) push($conn, "MatII", $dat);
        if (!empty($dat["Phys"])) push($conn, "Phys", $dat);
        if (!empty($dat["Digi"])) push($conn, "Digi", $dat);
        if (!empty($dat["EMI"])) push($conn, "EMI", $dat);
        if (!empty($dat["GETII"])) push($conn, "GETII", $dat);
	
	//Semester 3
        if (!empty($dat["MatIII"])) push($conn, "MatIII", $dat);
        if (!empty($dat["GETIII"])) push($conn, "GETIII", $dat);
        if (!empty($dat["SYS"])) push($conn, "SYS", $dat);
        if (!empty($dat["EBUS"])) push($conn, "EBUS", $dat);
	
	//Semester 4
        if (!empty($dat["RegI"])) push($conn, "RegI", $dat);
        if (!empty($dat["GETIV"])) push($conn, "GETIV", $dat);
        if (!empty($dat["EMII"])) push($conn, "EMII", $dat);
        if (!empty($dat["MICR"])) push($conn, "MICR", $dat);
        if (!empty($dat["EDS"])) push($conn, "EDS", $dat);
        if (!empty($dat["SSIM"])) push($conn, "SSIM", $dat);
}
$data = array(
	//Semester 1
		"InfI"=>getGrades($conn,"InfI"),
		"MatI"=>getGrades($conn,"MatI"),
		"GP"=>getGrades($conn,"GP"),
		"GET"=>getGrades($conn,"GET"),

	//Semester 2
		"InfII"=>getGrades($conn,"InfII"),
		"MatII"=>getGrades($conn,"MatII"),
		"Phys"=>getGrades($conn,"Phys"),
		"Digi"=>getGrades($conn,"Digi"),
		"EMI"=>getGrades($conn,"EMI"),
		"GETII"=>getGrades($conn,"GETII"),

	//Semester 3
		"MatIII"=>getGrades($conn,"MatIII"),
		"GETIII"=>getGrades($conn,"GETIII"),
		"SYS"=>getGrades($conn,"SYS"),
		"EBUS"=>getGrades($conn,"EBUS")
	
	//Semester 4
		"RegI"=>getGrades($conn,"RegI"),
		"GETIV"=>getGrades($conn,"GETIV"),
		"EMII"=>getGrades($conn,"EMII"),
		"MICR"=>getGrades($conn,"MICR"),
		"EDS"=>getGrades($conn,"EDS"),
		"SSIM"=>getGrades($conn,"SSIM")
);
echo json_encode($data);


?>
