<?php

// Database Connection
$hostname = "localhost";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=$localhost;dbname=oms", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}




// Create  CSV to Array function

function csvToArray($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename)) {
        return false;
    }

    $header = NULL;
    $result = array();
    if (($handle = fopen($filename, 'r')) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
            if (!$header)
                $header = $row;
            else

                $result[] = array_combine($header, $row);
        }
        fclose($handle);
    }


    return $result;
}




// Insert data into database

    $all_data = csvToArray('files/testcsv.csv');
    foreach ($all_data as $data) {

        $sql = $db->prepare("INSERT INTO annual_plan (auditee, audit_object, Operational_area,,risk_level,risk_score, Year,Quarter_number,s_id,e_id) 
        VALUES (:auditee, :audit_object, :Operational_area, ,:risk_level,:risk_score, :Year,:Quarter_number,:s_id,:e_id)");
        $sql->bindParam(':auditee', $data['auditee']);
        $sql->bindParam(':audit_object', $data['audit_object']);
        $sql->bindParam(':Operational_area', $data['Operational_area']);
        $sql->bindParam(':risk_level', $data['risk_level']);
        $sql->bindParam(':risk_score', $data['risk_score']);
        $sql->bindParam(':Year', $data['Year']);
        $sql->bindParam(':Quarter_number', $data['Quarter_number']);
        $sql->bindParam(':s_id', $data['s_id']);
        $sql->bindParam(':e_id', $data['e_id']);
        $sql->execute();

    }