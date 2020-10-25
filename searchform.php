<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="form__item-wrapper">
    <label>
      <input type="search" class="search-field form__input" placeholder="検索" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
  </div>
</form>