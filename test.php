<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <title>Document</title>
</head>
<body>
    <script>
        Swal.fire({
            title: '<strong>Add Account</strong>',
            html:
                "<form action='upload.php' method='POST'>" +
                    "<input type='hidden' name='id' value='<?php echo $id; ?>'>" +
                    "<div class='input-group m-3'>" +
                        "<div class='row input-group mb-3'>" +
                        "<div class='input-group-prepend'>" +
                            "<span class='input-group-text' id='basic-addon1'>Username</span>" +
                        "</div>" +
                        "<input type='text' class='form-control' name='username' placeholder='Username' aria-label='Username' aria-describedby='basic-addon1' required>" +
                    "</div>" +
                    "<div class='mb-3'>" +
                        "<div class='row'>" +
                            "<span class='input-group-text' id='basic-addon1'>Position</span>" +
                            "<div class='radio mx-auto'>" +
                                "<input label='Admin' type='radio' id='position' name='position' value='Admin'  required>" +
                                "<input label='Cashier' type='radio' id='position' name='position' value='Cashier'  required>" +
                            "</div>" +
                        "</div>" +
                    "</div>" +
                    "<div class='row input-group mb-2'>" +
                        "<div class='input-group-prepend'>" +
                            "<span class='input-group-text' id='basic-addon1'>Password</span>" +
                        "</div>" +
                        "<input type='password' class='form-control' name='password' id='password' placeholder='Password' aria-label='Password' aria-describedby='basic-addon1' required>" +
                    "</div>" +
                    "<div class='form-check mb-5'>" +
                        "<input class='form-check-input' type='checkbox' value=' onclick='showpassword()' id='defaultCheck1'>" +
                        "<label class='form-check-label' for='defaultCheck1'>" +
                            "Show Password" +
                        "</label>" +
                    "</div>" +
                    "<div class='button p-1 mt-4' style='position: absolute; right: 20px; top: 160px;'>" +
                        "<input type='submit' class='btn btn-dark' name='addaccount' value='Submit'>" +
                    "</div>" +
                    "</div>" +
                "</form>",
            showCloseButton: false,
            showConfirmButton: false,
            focusConfirm: false
            })
        </script>
</body>
</html>
    