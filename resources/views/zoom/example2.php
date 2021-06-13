<!DOCTYPE html>
<html>
    <head>
        <title>2</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="imagetoolbar" content="no">
        <meta name="robots" content="noindex,nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <!-- Bootstrap is not needed -->
        <link rel="stylesheet" href="example_files/bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="example_files/css/examples.css" type="text/css">

        <!-- jQuery core, needed for the lightboxes. Include if not already present. -->
        <script src="../axZm/plugins/jquery-2.2.4.min.js"></script>

        <!-- AJAX-ZOOM core, needed when APP container is used! -->
        <script type="text/javascript" src="../axZm/jquery.axZm.js"></script>

        <!--  Fancybox lightbox javascript, only needed if used, please note: it has been slightly modified for AJAX-ZOOM -->
        <link rel="stylesheet" href="../axZm/plugins/demo/jquery.fancybox/jquery.fancybox-1.3.4.css" media="screen" type="text/css">
        <script type="text/javascript" src="../axZm/plugins/demo/jquery.fancybox/jquery.fancybox-1.3.4.pack.js"></script>

        <!--  AJAX-ZOOM extension to load AJAX-ZOOM into maximized fancybox,
            requires the modified jquery.fancybox-1.3.4.css and jquery.fancybox-1.3.4.js, or unmodified fancybox 2, optional -->
        <script type="text/javascript" src="../axZm/extensions/jquery.axZm.openAjaxZoomInFancyBox.js"></script>

        <!-- APP Container extension -->
        <link href="../axZm/extensions/axZmAppContainer/jquery.axZm.appContainer.css" type="text/css" rel="stylesheet" />
        <link href="../axZm/extensions/axZmAppContainer/jquery.axZm.appContainerTemplates.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="../axZm/extensions/axZmAppContainer/jquery.axZm.appContainer.js"></script>

        <!-- Enable fullscreen for IOS when dealing with iframes -->
        <script type="text/javascript" src="../axZm/axZm.iframe.js"></script>

        <!-- Colorbox plugin, only needed if used -->
        <link rel="stylesheet" href="../axZm/plugins/demo/colorbox/example1/colorbox.css" media="screen" type="text/css">
        <script type="text/javascript" src="../axZm/plugins/demo/colorbox/jquery.colorbox-min.js"></script>

        <!-- Javascript to style the syntax, not needed! -->
        <link rel="stylesheet" href="../axZm/plugins/demo/prism/prism.css" type="text/css">
        <script type="text/javascript" src="../axZm/plugins/demo/prism/prism.min.js"></script>
        <script type="text/javascript">Prism.plugins.NormalizeWhitespace.setDefaults({'remove-trailing': true, 'remove-indent': true, 'left-trim': true, 'right-trim': true});</script>

        <!-- These styles are all not needed! -->
        <style type="text/css" media="screen">
            h4 {
                margin-top: 25px;
            }
            h3 {
                margin-top: 35px;
            }
            @media (max-width: 991px) {
                .azOuterLayoutBack {
                    height: 20px;
                }
                .azOuterLayoutBack > img{
                    display: none;
                }
            }
        </style>
    </head>
    <body>

        <?php
        // This is only for the demo page, you can remove it
        if (file_exists(dirname(__FILE__).'/navi.php')) {
            $linkToAzExample = 'example2.php';
            include dirname(__FILE__).'/navi.php';
        }
        ?>

        <div class="container">
            <h1 class="page-header">AJAX-ZOOM "Lightbox" iFrame examples</h1>
            <div class="row">
                <div class="col-md-12">
                    <p>This example demonstrates how to display AJAX-ZOOM gallery which grabs and shows all images from a particular folder,
                        loads specified images from different folders, or loads 360°/3D within "lightboxes".
                        The <code>src</code> of the iframes in the lightboxes is the /examples/example33_vario.php file.
                    </p>
                </div>

                <div class="col-md-12">
                    <!-- Folders -->
                    <h3>Load all images from a directory with "zoomDir"</h3>
                </div>

                <div id="exampleZoomDir">
                    <div class="col-md-4">
                        <h4>The new AJAX-ZOOM APP container</h4>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.axZmAppContainer({iframe: 'example33_vario.php?zoomDir=estate&example=1&mNavi_enabled=0', title: 'Test title gallery button 1'})">Link gallery 1</a>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.axZmAppContainer({iframe: 'example33_vario.php?zoomDir=animals&example=2mNavi_enabled=0', title: 'Test title gallery button 1'})">Link gallery 2</a>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.axZmAppContainer({iframe: 'example33_vario.php?zoomDir=trasportation&example=3&mNavi_enabled=0', title: 'Test title gallery button 1'})">Link gallery 2</a>
                    </div>
                    <div class="col-md-4">
                        <h4>Colorbox - not responsive</h4>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.colorbox({href: 'example33_vario.php?zoomDir=estate&example=1&mNavi_enabled=0', iframe: true, width: jQuery(window).width() - 100, height: jQuery(window).height() - 100, scrolling: false})">Link gallery 1</a>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.colorbox({href: 'example33_vario.php?zoomDir=animals&example=2&mNavi_enabled=0', iframe: true, width: jQuery(window).width() - 100, height: jQuery(window).height() - 100, scrolling: false})">Link gallery 2</a>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.colorbox({href: 'example33_vario.php?zoomDir=trasportation&example=3&mNavi_enabled=0', iframe: true, width: jQuery(window).width() - 100, height: jQuery(window).height() - 100, scrolling: false})">Link gallery 3</a>
                    </div>
                    <div class="col-md-4">
                        <h4>Responsive Fancybox</h4>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.openAjaxZoomInFancyBox({href: 'example33_vario.php?zoomDir=estate&example=1&mNavi_enabled=0', iframe: true})">Example 1</a>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.openAjaxZoomInFancyBox({href: 'example33_vario.php?zoomDir=animals&example=2&mNavi_enabled=0', iframe: true})">Example 2</a>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.openAjaxZoomInFancyBox({href: 'example33_vario.php?zoomDir=trasportation&example=3&mNavi_enabled=0', iframe: true})">Example 3</a>
                    </div>
                </div>

                <div class="col-md-12">
                    <p style="margin-top: 15px;">In the below HTML, we simply define the <code>onclick</code> attribute inline.
                        But you can and normally should use something like <code>jQuery(selector).on('click', function(){...})</code> in your implementations.
                    </p>
                    <h4>HTML AJAX-ZOOM APP container</h4>
                    <pre><code class="language-html" id="exampleZoomDirAppPrism"></code></pre>
                    <script>jQuery(function(){jQuery('#exampleZoomDirAppPrism').text($('#exampleZoomDir>div:eq(0)').html().replaceAll('&amp;', '&'));});</script>
                    <h4>HTML Colorbox</h4>
                    <pre><code class="language-html" id="exampleZoomDirColorboxPrism"></code></pre>
                    <script>jQuery(function(){jQuery('#exampleZoomDirColorboxPrism').text($('#exampleZoomDir>div:eq(1)').html().replaceAll('&amp;', '&'));});</script>
                    <h4>HTML Fancybox</h4>
                    <pre><code class="language-html" id="exampleZoomDirFancyboxPrism"></code></pre>
                    <script>jQuery(function(){jQuery('#exampleZoomDirFancyboxPrism').text($('#exampleZoomDir>div:eq(2)').html().replaceAll('&amp;', '&'));});</script>
                </div>

                <div class="col-md-12">
                    <h3>Load specified images with "zoomData"</h3>
                </div>

                <!-- Specified images -->
                <div id="exampleZoomData">
                    <div class="col-md-4">
                        <h4>The new AJAX-ZOOM APP container</h4>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.axZmAppContainer({iframe: 'example33_vario.php?zoomData=/pic/zoom/estate/house_01.jpg|/pic/zoom/animals/animals_001.jpg|/pic/zoom/furniture/furniture_002.jpg&example=1&mNavi_enabled=0', title: 'Test title gallery 1'})">Link gallery 1</a>
                    </div>
                    <div class="col-md-4">
                        <h4>Colorbox - not responsive</h4>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.colorbox({href: 'example33_vario.php?zoomData=/pic/zoom/estate/house_01.jpg|/pic/zoom/animals/animals_001.jpg|/pic/zoom/furniture/furniture_002.jpg&example=1&mNavi_enabled=0', iframe: true, width: jQuery(window).width() - 100, height: jQuery(window).height() - 100, scrolling: false})">Link gallery 1</a>
                    </div>
                    <div class="col-md-4">
                        <h4>Responsive Fancybox</h4>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.openAjaxZoomInFancyBox({href: 'example33_vario.php?zoomData=/pic/zoom/estate/house_01.jpg|/pic/zoom/animals/animals_001.jpg|/pic/zoom/furniture/furniture_002.jpg', iframe: true})">Link gallery 1</a>
                    </div>
                </div>

                <div class="col-md-12">
                    <p style="margin-top: 15px;">In the below HTML, we simply define the <code>onclick</code> attribute inline.
                        But you can and normally should use something like <code>jQuery(selector).on('click', function(){...})</code> in your implementations.
                    </p>
                    <h4>HTML AJAX-ZOOM APP container</h4>
                    <pre><code class="language-html" id="exampleZoomDataAppPrism"></code></pre>
                    <script>jQuery(function(){jQuery('#exampleZoomDataAppPrism').text($('#exampleZoomData>div:eq(0)').html().replaceAll('&amp;', '&'));});</script>
                    <h4>HTML Colorbox</h4>
                    <pre><code class="language-html" id="exampleZoomDataColorboxPrism"></code></pre>
                    <script>jQuery(function(){jQuery('#exampleZoomDataColorboxPrism').text($('#exampleZoomData>div:eq(1)').html().replaceAll('&amp;', '&'));});</script>
                    <h4>HTML Fancybox</h4>
                    <pre><code class="language-html" id="exampleZoomDataFancyboxPrism"></code></pre>
                    <script>jQuery(function(){jQuery('#exampleZoomDataFancyboxPrism').text($('#exampleZoomData>div:eq(2)').html().replaceAll('&amp;', '&'));});</script>
                </div>

                <!-- 360 / 3D  -->
                <div class="col-md-12">
                    <h3>Load 360 / 3D images with "3dDir"</h3>
                </div>

                <div id="example3dDir">
                    <div class="col-md-4">
                        <h4>The new AJAX-ZOOM "APP container"</h4>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.axZmAppContainer({iframe: 'example33_vario.php?3dDir=/pic/zoom3d/Uvex_Occhiali&example=17&mNavi_enabled=0', title: '360 example'})">360 example</a>
                    </div>
                    <div class="col-md-4">
                        <h4>Colorbox - not responsive</h4>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.colorbox({href: 'example33_vario.php?3dDir=/pic/zoom3d/Uvex_Occhiali&example=17&mNavi_enabled=0', iframe: true, width: jQuery(window).width() - 100, height: jQuery(window).height() - 100, scrolling: false})">360 example</a>
                    </div>
                    <div class="col-md-4">
                        <h4>Responsive Fancybox</h4>
                        <a class="btn btn-info btn-block" href="javascript:void(0)" onclick="jQuery.openAjaxZoomInFancyBox({href: 'example33_vario.php?3dDir=/pic/zoom3d/Uvex_Occhiali', iframe: true})">360 example</a>
                    </div>
                </div>

                <div class="col-md-12">
                    <p style="margin-top: 15px;">In the below HTML, we simply define the <code>onclick</code> attribute inline.
                        But you can and normally should use something like <code>jQuery(selector).on('click', function(){...})</code> in your implementations.
                    </p>
                    <h4>HTML AJAX-ZOOM APP container</h4>
                    <pre><code class="language-html" id="example3dDirAppPrism"></code></pre>
                    <script>jQuery(function(){jQuery('#example3dDirAppPrism').text($('#example3dDir>div:eq(0)').html().replaceAll('&amp;', '&'));});</script>
                    <h4>HTML Colorbox</h4>
                    <pre><code class="language-html" id="example3dDirColorboxPrism"></code></pre>
                    <script>jQuery(function(){jQuery('#example3dDirColorboxPrism').text($('#example3dDir>div:eq(1)').html().replaceAll('&amp;', '&'));});</script>
                    <h4>HTML Fancybox</h4>
                    <pre><code class="language-html" id="example3dDirFancyboxPrism"></code></pre>
                    <script>jQuery(function(){jQuery('#example3dDirFancyboxPrism').text($('#example3dDir>div:eq(2)').html().replaceAll('&amp;', '&'));});</script>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top: 25px;">
            <div class="row">
                <div class="col-lg-12">
                    <h3>$.axZmAppContainer - documentation (options)</h3>
                    <p>More APP Container examples at <a href="https://www.ajax-zoom.com/examples/example32_modal.php" rel="nofollow">this page</a>.
                    </p>
                    <div>
                        <?php
                        if (file_exists(dirname(__FILE__).'/extensions_doc/docu_appContainer.inc.html')) {
                            include dirname(__FILE__).'/extensions_doc/docu_appContainer.inc.html';
                        } else {
                            echo dirname(__FILE__).'/extensions_doc/docu_appContainer.inc.html'.' does not exist.';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>$.openAjaxZoomInFancyBox - documentation (options)</h3>
                    <p>Please see <a href="example27.php">example27</a>.
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>$.colorbox (legacy) - documentation (options)</h3>
                    <p>Please see <a href="https://www.jacklmoore.com/colorbox/" target="_blank" rel="nofollow">jacklmoore.com</a>.
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (file_exists(dirname(__FILE__).'/footer.php')) {
                        // This is only for the demo, you can remove it
                        define('COMMENTS_BOOTSTRAP', true);
                        include dirname(__FILE__).'/footer.php';
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>