<?php

$conn = mysqli_connect("localhost","root","","loginsystem");

if(isset($_POST['checking_add']))

{
    $date = date('Y-m-d', strtotime($_POST['event_date']));
    $name = $_POST['event_name'];
    $period = $_POST['event_period'];
    $email = $_POST['event_email'];

    $query = "INSERT INTO events (event_date,event_name,event_period,event_email) VALUES ('$date','$name','$period','$email')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo $return  = "Erfolgreich gespeichert";
    }
    else
    {
        echo $return  = "Etwas ist schief gelaufen.!";
    }


}



if(isset($_POST['checking_view']))
{
    $stud_id = $_POST['stud_id'];
    $result_array = [];

    $query = "SELECT * FROM events WHERE id='$stud_id' ";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else
    {
        echo $return = "Kein Eintrag gefunden.!";
    }
}


if(isset($_POST['checking_edit']))
{
    $stud_id = $_POST['stud_id'];
    $result_array = [];

    $query = "SELECT * FROM events WHERE id='$stud_id' ";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else
    {
        echo $return = "Kein Eintrag gefunden.!";
    }
}

if(isset($_POST['checking_update']))
{
    $id= $_POST['stud_id'];
    $date = date('Y-m-d', strtotime($_POST['event_date']));
    $name = $_POST['event_name'];
    $period = $_POST['event_period'];
    $email = $_POST['event_email'];


    
    $query = "UPDATE events SET event_date = '$date' , event_name = '$name' , event_period = '$period' , event_email = '$email' WHERE  id = '$id'";                     
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo $return  = "Erfolgreich gespeichert";
    }
    else
    {
        echo $return  = "etwas ist schief gelaufen.!";
    }
}


if(isset($_POST['checking_delete']))
{
    $id= $_POST['stud_id'];

    $query = "DELETE FROM events WHERE id='$id'";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        echo $return  = "Erfolgreich gelöscht";
    }
    else
    {
        echo $return  = "etwas ist schief gelaufen.!";
    }
}






?>