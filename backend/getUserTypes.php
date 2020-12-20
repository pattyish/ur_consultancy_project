<?php
$getUserType = "SELECT * FROM user_type";
$getUserType = mysqli_query($connect,$getUserType);
$countType = mysqli_num_rows($getUserType);
if($countType > 0)
{
    while($line=mysqli_fetch_object($getUserType))
    {
        $typeId =$line -> user_type_id; 
        $type =$line -> user_type; 
        ?>
        <option value = "<?php echo $typeId; ?>"><?php echo $type; ?></option>
        <?php
    }
}
?>