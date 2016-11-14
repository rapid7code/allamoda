<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

</div>

<footer>
  <ul class="footer__links">
    <li class="footer__links__rights">&copy;2016 Alla Moda. All rights reserved.</li>
  </ul>
</footer><a id="nav-closer" href="javascript:void(0);" class="nav-closer"></a>

<?php wp_footer(); ?>

<?php
$ip = geoip_detect2_get_client_ip();
$record = geoip_detect2_get_info_from_ip($ip, NULL);
$isoCode = $record->country->isoCode;

if ($isoCode == 'VN') { ?>
  <script>
    jQuery(document).ready(function () {
      var welcome = Common.GetCookie('welcome');
      if (welcome == '') {
        Common.SetCookies('welcome', true, 0);

        var current_URL = jQuery(location).attr('href');
        if(!current_URL.includes("/vi/")){
          window.location.href = jQuery(location).attr('href') + 'vi/';
        }

      }
    });
  </script>
<?php } ?>

</body>
</html>
