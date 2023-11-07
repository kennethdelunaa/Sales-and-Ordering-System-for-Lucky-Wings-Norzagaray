<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="sweetalert2.all.min.js"> </script>
    <script src="sweetalert.min.js"></script>
</head>
<body>
<script>
  $(document).ready(function(){
    $("button").click(function(){
      $("#comments").load("tables.php", {

      });
    });
  });
</script>
<script>
    $('.delete').on('click',function (e){
        e.preventDefault();
        var self = $(this);
        alert(self.attr('href'));
        console.log(self.data('title'));
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
        url: "ajax_delete.php",
        type: "post",
        data: values ,
        success: function (response) {
           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
         });
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            location.href=self.attr('href');
        }
        })
    })
</script>
<script>
// function myFunction() {
//   var input, filter, table, tr, td, i, txtValue;
//   input = document.getElementById("myInput");
//   filter = input.value.toUpperCase();
//   table = document.getElementById("myTable");
//   tr = table.getElementsByTagName("tr");
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[1];
//     if (td) {
//       txtValue = td.textContent || td.innerText;
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }       
//   }
// }
</script>



</body>
</html>