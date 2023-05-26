<form action="<?php echo home_url(); ?>" id="search-form" method="get" class="ml-auto " role="search">
	<div class="form-row align-items-center">
        <div class="form-group col-sm-9">
            <input type="search" name="s" id="s" type="text" class="form-control" value="<?php echo get_search_query() ?>" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
        </div>
        <div class="form-group col-sm-3">
            <button type="submit" class="arrow-link"> Поиск
                <span class="icon">

                </span>
            </button>
        </div>
    </div>
</form>