<?php
require './class/database.php';
session_start();
class Property extends database
{
}
$obj = new Property;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('layout/style.php'); ?>

    <style>
    body {
        font-family: 'Lato', sans-serif;

    }

    .navbar-brand {
        width: 7%;
    }

    .bg_color {
        background-color: #274472 !important;
    }

    .divider {
        background-color: #274472;
        height: 5px;
        width: 75%;
    }
    </style>

</head>

<body class="bg-light">
    <?php include('layout/navbar.php'); ?>

    <section>
        <div class="container bg-white">

            <form action="" class="p-3">
                <label for="" class="mt-3 font-weight-bold">Building Info</label>
                <input type="text" name="building" class="form-control ">
                <p class="mt-3 mb-0 font-weight-bold">Facilities</p>
                <p class="mb-0">Gross Area</p>

                <div class="row">
                    <div class="col-6">
                        <input type="text" name="gross1" placeholder="From" class="form-control ">

                    </div>
                    <div class="col-6">
                        <input type="text" name="gross2" placeholder="To" class="form-control ">

                    </div>
                </div>
                <p class="mt-3 mb-0">Sailable Area</p>
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="sailable1" placeholder="From" class="form-control ">

                    </div>
                    <div class="col-6">
                        <input type="text" name="sailable2" placeholder="To" class="form-control ">

                    </div>
                </div>
                <p class="mt-3 mb-0">Price Range</p>
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="price1" placeholder="From" class="form-control ">

                    </div>
                    <div class="col-6">
                        <input type="text" name="price2" placeholder="To" class="form-control ">

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Cargo" value="Yes" id="Cargo">
                            <label class="form-check-label" for="Cargo">Cargo Lift</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Customer" value="Yes" id="Customer">
                            <label class="form-check-label" for="Customer">Customer Lift</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="hours" value="Yes" id="hours">
                            <label class="form-check-label" for="hours">24 hours</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Windows" value="Yes" id="Windows">
                            <label class="form-check-label" for="Windows">Windows</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Lavatory" value="Yes" id="Lavatory">
                            <label class="form-check-label" for="Lavatory">Lavatory</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Shower" value="Yes" id="Shower">
                            <label class="form-check-label" for="Shower">Shower</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Sink" value="Yes" id="Sink">
                            <label class="form-check-label" for="Sink">Sink</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" name="Door" value="Yes" class="form-check-input" id="Door">
                            <label class="form-check-label" for="Door">Wide Door</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Wall" value="Yes" id="Wall">
                            <label class="form-check-label" for="Wall">Bricked Wall</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="SeparateRoom" name="SeparateRoom"
                                value="Yes">
                            <label class="form-check-label" for="SeparateRoom">Separate room</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Keys" value="Yes" id="Keys">
                            <label class="form-check-label" for="Keys">Electronic Keys</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" name="Wifi" value="Yes" class="form-check-input" id="Wifi">
                            <label class="form-check-label" for="Wifi">Wifi</label>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 font-weight-bold">Types</p>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="individual" name="individual"
                                value="Yes">
                            <label class="form-check-label" for="individual">Individual</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Separate" value="Yes" id="seprate">
                            <label class="form-check-label" for="seprate">Separate</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Studio" value="Yes" id="studio">
                            <label class="form-check-label" for="studio">Studio</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Yoga" value="Yes" id="yoga">
                            <label class="form-check-label" for="yoga">Yoga</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Class2" value="Yes" id="class2">
                            <label class="form-check-label" for="class2">Class</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="overnight" name="Overnight" value="Yes">
                            <label class="form-check-label" for="overnight">Overnight</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="warehouse_office" name="Warehouse"
                                value="Yes">
                            <label class="form-check-label" for="warehouse_office">Warehouse office</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Beauty" value="Yes" id="beauty">
                            <label class="form-check-label" for="beauty">Beauty</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="upstair_shop" name="Shop" value="Yes">
                            <label class="form-check-label" for="upstair_shop">Upstairs shop</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Band" value="Yes" id="band">
                            <label class="form-check-label" for="band">Band</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="recording_room" name="Recording"
                                value="Yes">
                            <label class="form-check-label" for="recording_room">Recording room</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Piano" value="Yes" id="piano">
                            <label class="form-check-label" for="piano">Piano</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="Painting" value="Yes" id="painting">
                            <label class="form-check-label" for="painting">Painting</label>
                        </div>
                    </div>

                </div>
                <input type="submit" value="Search" class="btn btn-block log_btn">

            </form>

        </div>

    </section>


    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>

    <script src="js/datepicker.js"></script>
    <script src="js/jquery.multifile.js"></script>
    <script src="js/jquery.multifile.preview.js"></script>
    <!-- <script>
    $('.multifile').multifile();
    </script> -->




    <script>
    $('#myTab li:first-child a').tab('show')
    </script>
    <!-- <script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#output3').prepend(
                '<div class="row" id="row' + i +
                '"><div class="col-10"><div class="custom-file mt-4"><input type="file" name="booking_file[]" class="custom-file-input" id="customFile' +
                i + '"><label class="custom-file-label" for="customFile' + i +
                '">Choose file</label></div></div><div class="col-2"><button type="button" name="remove" id="' +
                i +
                '" class="btn btn-danger mt-4 btn_remove"><i class="fas fa-minus"></i></button></div></div>'
            );

        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
    </script> -->
</body>

</html>