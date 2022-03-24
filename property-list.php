<?php
session_start();


// $name = "'" . $_SESSION['name'] . "'";
// echo $name;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('layout/style.php'); ?>
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
    <style>
    body {
        font-family: 'Lato', sans-serif;

    }

    table.dataTable {
        border-collapse: collapse !important;
    }

    .navbar-brand {
        width: 7%;
    }

    .bg_color {
        background-color: #274472 !important;
    }

    /* th,
    td {
        font-size: 10px;
    } */
    </style>

</head>

<body class="bg-light">
    <?php include('layout/navbar.php'); ?>

    <section>
        <div class="container bg-white pr-4 pl-4  log_section pb-5 pt-lg-4">


            <!-- <h4 class="font-weight-bold pt-5 text-center">Booking History</h4> -->
            <!-- <form action="">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="name" data-toggle="datepicker" class="form-control mt-4 p-4  bg-light"
                            placeholder="From Date" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" data-toggle="datepicker" name="name" class="form-control mt-4 p-4  bg-light"
                            placeholder="To Date" required>
                    </div>
                    <div class="col-md-4">
                        <select name="" class="form-control mt-4  bg-light" id="">
                            <option value="">Choose an option</option>
                            <option value="">Done</option>
                            <option value="">Incomplete</option>
                        </select>
                    </div>
                </div>
                <button name="signup" type="submit" class="btn font-weight-bold log_btn mt-4">Calculate</button>
            </form> -->


            <h4 class="font-weight-bold pt-5 text-center">Building Info</h4>
            <div class="table-responsive">

                <table id="userTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>District</th>
                            <th>Street</th>
                            <th>Building</th>


                        </tr>
                    </thead>


                </table>
            </div>

        </div>

    </section>


    <?php include('layout/footer.php'); ?>

    <?php include('layout/script.php') ?>
    <script src="js/datepicker.js"></script>


    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: false,
            "pageLength": 50,

        });
    });
    $('[data-toggle="datepicker"]').datepicker({
        autoClose: true,
        viewStart: 2,
        format: 'dd/mm/yyyy',

    });
    </script>
    <script>
    var userDataTable = $('#userTable').DataTable({
        'processing': true,
        'serverSide': true,
        'columnDefs': [{
            orderable: false,
            targets: 0
        }],
        'serverMethod': 'post',
        "pageLength": 50,
        'ajax': {
            'url': 'ajax-property-list.php'
        },
        'columns': [{
            data: 'code'
        }, {
            data: 'district'
        }, {
            data: 'street'
        }, {
            data: 'building'
        }, ]
    });
    </script>
    <script>
    let land_com = document.querySelector('input[name="land_com"]');
    let tenant_com = document.querySelector('input[name="tenant_com"]');
    let agent_com = document.querySelector('input[name="agent_com"]');

    agent_com.addEventListener('keyup', () => {
        let agent_com = document.querySelector('input[name="agent_com"]').value;
        let agent_com_per = ((land_com
            .value) === '') ? 0 : (document.querySelector('input[name="agent_com_per"]').value = parseFloat(
            ((
                parseFloat(
                    land_com
                    .value) * parseFloat(
                    agent_com)) / 100)));

        let tenant_com_per = ((tenant_com.value) === '') ? 0 : document.querySelector(
            'input[name="tenant_com_per"]').value = parseFloat(((
            parseFloat(
                tenant_com.value) * parseFloat(
                agent_com)) / 100));
        final_calc(agent_com_per, tenant_com_per);
        final_calc2(document.querySelector('input[name="land_com"]').value, document.querySelector(
            'input[name="tenant_com"]').value);
    });


    land_com.addEventListener('keyup', () => {
        // let agent_com_per = ;
        let agent_com = document.querySelector('input[name="agent_com"]').value;
        let agent_com_per = document.querySelector('input[name="agent_com_per"]').value = parseFloat(((
            parseFloat(
                land_com
                .value) * parseFloat(
                agent_com)) / 100));
        final_calc(agent_com_per, document.querySelector('input[name="tenant_com_per"]').value);
        final_calc2(document.querySelector('input[name="land_com"]').value, document.querySelector(
            'input[name="tenant_com"]').value);
    });

    tenant_com.addEventListener('keyup', () => {
        // let agent_com_per = ;

        let agent_com = document.querySelector('input[name="agent_com"]').value;
        let tenant_com_per = document.querySelector('input[name="tenant_com_per"]').value = parseFloat(((
            parseFloat(
                tenant_com.value) * parseFloat(
                agent_com)) / 100));
        final_calc(document.querySelector('input[name="agent_com_per"]').value, tenant_com_per);
        final_calc2(document.querySelector('input[name="land_com"]').value, document.querySelector(
            'input[name="tenant_com"]').value);

        /* let b = document.querySelector('input[name="tenant_com"]').value;
        let a = document.querySelector('input[name="land_com"]').value;

        tot = ((100 - agent_com) / 100) * (a + b);

        console.log(a, b); */
    });

    function final_calc(agent_com_per, tenant_com_per) {
        agent_com_per = (agent_com_per === '') ? 0 : parseFloat(agent_com_per);
        tenant_com_per = (tenant_com_per === '') ? 0 : parseFloat(tenant_com_per);
        document.querySelector('input[name="company_com"]').value = agent_com_per + tenant_com_per;
    }

    function final_calc2(a, b) {
        let agent_com = document.querySelector('input[name="agent_com"]').value;
        a = (a === '') ? 0 : parseFloat(a);
        b = (b === '') ? 0 : parseFloat(b);
        document.querySelector('input[name="tcc"]').value = (a + b) * (100 - agent_com) / 100;
    }
    </script>
</body>

</html>