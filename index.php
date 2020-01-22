<?php get_header(); ?>
<?php
  $postTag = "";
  if ( have_posts() ) {
    while (have_posts() ){
      the_post();
      $title = get_the_title();
      $post_link = get_the_permalink();
      $content = get_the_excerpt();

      $postTag = '<div>';
      $postTag .= '<a href="' . $post_link . '"><h2>' . $title . '</h2></a>';
      $postTag .= '<p>' . $content . '</p>';
      $postTag .= '</div>';

      echo $postTag;
?>
<?php
    }
  }
?>
<?php get_footer(); ?>