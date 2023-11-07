<?php
include 'connect.php';
?>
        <?php
            $sql = "SELECT * FROM order_list";
            $result = $con-> query($sql);

            if ($result-> num_rows > 0)
            {
            while ($row = $result-> fetch_assoc())
            {
                echo "<tr>
                        <td scope='row'>" . $row["table_num_order"] . 
                        "</td><td>" . $row["orders"] . "</td><td>";
                        if ($row["status"] == "Served")
                        {
                        echo "<i class='fas fa-check-circle green'></i>";
                        echo "<span class='ms-1'> " . $row["status"] . "</span>";
                        }
                        else if ($row["status"] == "Pending")
                        {
                        echo "<i class='fas fa-circle yellow'></i>";
                        echo "<span class='ms-1'> " . $row["status"] . "</span></td></tr>";  
                        }                                           
            } 
            }
        ?>
        