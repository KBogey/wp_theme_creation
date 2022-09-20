<div id="ch-comments-container" class="bg-secondary text-light py-3 px-4 my-4 rounded shadow-lg">
    <!--    --><?php
    if (have_comments()) {
        wp_list_comments( array(
            'style'      => 'div',
            'avatar_size' => 50,
        ) );
        echo "<hr>";
    }

    $current_user = wp_get_current_user();
    $textarea_placeholder = __('Your comment*', 'choucroute');

    comment_form(array(
        'title_reply' => __('Leave a Comment', 'choucroute'),
        'comment_field' =>
            "<div class='form-group'>
                <label for='comment' class='d-none'>$textarea_placeholder</label>
                <textarea id='comment' class='form-control' name='comment' cols='45' rows='8' aria-required='true' placeholder='$textarea_placeholder'></textarea>
            </div>",
        'comment_notes_after' => '<div class="text-small text-end">' . __( '* Required fields', 'choucroute' ) . '</div>',
        'logged_in_as' =>
            '<p class=logged-in-as>'
            . sprintf(__( 'Logged in as <a href=%1$s>%2$s</a>. <a href=%3$s title=<?>Log out?</a>',
                'choucroute' ),
                admin_url( 'profile.php' ),
                $current_user->user_login ,
                wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
    ));
    ?>
</div>