<?php
session_start();
include('class/database.php');
class view extends database
{
    public function viewFunction()
    {
        $name = $_SESSION['name'];
        $sql = "SELECT view_count as total from extra_view where username = '$name' AND DAY(created_at) = DAY(CURRENT_DATE()) AND MONTH(created_at) = MONTH(CURRENT_DATE())
        AND YEAR(created_at) = YEAR(CURRENT_DATE()) order by view_id DESC";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) <= 10) {
            $row = mysqli_fetch_assoc($res);
            // $row = mysqli_fetch_assoc($res);
            // $count = (isset($row['total'])) ? $row['total'] : 10;
            if (isset($row['total'])) {
                return 10 - $row['total'];
            }
        } else {
            return 0;
        }
        # code...
    }
}
$obj = new view;
echo $obj->viewFunction();