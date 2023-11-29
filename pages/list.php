<h3>List countries</h3>

<?php
include_once('./pages/classes.php');
$list = CountryRepository::getCountries();

echo '<table class="table table-striped">';
    echo '<thead>';
        echo '<tr>';
            echo '<th>Id</th><th>Name</th><th>Capital</th><th>Population</th><th>Flag</th>';
        echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
foreach($list as $key => $v) {
    echo '<tr>';
        echo '<td>'.$v->id.'</td>';
        echo '<td>'.$v->name.'</td>';
        echo '<td>'.$v->capital.'</td>';
        echo '<td>'.$v->population.'</td>';
        echo '<td>'.$v->flag.'</td>';
    echo '</tr>';
}
    echo '</tbody>';
echo '</table>';
?>