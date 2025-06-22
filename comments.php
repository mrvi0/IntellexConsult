<?php
/**
 * Шаблон для отображения комментариев
 * 
 * @package Bankruptcy_Law_Pro
 */

// Если пост защищен паролем и пароль не введен, не показываем комментарии
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                printf(
                    /* translators: %s: post title */
                    esc_html__('Один комментарий к "%s"', 'bankruptcy-law-pro'),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: number of comments, 2: post title */
                    esc_html(_nx(
                        '%1$s комментарий к "%2$s"',
                        '%1$s комментариев к "%2$s"',
                        $comments_number,
                        'comments title',
                        'bankruptcy-law-pro'
                    )),
                    number_format_i18n($comments_number),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 60,
            ));
            ?>
        </ol>

        <?php
        // Навигация по комментариям
        the_comments_navigation();

        // Если комментарии закрыты и есть комментарии, показываем сообщение
        if (!comments_open()) :
        ?>
            <p class="no-comments"><?php esc_html_e('Комментарии закрыты.', 'bankruptcy-law-pro'); ?></p>
        <?php
        endif;
    endif;

    // Форма комментариев
    comment_form(array(
        'title_reply' => 'Оставить комментарий',
        'title_reply_to' => 'Ответить %s',
        'cancel_reply_link' => 'Отменить ответ',
        'label_submit' => 'Отправить комментарий',
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x('Комментарий', 'noun', 'bankruptcy-law-pro') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Ваш комментарий..."></textarea></p>',
        'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __('Ваш email не будет опубликован.', 'bankruptcy-law-pro') . '</span></p>',
        'fields' => array(
            'author' => '<p class="comment-form-author"><label for="author">' . __('Имя', 'bankruptcy-law-pro') . ' <span class="required">*</span></label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" aria-required="true" placeholder="Ваше имя" /></p>',
            'email' => '<p class="comment-form-email"><label for="email">' . __('Email', 'bankruptcy-law-pro') . ' <span class="required">*</span></label><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-required="true" placeholder="Ваш email" /></p>',
            'url' => '<p class="comment-form-url"><label for="url">' . __('Сайт', 'bankruptcy-law-pro') . '</label><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" placeholder="Ваш сайт (необязательно)" /></p>',
        ),
    ));
    ?>

</div><!-- #comments --> 