</main>
<?php
    $logo = get_field('logo', 'option');
    $facebook = get_field('facebook', 'option');
    $instagram = get_field('instagram', 'option');
    $youtube = get_field('youtube', 'option');
    $phoneNumber = get_field('phone_number', 'option');
    $email = get_field('email', 'option');
    $address = get_field('address', 'option');
?>
<footer class="footer">
    <div class="container">
        <div class="footer-mobile">
            <div class="footer-mobile__top">
                <?php if ($phoneNumber) : ?>
                    <a class="phoneNumber" href="<?php echo $phoneNumber['url']; ?>">
                        <?php echo $phoneNumber['title']; ?>
                    </a>
                <?php endif; ?>
                <?php if ($email) : ?>
                    <a class="email" href="<?php echo $email['url']; ?>" target="_blank">
                        <?php echo $email['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="footer-mobile__right">
                <?php if ($address) : ?>
                    <a class="address" href="<?php echo $address['url']; ?>" target="_blank">
                        <?php echo $address['title']; ?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="footer-mobile__middle">
                <span>Ми в соцмережах:</span>
                <div class="footer-mobile__socials">
                    <?php if ($facebook) : ?>
                        <a href="<?php echo $facebook['url']; ?>" target="_blank">
                            <?php echo get_template_part('svg/facebook'); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($instagram) : ?>
                        <a href="<?php echo $instagram['url']; ?>" target="_blank">
                            <?php echo get_template_part('svg/instagram'); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($youtube) : ?>
                        <a href="<?php echo $youtube['url']; ?>" target="_blank">
                            <?php echo get_template_part('svg/youtube'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer-mobile__bottom">
                <?php if ($logo) : ?>
                    <a class="logo" href="<?php echo home_url(); ?>">
                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                    </a>
                <?php endif; ?>
                <span class="copyright">Всі права захищені "NICMAS"<br>Copyright © 2021</span>
            </div>
        </div>

        <div class="footer-desktop">
            <div class="footer-top">
                <div class="footer-top__left">
                    <?php if ($logo) : ?>
                        <a class="logo" href="<?php echo home_url(); ?>">
                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                        </a>
                    <?php endif; ?>
                    <span class="copyright">Всі права захищені "NICMAS"<br>Copyright © 2021</span>
                </div>
                <div class="footer-top__middle">
                    <?php if ($phoneNumber) : ?>
                        <a class="phoneNumber" href="<?php echo $phoneNumber['url']; ?>">
                            <?php echo $phoneNumber['title']; ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($email) : ?>
                        <a class="email" href="<?php echo $email['url']; ?>" target="_blank">
                            <?php echo $email['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="footer-top__right">
                    <?php if ($address) : ?>
                        <a class="address" href="<?php echo $address['url']; ?>" target="_blank">
                            <?php echo $address['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer-bottom">
                <span>Ми в соцмережах:</span>
                <div class="footer-bottom__socials">
                    <?php if ($facebook) : ?>
                        <a href="<?php echo $facebook['url']; ?>" target="_blank">
                            <?php echo get_template_part('svg/facebook'); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($instagram) : ?>
                        <a href="<?php echo $instagram['url']; ?>" target="_blank">
                            <?php echo get_template_part('svg/instagram'); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($youtube) : ?>
                        <a href="<?php echo $youtube['url']; ?>" target="_blank">
                            <?php echo get_template_part('svg/youtube'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>