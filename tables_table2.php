<?php
include 'connect.php';
?>
<tr>    
    <?php
    $sql = "SELECT * FROM table_2;";
    $result = $con-> query($sql);
    if ($result-> num_rows > 0)
    {
    while ($row = $result-> fetch_assoc())
    {?>
        <tr>
            <td scope='row'><input type="hidden" name="orderid" value="<?php echo $row['order_id'];?>"><?php echo  $row['order_id']?> </td>
            <td scope='row'><input type="hidden" name="order" value="<?php  echo $row['orders'];?>"> <?php echo  $row['orders']?>  </td>
            <td scope='row'><input type="hidden" name="orderTot" value="<?php  echo $row['order_total'];?>"> <?php echo $torder = $row['order_total'] ?></span></i></td>
            <?php
            if ($row["status"] == "Served"){
                echo "<td scope='row'><i class='fas fa-check-circle green'></i>" . $row["status"] . "</td>";
            }
            else{
                echo "<td><i class='fas fa-circle yellow'></i>";    
            echo " <span class='ms-1'> " . $row["status"] . "</td>";
            }  
            ?>
            </span></i>
            </tr>
                <?php
        }    
    } 
    ?>                          
</tr>     