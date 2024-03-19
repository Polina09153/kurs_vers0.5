<?php
include 'connection.php';

$action = $_GET['action'];

if ($action === 'getLogin') {
    $login = getLogin();
    echo json_encode($login);
} else if ($action === 'getGroups') {
    $groups = getGroups();
    echo json_encode($groups);
} 

function getLogin(){
    global $conn;

    $sql = "SELECT idTeachers AS  idTeachers, userPassword AS userPassword
            FROM teachers";
    $result = $conn->query($sql);

    $login = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $login[] = $row;
        }
    }
    return $login;
}




function getGroups(){
    global $conn;

    $sql = "SELECT CountOfStudents AS CountOfStudents
            FROM AcademGroups";
    $result = $conn->query($sql);

    $groups = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $groups[] = $row;
        }
    }
    return $groups;
}
    
    
?>