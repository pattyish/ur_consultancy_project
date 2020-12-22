<?php
$currentUserType = $MYUserType;
$getUserType = "SELECT * FROM user_type";
$getUserType = mysqli_query($connect,$getUserType);
$countType = mysqli_num_rows($getUserType);
if($countType > 0)
{
    while($line=mysqli_fetch_object($getUserType))
    {
        $typeId =$line -> user_type_id; 
        $type =$line -> user_type; 
        if($currentUserType == 2 && ($typeId == 1 || $typeId == 2))
        {
            continue;
        }
        else
        {
            ?>
            <option value = "<?php echo $typeId; ?>"><?php echo $type; ?></option>
            <?php
        }
        /*if($currentUserType == 1)
        {
            ?>
            <option value = "<?php echo $typeId; ?>"><?php echo $type; ?></option>
            <?php
            
        }
        else if($currentUserType == 2)
        {
            if($typeId != 1 && $typeId != 2)
            {
                ?>
                <option value = "<?php echo $typeId; ?>"><?php echo $type; ?></option>
                <?php   
            }
        }
        */
    }
}
?>