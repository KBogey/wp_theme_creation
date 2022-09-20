<?php
/**
 * Mise en forme des champ du formulaire des commentaires.
 *
 * @param array $fields Les inputs de commentaires.
 * @returns array $fields Les inputs mis en forme pour bootstrap.
 *
 * @since 1.0
 * @author Greg
 * @see https://developer.wordpress.org/reference/hooks/comment_form_fields/
 *
 */
function ch_filter_comment_form_fields($fields): array
{
//    var_dump($fields);
    // Je crée mes variable pour la traduction
    $placeholder_author = esc_attr(__('Your name*', 'choucroute'));
    $placeholder_email = esc_attr(__('Your email*', 'choucroute'));
    $placeholder_url = esc_attr(__('Your website url', 'choucroute'));
    $label_cookie = esc_html(__('Save my name and email in this browser for the next time I comment', 'choucroute'));

    // Je modifie les inputs du tableau $fields renvoyé par wordpress
    $fields["author"] = "<div class='my-2'><label for='author' class='d-none'>$placeholder_author</label><input class='form-control' type='text' name='author' id='author' placeholder='$placeholder_author' required /></div>";
    $fields["email"] = "<div class='mb-2'><label for='email' class='d-none'>$placeholder_email</label><input class='form-control' type='email' name='email' id='email' placeholder='$placeholder_email' /></div>";
    $fields["url"] = "<div class='mb-2'><label for='url' class='d-none'>$placeholder_url</label><input class='form-control' type='url' name='url' id='url' placeholder='$placeholder_url'/></div>";
    $fields["cookies"] = "<div class='form-check mb-2'><input class='form-check-input' type='checkbox' id='cookie' required /><label for='cookie'>$label_cookie</label></div>";
    return $fields;
}
add_filter('comment_form_default_fields', 'ch_filter_comment_form_fields');

/**
 * Style du bouton d'envoi des commentaires.
 *
 * @since Greg 1.0
 * @author Greg
 * @see https://developer.wordpress.org/reference/hooks/comment_form_submit_button/
 */
function  ch_filter_comment_form_submit_button() {
    return '<button class="mt-3 btn btn-dark" type="submit">'. __("Send message", "choucroute") .'</button>';
}
add_filter('comment_form_submit_button', 'ch_filter_comment_form_submit_button');