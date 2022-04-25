<?php
session_start();
if (isset($_SESSION['name'])) {
} else {
    header('location:login.php');
}
include_once('class/database.php');
class signInUp extends database
{
    protected $link;

    public function signInFunction()
    {
        if (isset($_POST['submit'])) {
            $code = addslashes(trim($_POST['code']));
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

            $sql1 = "INSERT INTO `building_info` (`building_id`, `code`, `district`, `street`, `building`, `floor`, `flat`, `no_room`, `enter_password`, `building_created_at`, `block`, `cargo_lift`, `customer_lift`, `tf_hr`, `display_by`) VALUES (NULL, '$code', '$district', '$street', '$building', '$floor', '$flat', '$no_rooms', '$entry_password', CURRENT_TIMESTAMP, '$block', '$cargo_lift', '$customer_lift', '$tf_hr', '$display')";

            $res1 = mysqli_query($this->link, $sql1);
            $add = 1;

            if (isset($_POST['gross_area'])) {
                for ($i = 0; $i < count($_POST['gross_area']); $i++) {
                    $gross_area = $_POST['gross_area'][$i];
                    $salesable_area = $_POST['salesable_area'][$i];
                    $rent = $_POST['rent'][$i];

                    $Windows = (isset($_POST['Windows'][$i]) ? $_POST['Windows'][$i] : 'No');
                    $Lavatory = (isset($_POST['Lavatory'][$i]) ? $_POST['Lavatory'][$i] : 'No');
                    $Shower = (isset($_POST['Shower'][$i]) ? $_POST['Shower'][$i] : 'No');
                    $Sink = (isset($_POST['Sink'][$i]) ? $_POST['Sink'][$i] : 'No');
                    $Wide_door = (isset($_POST['Wide_door'][$i]) ? $_POST['Wide_door'][$i] : 'No');
                    $Brickes_wall = (isset($_POST['Brickes_wall'][$i]) ? $_POST['Brickes_wall'][$i] : 'No');
                    $Seprate_room = (isset($_POST['Seprate_room'][$i]) ? $_POST['Seprate_room'][$i] : 'No');
                    $Electronic_keys = (isset($_POST['Electronic_keys'][$i]) ? $_POST['Electronic_keys'][$i] : 'No');
                    $Wifi = (isset($_POST['Wifi'][$i]) ? $_POST['Wifi'][$i] : 'No');

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
                    $room_num = $i + 1;

                    $sql2 = "INSERT INTO `facilties` (`facilties_id`, `gross_area`, `salesable_area`, `rent`,  `windows`, `lavatory`, `shower`, `sink`, `wide_door`, `brickes_wall`, `seprate_room`, `electronic_keys`, `wifi`, `remarks`, `room_number`, `facilties_created_at`, `code`) VALUES (NULL, '$gross_area', '$salesable_area', '$rent', '$Windows', '$Lavatory', '$Shower', '$Sink', '$Wide_door', '$Brickes_wall', '$Seprate_room', '$Electronic_keys', '$Wifi', '$Remarks', '$room_num', CURRENT_TIMESTAMP, '$code')";

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

                $room_no = $j + 1;


                $sql3 = "INSERT INTO `types` (`types_id`, `individual`, `seprate`, `studio`, `yoga`, `class`, `overnight`, `warehouse_office`, `beauty`, `upstair_shop`, `band`, `recording_room`, `piano`, `painting`, `remarks`, `code`, `types_created_at`,`types_room_no`) VALUES (NULL, '$Individual', '$Seprate', '$Studio', '$Yoga', '$Class', '$Overnight', '$Warehouse_office', '$Beauty', '$Upstair_shop', '$Band', '$Recording_room', '$piano', '$Painting', '$Remarks2', '$code', CURRENT_TIMESTAMP,'$room_no')";

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

            $sql4 = "INSERT INTO `landlord_details` (`landlord_id`, `in_charges`, `tel1`, `tel2`, `tel3`, `landlord_name`, `bank`, `bank_acc`, `remarks`, `code`, `landlord_created_at`) VALUES (NULL, '$charge', '$tel1', '$tel2', '$tel3', '$landlord_name', '$bank', '$bank_account', '$remakeLand', '$code', CURRENT_TIMESTAMP)";

            $res4 = mysqli_query($this->link, $sql4);

            for ($ir = 0; $ir < count($_POST['keyNumber']); $ir++) {

                $room_number = count($_POST['gross_area']) - $ir;
                $szFiles = sizeof($_FILES['item']['name']['image' . $room_number]);

                if ($szFiles === 1) {
                    $sqlFile = "INSERT INTO `photos` (`image_id`, `image`, `room_number`, `code`, `image_created_at`) VALUES (NULL, '', '$room_number', '$code', CURRENT_TIMESTAMP)";
                    mysqli_query($this->link, $sqlFile);
                    break;
                }

                for ($second = 0; $second < $szFiles; $second++) {
                    if ($_FILES['item']['name']['image' . $room_number][$second] != '') {
                        $files = date("d-m-Y") . '_' . date("h-i-sa") . '_' . '@' . $_FILES['item']['name']['image' . $room_number][$second];

                        $target = 'files/' . $files;
                        move_uploaded_file($_FILES['item']['tmp_name']['image' . $room_number][$second], $target);


                        $sqlFile = "INSERT INTO `photos` (`image_id`, `image`, `room_number`, `code`, `image_created_at`) VALUES (NULL, '$files', '$room_number', '$code', CURRENT_TIMESTAMP)";
                        mysqli_query($this->link, $sqlFile);
                    }
                }
            }

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

header('Content-Type: text/html; charset=utf-8');

$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    . '0123456789'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 6) as $k) $rand .= $seed[$k];

$code = $rand;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('layout/style.php'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <style>
    body {
        font-family: 'Lato', sans-serif;

    }

    .navbar-brand {
        width: 7%;
    }

    section {
        padding: 0px;
    }

    .table th {
        white-space: nowrap;
    }

    .bg_color {
        background-color: #274472 !important;
    }

    .sw.sw-justified>.nav .nav-link,
    .sw.sw-justified>.nav>li {
        background-color: #F8F8F8;
    }
    </style>
    <!-- <link rel="stylesheet" href="css/multi-form.css"> -->
    <link rel="stylesheet" href="css/smart_wizard_all.min.css">
</head>

<body class="bg-light">
    <?php include('layout/navbar.php'); ?>

    <section>
        <div class="">

            <form method="post" enctype="multipart/form-data" data-parsley-validate>


                <!-- <form action="" method="post"> -->
                <div class="mt-5">
                    <div class="container">
                        <?php if ($objSignIn == 'Added') { ?>
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Successfully Added!</strong>
                        </div>
                        <?php } ?>
                        <div id="smartwizard" class="bg-white">

                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-1">
                                        <strong>Building Info</strong>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-2">
                                        <strong>Facilities</strong>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-3">
                                        <strong>Types</strong>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-4">
                                        <strong>Landlord Details</strong>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-5">
                                        <strong>Photos</strong>
                                    </a>
                                </li>

                            </ul>

                            <div class="tab-content">
                                <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                    <h3>Building Info</h3>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control mt-3" value="<?php echo $code; ?>"
                                                placeholder="Code" name="code" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control mt-3" placeholder="District"
                                                name="district">
                                        </div>
                                    </div>


                                    <input type="text" class="form-control mt-3" placeholder="Street" name="street">
                                    <input type="text" class="form-control mt-3" placeholder="Building" name="building"
                                        required autocomplete="on">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control mt-3" placeholder="Block"
                                                name="block" autocomplete="on">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control mt-3" placeholder="Floor"
                                                name="floor" autocomplete="on">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control mt-3" placeholder="Flat" name="flat"
                                                autocomplete="on">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control mt-3" placeholder="No of Rooms"
                                                name="no_rooms" id="no_rooms" required>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <p class="mb-0">Room Display By</p>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="display"
                                                class="custom-control-input" value="alp">
                                            <label class="custom-control-label"
                                                for="customRadioInline1">A,B,C,D...</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="display"
                                                class="custom-control-input" value="num" checked>
                                            <label class="custom-control-label"
                                                for="customRadioInline2">1,2,3,4...</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control mt-3" placeholder="Cargo Lift"
                                                name="cargo_lift">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control mt-3" placeholder="Customer Lift"
                                                name="customer_lift">
                                        </div>
                                        <div class="col-6 offset-3">
                                            <label for="" class="mt-3 text-center d-block">24 hour</label>
                                            <select id="" name="tf_hr" class="form-control">

                                                <option value="Yes" selected>Yes</option>
                                                <option value="No">No</option>
                                            </select>

                                        </div>
                                    </div>
                                    <input type="text" class="form-control mt-3" placeholder="Entry Password"
                                        name="entry_password">
                                    <button type="submit" name="submit"
                                        class="btn btn-block font-weight-bold log_btn btn-lg mt-4">SUBMIT</button>
                                </div>
                                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                    <h3>Facilities</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Room No</th>
                                                    <th scope="col">Gross Area</th>
                                                    <th scope="col">Salesable Area</th>
                                                    <th scope="col">Rent - 租</th>

                                                    <th scope="col"><label for="ckbCheckAllP1">Windows </label>
                                                        <input id="ckbCheckAllP1" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAllP2">Lavatory </label>
                                                        <input id="ckbCheckAllP2" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAllP3">Shower 淋浴 </label>
                                                        <input id="ckbCheckAllP3" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAllP4">Sink 下沉 </label>
                                                        <input id="ckbCheckAllP4" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAllP5">Wide door </label>
                                                        <input id="ckbCheckAllP5" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAllP6">Bricked wall </label>
                                                        <input id="ckbCheckAllP6" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAllP7">Seprate room </label>
                                                        <input id="ckbCheckAllP7" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAllP8">Electronic keys </label>
                                                        <input id="ckbCheckAllP8" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAllP9">Wifi 无线上网 </label>
                                                        <input id="ckbCheckAllP9" type="checkbox">
                                                    </th>
                                                    <th scope="col">Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb1">



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                    <h3>Types</h3>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Room No</th>
                                                    <th scope="col"><label for="ckbCheckAll1">Individual</label> <input
                                                            id="ckbCheckAll1" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAll2">Seprate</label> <input
                                                            id="ckbCheckAll2" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAll3">Studio</label> <input
                                                            id="ckbCheckAll3" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAll4">Yoga</label> <input
                                                            id="ckbCheckAll4" type="checkbox"></th>
                                                    <th scope="col"><label for="ckbCheckAll5">Class</label> <input
                                                            id="ckbCheckAll5" type="checkbox"></th>
                                                    <th scope="col"><label for="ckbCheckAll6">Overnight</label> <input
                                                            id="ckbCheckAll6" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAll7">Warehouse & office</label>
                                                        <input id="ckbCheckAll7" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAll8">Beauty</label> <input
                                                            id="ckbCheckAll8" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAll9">Upstair shop </label>
                                                        <input id="ckbCheckAll9" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAll10">Band</label> <input
                                                            id="ckbCheckAll10" type="checkbox"></th>
                                                    <th scope="col"><label for="ckbCheckAll11">Recording room</label>
                                                        <input id="ckbCheckAll11" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAll12">1 to 1 piano </label>
                                                        <input id="ckbCheckAll12" type="checkbox">
                                                    </th>
                                                    <th scope="col"><label for="ckbCheckAll13">Painting</label> <input
                                                            id="ckbCheckAll13" type="checkbox">
                                                    </th>
                                                    <th scope="col">Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb2">

                                                <div id="output2"></div>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                    <h3>Landlord Details</h3>

                                    <input type="text" class="form-control mt-3" placeholder="Who is in Charge?"
                                        name="charge">
                                    <input type="tel" class="form-control mt-3" placeholder="Tel 1" name="tel1">
                                    <input type="tel" class="form-control mt-3" placeholder="Tel 2" name="tel2">
                                    <input type="tel" class="form-control mt-3" placeholder="Tel 3" name="tel3">
                                    <input type="text" class="form-control mt-3" placeholder="Landlord Name"
                                        name="landlord_name">
                                    <input type="text" class="form-control mt-3" placeholder="Bank" name="bank">
                                    <input type="text" class="form-control mt-3" placeholder="Bank account"
                                        name="bank_account">
                                    <input type="text" class="form-control mt-3" placeholder="Remake" name="remake">
                                </div>
                                <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                                    <h3>Photos</h3>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Room No</th>
                                                    <th scope="col">Photos</th>

                                                </tr>
                                            </thead>
                                            <tbody id="tb3">

                                                <div id="output3"></div>

                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" name="submit"
                                        class="btn btn-block font-weight-bold log_btn btn-lg mt-4">SUBMIT</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- </form> -->
            </form>

        </div>

    </section>



    <?php include('layout/script.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/datepicker.js"></script>
    <script src="js/jquery.multifile.js"></script>
    <script src="js/jquery.multifile.preview.js"></script>
    <!-- <script>
    $('.multifile').multifile();
    </script> -->
    <script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
    <script src="js/jquery.smartWizard.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#no_rooms').on('input', function() {

            let myCode = $('#no_rooms').val();
            $('#tb1').empty();
            $('#tb2').empty();
            $('#tb3').empty();
            let string = '';
            let string2 = '';
            let string3 = '';
            // $('#output').html(myCode);

            for (let i = 1; i <= myCode; i++) {
                string += (`<tr id="d1"><th scope="row">${i}</th>
                                                    <td><input type="number" class="form-control" name="gross_area[]">
                                                    </td>
                                                    <td><input type="number" class="form-control" name="salesable_area[]">
                                                    </td>
                                                    <td><input type="number" class="form-control" name="rent[]"></td>
                                                    <td><input type="checkbox" class="checkBoxClassP1" value="Yes" name="Windows[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClassP2" value="Yes" name="Lavatory[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClassP3" value="Yes" name="Shower[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClassP4" value="Yes" name="Sink[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClassP5" value="Yes" name="Wide_door[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClassP6" value="Yes" name="Brickes_wall[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClassP7" value="Yes" name="Seprate_room[]" /> Yes
                                                    </td>
                                                    <td><input type="checkbox" class="checkBoxClassP8" value="Yes" name="Electronic_keys[]" /> Yes
                                                    </td>
                                                    <td><input type="checkbox" class="checkBoxClassP9" value="Yes" name="Wifi[]" /> Yes</td>
                                                    <td><input type="text" class="form-control" name="Remarks[]"></td>
                                                </tr>`);

                string2 += (`<tr>
                                                    <th scope="row">${i}</th>
<input type="hidden" value="Yes" name="keyNumber[]" />
                                                    <td><input type="checkbox" class="checkBoxClass1" value="Yes" name="Individual[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClass2" value="Yes" name="Seprate[]" /> Yes
                                                    </td>
                                                    <td><input type="checkbox" class="checkBoxClass3" value="Yes" name="Studio[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClass4" value="Yes" name="Yoga[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClass5" value="Yes" name="Class[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClass6" value="Yes" name="Overnight[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClass7" value="Yes" name="Warehouse_office[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClass8" value="Yes" name="Beauty[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClass9" value="Yes" name="Upstair_shop[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClass10" value="Yes" name="Band[]" /> Yes
                                                    </td>
                                                    <td><input type="checkbox" class="checkBoxClass11" value="Yes" name="Recording_room[]" /> Yes
                                                    </td>
                                                    <td><input type="checkbox" class="checkBoxClass12" value="Yes" name="piano[]" /> Yes</td>
                                                    <td><input type="checkbox" class="checkBoxClass13" value="Yes" name="Painting[]" /> Yes</td>
                                                    <td><input type="text" class="form-control" name="Remarks[]"></td>
                                                </tr>`);

                string3 += (`<tr>
                                                    <th scope="row">${i}</th>

                                                    <td><input type="file" name="item[image${i}][]" multiple></td>

                                                </tr>`);
            }
            $('#tb1').append(string);
            $('#tb2').append(string2);
            $('#tb3').append(string3);
        })

    });
    </script>

    <script>
    $(document).ready(function() {
        for (let i = 1; i <= 13; i++) {
            $('#ckbCheckAll' + i).click(function() {
                $('.checkBoxClass' + i).prop('checked', $(this).prop('checked'));
            });
        }

    });
    $(document).ready(function() {
        for (let i = 1; i <= 9; i++) {
            $('#ckbCheckAllP' + i).click(function() {
                $('.checkBoxClassP' + i).prop('checked', $(this).prop('checked'));
            });
        }

    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {

        // Toolbar extra buttons
        var btnFinish = $('<button></button>').text('Finish')
            .addClass('btn btn-info')
            .on('click', function() {
                alert('Finish Clicked');
            });
        var btnCancel = $('<button></button>').text('Cancel')
            .addClass('btn btn-danger')
            .on('click', function() {
                $('#smartwizard').smartWizard("reset");
            });

        // Step show event
        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
            $("#prev-btn").removeClass('disabled');
            $("#next-btn").removeClass('disabled');
            if (stepPosition === 'first') {
                $("#prev-btn").addClass('disabled');
            } else if (stepPosition === 'last') {
                $("#next-btn").addClass('disabled');
            } else {
                $("#prev-btn").removeClass('disabled');
                $("#next-btn").removeClass('disabled');
            }
        });

        // Smart Wizard
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'arrows', // default, arrows, dots, progress
            // darkMode: true,
            transition: {
                animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
            },
            toolbarSettings: {
                toolbarPosition: 'bottom', // both bottom
                // toolbarExtraButtons: [btnFinish, btnCancel]
            },
            anchorSettings: {
                anchorClickable: true, // Enable/Disable anchor navigation
                enableAllAnchors: true, // Activates all anchors clickable all times
                markDoneStep: true, // add done css
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            },
        });

        // External Button Events
        $("#reset-btn").on("click", function() {
            // Reset wizard
            $('#smartwizard').smartWizard("reset");
            return true;
        });

        $("#prev-btn").on("click", function() {
            // Navigate previous
            $('#smartwizard').smartWizard("prev");
            return true;
        });

        $("#next-btn").on("click", function() {
            // Navigate next
            $('#smartwizard').smartWizard("next");
            return true;
        });


        // Demo Button Events
        $("#got_to_step").on("change", function() {
            // Go to step
            var step_index = $(this).val() - 1;
            $('#smartwizard').smartWizard("goToStep", step_index);
            return true;
        });


        $("#dark_mode").on("click", function() {
            // Change dark mode
            var options = {
                darkMode: $(this).prop("checked")
            };

            $('#smartwizard').smartWizard("setOptions", options);
            return true;
        });

        $("#is_justified").on("click", function() {
            // Change Justify
            var options = {
                justified: $(this).prop("checked")
            };

            $('#smartwizard').smartWizard("setOptions", options);
            return true;
        });

        $("#animation").on("change", function() {
            // Change theme
            var options = {
                transition: {
                    animation: $(this).val()
                },
            };
            $('#smartwizard').smartWizard("setOptions", options);
            return true;
        });

        $("#theme_selector").on("change", function() {
            // Change theme
            var options = {
                theme: $(this).val()
            };
            $('#smartwizard').smartWizard("setOptions", options);
            return true;
        });

    });
    </script>





</body>

</html>