<?php
$getCountries= "SELECT * FROM country ORDER BY country.country_name ASC";
$getCountries = mysqli_query($connect,$getCountries);
$countCountries =mysqli_num_rows($getCountries);
if($countCountries > 0)
{
    while($line=mysqli_fetch_object($getCountries))
    {
        $countriesId = $line -> country_id;
        $countries = $line -> country_name; 
        ?>
        <option value = "<?php echo $countriesId; ?>"><?php echo $countries; ?></option>
        <?php
    }
}
?>