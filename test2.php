<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="number" id="code">
    <br>
    <br>
    <div id="output"></div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $('#code').keyup(function() {
            let myCode = $('#code').val();

            if (myCode == '') {
                $('#output').empty();
            }
            for (let i = 1; i <= myCode; i++) {
                $('#output').append(i + '<br>');
            }
        })
    });
    </script>
</body>

</html>