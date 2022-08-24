<section class="comments">
  <h4 class="comment_head">コメントをお待ちしております</h4>
  <?php
  // コメントリストの表示
  if(have_comments()):
  ?>
  <p><?php comments_number('コメントはありません','コメントが一件あります','コメントが%件あります',); ?></p>
      <ol class="comments-list">
        <?php wp_list_comments('callback=custom_comment_list'); ?>
      </ol>
  <?php
  endif;
  $pagenate_comment_links_args = [
    'prev_text' => '←前のコメントページへ',
    'next_text' => '次のコメントページへ',
    ];
  paginate_comments_links($pagenate_comment_links_args);
  // ここからコメントフォーム
  $comments_args = array(
    'fields' => array(
      'author' => '<p class="comment-form-author">
                    <label for="author">ハンドルネーム' . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245" />
                  </p>',
      'email'  => '',
      'url'    => '',
      'cookies' => '',
    ),
    'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea></p>',
    'comment_notes_before' => '',
    'comment_notes_after'  => '',
    'title_reply'          => 'お気軽にコメントをどうぞ。',
    'label_submit'         => 'コメントを残す',
  );
  comment_form($comments_args); ?>
</section>