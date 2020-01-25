<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="field is-grouped">
  <input type="hidden" value="post" name="post_type" id="post_type" />
    <p class="control">
      <label>
        <input type="search" class="input" placeholder="<?php echo esc_attr_x( '記事を探す', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
      </label>
    </p>
    <p class="control">
      <button class="button is-dark">検索</button>
    </p>
  </div>
</form>