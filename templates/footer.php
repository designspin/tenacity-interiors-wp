<footer id="footer">
    <div class="inner">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="box">
                    <h4>Hand Made In Norfolk</h4>
                    <?php
                      if(has_nav_menu('footer_navigation_two')) :
                        wp_nav_menu([
                          'theme_location' => 'footer_navigation_two',
                          'depth' => 1,
                          'container' => '',
                          'menu_class' => 'alt'
                        ]);
                      endif;
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="box">
                    <h4>Site Information</h4>
                    <?php
                      if(has_nav_menu('footer_navigation')) :
                        wp_nav_menu([
                          'theme_location' => 'footer_navigation',
                          'depth' => 1,
                          'container' => '',
                          'menu_class' => 'alt'
                        ]);
                      endif;
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="box">
                    <h4>Tenacity Interiors Limited</h4>
                    <em>Registered Office:</em><br />
                    <address>
                    <?= carbon_get_theme_option("adr_1") ?><br />
                    <?= carbon_get_theme_option("adr_2") ?><br />
                    <?= carbon_get_theme_option("adr_3") ?><br />
                    <?= carbon_get_theme_option("town") ?><br />
                    <?= carbon_get_theme_option("post_code") ?><br />
                    </address>
                    <p>
                        Registered company No.<?= carbon_get_theme_option("company_no") ?><br />
                        VAT No: <?= carbon_get_theme_option("vat_no") ?>
                    </p>
                </div>
            </div>
        </div>
        
        <ul class="icons">
            <li>
              <a href="<?= carbon_get_theme_option("facebook_page") ?>" aria-label="Visit us on Facebook" class="icon icon--facebook">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path></svg>
              </a>
            </li>
            <li>
              <a href="<?= carbon_get_theme_option("linkedin_page") ?>" aria-label="Connect with Karl on Linked in" class="icon icon--linkedin">
              <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path></svg>
              </a>
            </li>
            <li>
              <a href="<?= carbon_get_theme_option("youtube_page") ?>" aria-label="See videos on Youtube" class="icon icon--youtube">
              <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M186.8 202.1l95.2 54.1-95.2 54.1V202.1zM448 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-42 176.3s0-59.6-7.6-88.2c-4.2-15.8-16.5-28.2-32.2-32.4C337.9 128 224 128 224 128s-113.9 0-142.2 7.7c-15.7 4.2-28 16.6-32.2 32.4-7.6 28.5-7.6 88.2-7.6 88.2s0 59.6 7.6 88.2c4.2 15.8 16.5 27.7 32.2 31.9C110.1 384 224 384 224 384s113.9 0 142.2-7.7c15.7-4.2 28-16.1 32.2-31.9 7.6-28.5 7.6-88.1 7.6-88.1z"></path></svg>
              </a>
            </li>   
        </ul>
        <ul class="copyright">
            <li>&copy; Tenacity Interiors Ltd <?= date('Y') ?></li>
            <li><a href="https://designspin.co.uk">Wordpress Web Design</a></li>
        </ul>
    </div>
</footer>