<?php
$conn = mysqli_connect('localhost', 'root', '', 'pw_043040023');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    if (mysqli_num_rows($result)) {
        return mysqli_fetch_assoc($result);
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;

}

?>