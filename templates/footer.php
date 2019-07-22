<?php
/**
 * The template for displaying the footer
 *
 * @package Smores
 * @since Smores 2.0
 */
?>


    <?php wp_footer(); ?>

    <script>
    function get_browser(){var r,e=navigator.userAgent,o=e.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i)||[];return/trident/i.test(o[1])?(r=/\brv[ :]+(\d+)/g.exec(e)||[],{name:"IE",version:r[1]||""}):"Chrome"===o[1]&&null!=(r=e.match(/\bOPR|Edge\/(\d+)/))?{name:"Opera",version:r[1]}:(o=o[2]?[o[1],o[2]]:[navigator.appName,navigator.appVersion,"-?"],null!=(r=e.match(/version\/(\d+)/i))&&o.splice(1,1,r[1]),{name:o[0],version:o[1]})}$(window).load(function(){outdatedBrowser({bgColor:"",color:"#ffffff",lowerThan:"transform",languagePath:""})});var browser=get_browser();$("span.version").text(browser.version);
    </script>

  </body>



</html>
