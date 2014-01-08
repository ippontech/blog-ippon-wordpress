<form action="/" method="get" role="form">
    <div class="input-group input-group-sm">
        <input type="text" class="form-control" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Rechercher ..."/>
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default"><i class="icon-search"></i></button>
        </span>
    </div>
</form>