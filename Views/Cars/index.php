<h1>Car</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <a href="<?php echo WEBROOT ?>cars/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new car</a>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Type</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <?php
        foreach ($cars as $car)
        {
            echo '<tr>';
            echo "<td>" . $car->id . "</td>";
            echo "<td>" . $car->brand . "</td>";
            echo "<td>" . $car->type . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='".WEBROOT."cars/edit/" . $car->id . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='".WEBROOT."cars/delete/" . $car->id . "' class='btn btn-danger btn-xs' onclick=\"return confirm('are you sure?')\" ><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>