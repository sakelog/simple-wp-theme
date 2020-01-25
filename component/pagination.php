<?php
$paginate_settings = array(
      'show_all'           => False,
      'end_size'           => 1,
      'mid_size'           => 2,
      'prev_next'          => True,
      'prev_text'          => '前へ',
      'next_text'          => '次へ',
      'type'               => 'list',
    );

$paginationTag = '<nav class="pagination">';
$paginationTag .= paginate_links($paginate_settings);
$paginationTag .= '</nav>';

echo $paginationTag;
?>