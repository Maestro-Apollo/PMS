<?php
session_start();
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
            $flat = addslashes(trim($_POST['flat']));
            $no_rooms = addslashes(trim($_POST['no_rooms']));
            $entry_password = addslashes(trim($_POST['entry_password']));

            $sql1 = "INSERT INTO `building_info` (`building_id`, `code`, `district`, `street`, `building`, `floor`, `flat`, `no_room`, `enter_password`, `building_created_at`) VALUES (NULL, '$code', '$district', '$street', '$building', '$floor', '$flat', '$no_rooms', '$entry_password', CURRENT_TIMESTAMP)";

            $res1 = mysqli_query($this->link, $sql1);

            for ($i = 0; $i < count($_POST['gross_area']); $i++) {
                $gross_area = $_POST['gross_area'][$i];
                $salesable_area = $_POST['salesable_area'][$i];
                $rent = $_POST['rent'][$i];
                $Cargo_Lift = $_POST['Cargo_Lift'][$i];
                $Customer_Lift = $_POST['Customer_Lift'][$i];
                $hr = $_POST['hr'][$i];
                $Windows = $_POST['Windows'][$i];
                $Lavatory = $_POST['Lavatory'][$i];
                $Shower = $_POST['Shower'][$i];
                $Sink = $_POST['Sink'][$i];
                $Wide_door = $_POST['Wide_door'][$i];
                $Brickes_wall = $_POST['Brickes_wall'][$i];
                $Seprate_room = $_POST['Seprate_room'][$i];
                $Electronic_keys = $_POST['Electronic_keys'][$i];
                $Wifi = $_POST['Wifi'][$i];
                $Remarks = addslashes(trim($_POST['Remarks'][$i]));
                $room_num = $i++;

                $sql2 = "INSERT INTO `facilties` (`facilties_id`, `gross_area`, `salesable_area`, `rent`, `cargo_lift`, `customer_lift`, `tf_hours`, `windows`, `lavatory`, `shower`, `sink`, `wide_door`, `brickes_wall`, `seprate_room`, `electronic_keys`, `wifi`, `remarks`, `room_number`, `facilties_created_at`, `code`) VALUES (NULL, '$gross_area', '$salesable_area', '$rent', '$Cargo_Lift', '$Customer_Lift', '$hr', '$Windows', '$Lavatory', '$Shower', '$Sink', '$Wide_door', '$Brickes_wall', '$Seprate_room', '$Electronic_keys', '$Wifi', '$Remarks', '$room_num', CURRENT_TIMESTAMP, '$code')";

                mysqli_query($this->link, $sql2);
            }

            for ($j = 0; $j < count($_POST['Individual']); $j++) {
                $Individual = $_POST['Individual'][$j];
                $Seprate = $_POST['Seprate'][$j];
                $Studio = $_POST['Studio'][$j];
                $Yoga = $_POST['Yoga'][$j];
                $Class = $_POST['Class'][$j];
                $Overnight = $_POST['Overnight'][$j];
                $Warehouse_office = $_POST['Warehouse_office'][$j];
                $Beauty = $_POST['Beauty'][$j];
                $Upstair_shop = $_POST['Upstair_shop'][$j];
                $Upstair_shop = $_POST['Upstair_shop'][$j];
                $Band = $_POST['Band'][$j];
                $Recording_room = $_POST['Recording_room'][$j];
                $piano = $_POST['piano'][$j];
                $Painting = $_POST['Painting'][$j];
                $Remarks2 = addslashes(trim($_POST['Remarks'][$j]));
                $room_no = $j++;


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

            for ($ir = 0; $ir < count($_FILES['image']['name']); $ir++) {
                $ir++;
                $files = date("d-m-Y") . '_' . date("h-i-sa") . '_' . '@' . $_FILES['image']['name'][$ir];

                $target = 'files/' . $files;
                move_uploaded_file($_FILES['image']['tmp_name'][$ir], $target);

                if ($_FILES['image']['tmp_name'][$ir] != '') {
                    $sqlFile = "INSERT INTO `photos` (`image_id`, `image`, `room_number`, `code`, `image_created_at`) VALUES (NULL, '$files', '$ir', '$code', CURRENT_TIMESTAMP)";
                    mysqli_query($this->link, $sqlFile);
                }
            }
        }
    }
}
$obj = new signInUp;
$objSignIn = $obj->signInFunction();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
                                    <input type="text" class="form-control mt-3" placeholder="Code" name="code"
                                        required>
                                    <input type="text" class="form-control mt-3" placeholder="District" name="district"
                                        required>
                                    <input type="text" class="form-control mt-3" placeholder="Street" name="street"
                                        required>
                                    <input type="text" class="form-control mt-3" placeholder="Building" name="building"
                                        required>
                                    <input type="text" class="form-control mt-3" placeholder="Floor" name="floor"
                                        required>
                                    <input type="text" class="form-control mt-3" placeholder="Flat" name="flat"
                                        required>
                                    <input type="text" class="form-control mt-3" placeholder="No of Rooms"
                                        name="no_rooms" id="no_rooms" required>
                                    <input type="text" class="form-control mt-3" placeholder="Entry Password"
                                        name="entry_password" required>
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
                                                    <th scope="col">Cargo Lift</th>
                                                    <th scope="col">Customer Lift</th>
                                                    <th scope="col">24 hours</th>
                                                    <th scope="col">Windows</th>
                                                    <th scope="col">Lavatory</th>
                                                    <th scope="col">Shower 淋浴</th>
                                                    <th scope="col">Sink 下沉</th>
                                                    <th scope="col">Wide door</th>
                                                    <th scope="col">Brickes wall</th>
                                                    <th scope="col">Seprate room</th>
                                                    <th scope="col">Electronic keys</th>
                                                    <th scope="col">Wifi 无线上网</th>
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
                                                    <th scope="col">Individual</th>
                                                    <th scope="col">Seprate</th>
                                                    <th scope="col">Studio</th>
                                                    <th scope="col">Yoga</th>
                                                    <th scope="col">Class</th>
                                                    <th scope="col">Overnight</th>
                                                    <th scope="col">Warehouse & office</th>
                                                    <th scope="col">Beauty</th>
                                                    <th scope="col">Upstair shop</th>
                                                    <th scope="col">Band</th>
                                                    <th scope="col">Recording room</th>
                                                    <th scope="col">1 to 1 piano</th>
                                                    <th scope="col">Painting</th>
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
                                        name="charge" required>
                                    <input type="tel" class="form-control mt-3" placeholder="Tel 1" name="tel1"
                                        required>
                                    <input type="tel" class="form-control mt-3" placeholder="Tel 2" name="tel2">
                                    <input type="tel" class="form-control mt-3" placeholder="Tel 3" name="tel3">
                                    <input type="text" class="form-control mt-3" placeholder="Landlord Name"
                                        name="landlord_name" required>
                                    <input type="text" class="form-control mt-3" placeholder="Bank" name="bank"
                                        required>
                                    <input type="text" class="form-control mt-3" placeholder="Bank account"
                                        name="bank_account" required>
                                    <input type="text" class="form-control mt-3" placeholder="Remake" name="remake"
                                        required>
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
                                                    <td><input type="text" class="form-control" name="gross_area[]">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="salesable_area[]">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="rent[]"></td>
                                                    <td><select name="Cargo_Lift[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Customer_Lift[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><select name="hr[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Windows[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Lavatory[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Shower[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Sink[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Wide_door[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Brickes_wall[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Seprate_room[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><select name="Electronic_keys[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><select name="Wifi[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><input type="text" class="form-control" name="Remarks[]"></td>
                                                </tr>`);

                string2 += (`<tr>
                                                    <th scope="row">${i}</th>

                                                    <td><select name="Individual[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Seprate[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><select name="Studio[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Yoga[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Class[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Overnight[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Warehouse_office[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Beauty[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Upstair_shop[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Band[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><select name="Recording_room[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><select name="piano[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><select name="Painting[]" id="" class="form-control">
                                                            <option value="Yes" selected>Yes</option>
                                                            <option value="No">No</option>
                                                        </select></td>
                                                    <td><input type="text" class="form-control" name="Remarks[]"></td>
                                                </tr>`);

                string3 += (`<tr>
                                                    <th scope="row">${i}</th>

                                                    <td><input type="file" name="image[]" multiple></td>

                                                </tr>`);
            }
            $('#tb1').append(string);
            $('#tb2').append(string2);
            $('#tb3').append(string3);
        })

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