<footer class="sixteen columns row footer">
		<?php wp_nav_menu(array('theme_location' => 'footer', 'container_class' => 'footer-navigation', 'container_id' => 'footer-wrapper')); ?>
        <p class="footer-text">新城國際實業股份有限公司 屏東縣內埔鄉豐田村建國路5號<br>
        NEW CHENG CORPORATION NO.5 JIANG GUO ROAD, NEI PU TOWNSHIP, PING TUNG COUNTY, 91252 TAIWAN, R.O.C.<br>
        TEL:+886-8-779-6867 FAX:+886-8-779-8097 E-MAIL: chientinlin@hotmail.com</p>
</footer>
</div>
<script>
    jQuery("#show-nav").click(function() {
        jQuery(".main-nav").toggle("slow");
        jQuery("#close-nav").show("slow");
    });
    jQuery("#close-nav").click(function() {
        jQuery(".main-nav").toggle("slow");
        jQuery("#close-nav").hide("slow");
    });
</script>
<script type="text/javascript" src="jquery-1.10.2.min.js"></script>

<script>

    $(document).ready(function() {

        $('li').click(function() {

            $('li').removeClass('active');

            $(this).addClass('active');

        });


    });
</script>
</body>
<?php wp_footer(); ?>
</html>