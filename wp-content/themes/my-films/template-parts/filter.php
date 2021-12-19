<form action="<?php echo get_post_type_archive_link( 'films' ); ?>" method="get">

    <div class="mb-3">
        <label for="filter_released_on" class="form-label">Released On</label>
        <input type="text" name="filter_released_on" class="form-control"
               id="filter_released_on" value="<?php echo $_GET['filter_released_on']; ?>">
    </div>

    <div class="mb-3">
        <label for="filter_pg" class="form-label">PG </label>
        <input type="text" name="filter_pg" class="form-control"
               id="filter_pg" value="<?php echo $_GET['filter_pg']; ?>">
    </div>

    <div class="mb-3">
        <label for="filter_rating" class="form-label">Rating </label>
        <input type="text" name="filter_rating" class="form-control"
               id="filter_rating" value="<?php echo $_GET['filter_rating']; ?>">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
