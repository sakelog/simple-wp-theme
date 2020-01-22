<?php get_header(); ?>
<?php
  $postTag = "";
  if ( have_posts() ) {
    while (have_posts() ){
      the_post();
      $title = get_the_title();
      $post_link = esc_url( get_the_permalink() );
      $post_content = get_the_excerpt();

      $postTag = '<div>';
      $postTag .= '<a href="' . $post_link . '"><h2>' . $title . '</h2></a>';
      $postTag .= '<p>' . $post_content . '</p>';
      $postTag .= '</div>';

      echo $postTag;
?>
<?php
    }
  }
?>
<?php get_footer(); ?>