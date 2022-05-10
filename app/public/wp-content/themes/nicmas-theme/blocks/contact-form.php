<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'contact-form-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'contact-form';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field("contact-form_title");
$numbers = get_field("contact-form_numbers");
$emails = get_field("contact-form_emails");
$form_id = get_field("contact-form_form");

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <a id="<?php echo $title ?>"></a>
    <div class="container contact-form__container">
        <div class="contact-form__contacts">
            <h2 class="contact-form__title"><?php echo $title ?></h2>
            <?php
                if (have_rows("contact-form_numbers")):
                    while (have_rows("contact-form_numbers")):
                        the_row();
                        $text = get_sub_field("text");
                        $number = get_sub_field("number");
            ?>
                    <div class="contact-form__contact-block">
                        <p class="contact-form__contact-text"><?php echo $text ?></p>
                        <a class="contact-form__contact-link" href="tel:<?php echo $number ?>"><?php echo $number ?></a>
                    </div>
            <?php
                    endwhile;
                endif;
            ?>
            <div class="contact-form__contact-block">
                <p class="contact-form__contact-text">Пошта</p>
                <?php
                if (have_rows("contact-form_emails")):
                    while (have_rows("contact-form_emails")): the_row();
                        $email = get_sub_field("email");
                        ?>
                        <a class="contact-form__contact-link contact-form__contact-link--email" href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
                    <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
        <div class="relative">
            <div class="contact-form__form">
                <h3 class="contact-form__form-title">Зв'язатися з нами:</h3>
                <?php
                echo do_shortcode('[gravityform id="'.$form_id.'" title="false" description="false" ajax="true" tabindex="49"]')
                ?>
            </div>
        </div>
    </div>
</section>