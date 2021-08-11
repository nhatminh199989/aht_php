<h1>Edit cars</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="title">Brand</label>
        <input type="text" class="form-control" id="brand" placeholder="Enter car brand" name="brand" value ="<?php if (isset($car->brand)) echo $car->brand;?>">
    </div>

    <div class="form-group">
        <label for="description">Type</label>
        <input type="text" class="form-control" id="description" placeholder="Enter car type" name="type" value ="<?php if (isset($car->type)) echo $car->type;?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>