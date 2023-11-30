<h3>Gallery</h3>

<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-6">
    <form action="index.php?page=3" method="post" enctype="multipart/form-data">
        <select name="countryId">
            <option value="0">Select Country</option>
<?php
    $list = CountryRepository::getCountries();
    foreach($list as $k => $v) {
        echo '<option value="'.$v->id.'">'.$v->name.'</option>';
    }
?>
        </select>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-6">
        
            <div class="form-group">
                <input type="file" name="picture[]" accept="image/*" multiple/>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload" class="btn btn-dark" />
            </div>
        </form>
    </div>
<?php
    if(isset($_POST['submit'])) {
        $countryId = $_POST['countryId'];
        foreach ($_FILES['picture']['name'] as $k=>$value)
        {
            if($_FILES['picture']['error'][$k] != 0) continue;
                if( is_uploaded_file($_FILES['picture']['tmp_name'][$k]) ) {
                    $data = file_get_contents($_FILES['picture']['tmp_name'][$k]);
                    CountryRepository::addPicture($countryId, $data);
                }
        }
    }
?>
</div>
<div class="row">
    <?php
        // TODO : Create method getAllPictures($countryId) in class CountryRepository
        // TODO : Call method getAllPictures($countryId) on this page and get all returned pictures into $picture[]
        // TODO : Create carousel for $picture[]
    ?>
</div>