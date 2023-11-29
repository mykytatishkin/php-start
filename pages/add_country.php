<h3>Add Country</h3>

<?php
include_once('./pages/classes.php');
if( !isset($_POST['submit']) ){
?>

<form action="index.php?page=2" method="post" enctype="multipart/form-data">
<div class="form-group">
    <input type="text" name="name" placeholder="Country Name" class="form-control" />
</div>
<div class="form-group">
    <input type="text" name="capital" placeholder="Capital" class="form-control" />
</div>
<div class="form-group">
    <input type="text" name="population" placeholder="Population" class="form-control" />
</div>
<div class="form-group">
    <input type="file" name="flag" class="form-control" />
</div>
<div class="form-group">
    <input type="submit" name="submit" value="Add Country" class="btn btn-success" />
</div>
</form>   

<?php
}
else{
    $country = new Country($_POST['name'], $_POST['capital'], $_POST['population'], $_POST['flag']);
    var_dump($country);
    CountryRepository::addCountry($country);
    header('Location:./index.php?page=1');
?>
<?php
}
?>