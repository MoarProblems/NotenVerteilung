<?php

function push($conn, $tname, $dat) {
        $value = $dat[$tname];
        $sql = "INSERT INTO $tname (grade) VALUES (
        $value
        )";
        $conn->query($sql);
}

function getGrades($conn, $tname) {

        $sql = "SELECT * FROM $tname";
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
        if (!empty($dat["InfI"])) push($conn, "InfI", $dat);
        if (!empty($dat["MatI"])) push($conn, "MatI", $dat);
        if (!empty($dat["GP"])) push($conn, "GP", $dat);
        if (!empty($dat["GET"])) push($conn, "GET", $dat);
}
$data = array(
		"InfI"=>getGrades($conn,"InfI"),
		"MatI"=>getGrades($conn,"MatI"),
		"GP"=>getGrades($conn,"GP"),
		"GET"=>getGrades($conn,"GET")
);
echo json_encode($data);


?>