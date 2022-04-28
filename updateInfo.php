<?php
class signInUp extends database
{
    protected $link;

    public function signInFunction()
    {
        if (isset($_POST['submit'])) {
            $code = $_GET['code'];
            $district = addslashes(trim($_POST['district']));
            $street = addslashes(trim($_POST['street']));
            $building = addslashes(trim($_POST['building']));
            $floor = addslashes(trim($_POST['floor']));
            $block = addslashes(trim($_POST['block']));
            $flat = addslashes(trim($_POST['flat']));
            $no_rooms = addslashes(trim($_POST['no_rooms']));
            $cargo_lift = addslashes(trim($_POST['cargo_lift']));
            $customer_lift = addslashes(trim($_POST['customer_lift']));
            $tf_hr = addslashes(trim($_POST['tf_hr']));
            $entry_password = addslashes(trim($_POST['entry_password']));
            $display = addslashes(trim($_POST['display']));

            $sql1 = "UPDATE `building_info` SET `district`='$district',`street`='$street',`building`='$building',`floor`='$floor',`flat`='$flat',`no_room`='$no_rooms',`enter_password`='$entry_password',`block`='$block',`cargo_lift`='$cargo_lift',`customer_lift`='$customer_lift',`tf_hr`='$tf_hr',`display_by`='$display' WHERE `code` = '$code' ";

            $res1 = mysqli_query($this->link, $sql1);
            $add = 1;

            if (isset($_POST['gross_area'])) {
                for ($i = 0; $i < count($_POST['gross_area']); $i++) {
                    $gross_area = $_POST['gross_area'][$i];
                    $salesable_area = $_POST['salesable_area'][$i];
                    $rent = $_POST['rent'][$i];

                    $Windows = (isset($_POST['Windows'][$i]) ? 'Yes' : 'No');
                    $Lavatory = (isset($_POST['Lavatory'][$i]) ? 'Yes' : 'No');
                    $Shower = (isset($_POST['Shower'][$i]) ? 'Yes'  : 'No');
                    $Sink = (isset($_POST['Sink'][$i]) ? 'Yes'  : 'No');
                    $Wide_door = (isset($_POST['Wide_door'][$i]) ? 'Yes'  : 'No');
                    $Brickes_wall = (isset($_POST['Brickes_wall'][$i]) ? 'Yes' : 'No');
                    $Seprate_room = (isset($_POST['Seprate_room'][$i]) ? 'Yes'  : 'No');
                    $Electronic_keys = (isset($_POST['Electronic_keys'][$i]) ? 'Yes'  : 'No');
                    $Wifi = (isset($_POST['Wifi'][$i]) ? 'Yes'  : 'No');

                    // $Windows = $_POST['Windows'][$i];
                    // $Lavatory = $_POST['Lavatory'][$i];
                    // $Shower = $_POST['Shower'][$i];
                    // $Sink = $_POST['Sink'][$i];
                    // $Wide_door = $_POST['Wide_door'][$i];
                    // $Brickes_wall = $_POST['Brickes_wall'][$i];
                    // $Seprate_room = $_POST['Seprate_room'][$i];
                    // $Electronic_keys = $_POST['Electronic_keys'][$i];
                    // $Wifi = $_POST['Wifi'][$i];
                    $Remarks = addslashes(trim($_POST['Remarks'][$i]));
                    $room_num = $_POST['rn1'][$i];

                    $sql2 = "UPDATE `facilties` SET `gross_area`='$gross_area',`salesable_area`='$salesable_area',`rent`='$rent',`windows`='$Windows',`lavatory`='$Lavatory',`shower`='$Shower',`sink`='$Sink',`wide_door`='$Wide_door',`brickes_wall`='$Brickes_wall',`seprate_room`='$Seprate_room',`electronic_keys`='$Electronic_keys',`wifi`='$Wifi',`remarks`='$Remarks' WHERE `code` = '$code' AND room_number = '$room_num' ";

                    mysqli_query($this->link, $sql2);
                }
            }

            for ($j = 0; $j < count($_POST['keyNumber']); $j++) {
                $Individual = (isset($_POST['Individual'][$j]) ? $_POST['Individual'][$j] : 'No');
                $Seprate = (isset($_POST['Seprate'][$j]) ? $_POST['Seprate'][$j] : 'No');
                $Studio = (isset($_POST['Studio'][$j]) ? $_POST['Studio'][$j] : 'No');
                $Yoga = (isset($_POST['Yoga'][$j]) ? $_POST['Yoga'][$j] : 'No');
                $Class = (isset($_POST['Class'][$j]) ? $_POST['Class'][$j] : 'No');
                $Overnight = (isset($_POST['Overnight'][$j]) ? $_POST['Overnight'][$j] : 'No');
                $Warehouse_office = (isset($_POST['Warehouse_office'][$j]) ? $_POST['Warehouse_office'][$j] : 'No');
                $Beauty = (isset($_POST['Beauty'][$j]) ? $_POST['Beauty'][$j] : 'No');
                $Upstair_shop = (isset($_POST['Upstair_shop'][$j]) ? $_POST['Upstair_shop'][$j] : 'No');
                $Band = (isset($_POST['Band'][$j]) ? $_POST['Band'][$j] : 'No');
                $Recording_room = (isset($_POST['Recording_room'][$j]) ? $_POST['Recording_room'][$j] : 'No');
                $piano = (isset($_POST['piano'][$j]) ? $_POST['piano'][$j] : 'No');
                $Painting = (isset($_POST['Painting'][$j]) ? $_POST['Painting'][$j] : 'No');






                // $Seprate = $_POST['Seprate'][$j];
                // $Studio = $_POST['Studio'][$j];
                // $Yoga = $_POST['Yoga'][$j];
                // $Class = $_POST['Class'][$j];
                // $Overnight = $_POST['Overnight'][$j];
                // $Warehouse_office = $_POST['Warehouse_office'][$j];
                // $Beauty = $_POST['Beauty'][$j];
                // $Upstair_shop = $_POST['Upstair_shop'][$j];
                // $Band = $_POST['Band'][$j];
                // $Recording_room = $_POST['Recording_room'][$j];
                // $piano = $_POST['piano'][$j];
                // $Painting = $_POST['Painting'][$j];
                $Remarks2 = addslashes(trim($_POST['Remarks'][$j]));

                $room_no = $_POST['rn2'][$j];


                $sql3 = "UPDATE `types` SET `individual`='$Individual',`seprate`='$Seprate',`studio`='$Studio',`yoga`='$Yoga',`class`='$Class',`overnight`='$Overnight',`warehouse_office`='$Warehouse_office',`beauty`='$Beauty',`upstair_shop`='$Upstair_shop',`band`='$Band',`recording_room`='$Recording_room',`piano`='$piano',`painting`='$Painting',`remarks`='$Remarks2' WHERE `code` = '$code' AND `types_room_no` = '$room_no' ";

                mysqli_query($this->link, $sql3);
            }

            $charge = addslashes(trim($_POST['charge']));
            $tel1 = addslashes(trim($_POST['tel1']));
            $landlord_name = addslashes(trim($_POST['landlord_name']));
            $bank = addslashes(trim($_POST['bank']));
            $bank_account = addslashes(trim($_POST['bank_account']));
            $remakeLand = addslashes(trim($_POST['remake']));
            $tel2 = ($_POST['tel2']) ? $_POST['tel2'] : '';
            $tel3 = ($_POST['tel3']) ? $_POST['tel3'] : '';

            $sql4 = "UPDATE `landlord_details` SET `in_charges`='$charge',`tel1`='$tel1',`tel2`='$tel2',`tel3`='$tel3',`landlord_name`='$landlord_name',`bank`='$bank',`bank_acc`='$bank_account',`remarks`='$remakeLand' WHERE `code` = '$code' ";

            $res4 = mysqli_query($this->link, $sql4);

            // for ($ir = 0; $ir < count($_POST['keyNumber']); $ir++) {

            //     $room_number = count($_POST['gross_area']) - $ir;
            //     $szFiles = sizeof($_FILES['item']['name']['image' . $room_number]);

            //     if ($szFiles === 1) {
            //         $sqlFile = "INSERT INTO `photos` (`image_id`, `image`, `room_number`, `code`, `image_created_at`) VALUES (NULL, '', '$room_number', '$code', CURRENT_TIMESTAMP)";
            //         mysqli_query($this->link, $sqlFile);
            //         break;
            //     }

            //     for ($second = 0; $second < $szFiles; $second++) {
            //         if ($_FILES['item']['name']['image' . $room_number][$second] != '') {
            //             $files = date("d-m-Y") . '_' . date("h-i-sa") . '_' . '@' . $_FILES['item']['name']['image' . $room_number][$second];

            //             $target = 'files/' . $files;
            //             move_uploaded_file($_FILES['item']['tmp_name']['image' . $room_number][$second], $target);


            //             $sqlFile = "INSERT INTO `photos` (`image_id`, `image`, `room_number`, `code`, `image_created_at`) VALUES (NULL, '$files', '$room_number', '$code', CURRENT_TIMESTAMP)";
            //             mysqli_query($this->link, $sqlFile);
            //         }
            //     }
            // }

            $username = $_SESSION['name'];

            $sqlUser = "INSERT INTO `last_update` (`update_id`, `username`, `code`, `updated_at`) VALUES (NULL, '$username', '$code', CURRENT_TIMESTAMP)";
            mysqli_query($this->link, $sqlUser);

            if ($res1 && $res4) {
                return "Added";
            }
        }
    }
}
$obj = new signInUp;
$objSignIn = $obj->signInFunction();