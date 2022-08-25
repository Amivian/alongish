
        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
                     $(document).ready(function () {
                $('#allstate').change(function () {
                    var stateid = document.getElementById('allstate').value;
                    var test = "states_id=" + stateid;

                    $('#citi').load('getcity.php', test);
                });

                if ($('#allstate').val()) {
                    var city = $('div[city_info]').attr('city_info');
                    var test = "states_id=" + $('#allstate').val()+"&city="+city;

                    $('#citi').load('getcity.php', test);
                }

                $('#allstate').change(function () {
                    var pick = $('#allsate').val();
                    var data = "put=" + pick;
                    $.ajax({
                        url: 'getcity.php',
                        data: data,
                        type: 'post',
                        dataType: 'json',
                        success: function (msg) {
                            setTimeout(function () {
                                $('#chose').html(msg.message);
                            }, 10);

                        },
                        error: function (err) {
                            console.log(err);
                        },
                    })
                })

                $('#btn').click(function () {
                })
            })

        </script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/jquery-ui.js"></script>
        <script src="../js/tether.min.js"></script>
        <script src="../js/moment.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/mmenu.min.js"></script>
        <script src="../js/mmenu.js"></script>
        <script src="../js/swiper.min.js"></script>
        <script src="../js/swiper.js"></script>
        <script src="../js/slick.min.js"></script>
        <script src="../js/slick2.js"></script>
        <script src="../js/fitvids.js"></script>
        <script src="../js/jquery.waypoints.min.js"></script>
        <script src="../js/jquery.counterup.min.js"></script>
        <script src="../js/imagesloaded.pkgd.min.js"></script>
        <script src="../js/isotope.pkgd.min.js"></script>
        <script src="../js/smooth-scroll.min.js"></script>
        <script src="../js/lightcase.js"></script>
        <!-- <script src="../js/search.js"></script> -->
        <script src="../js/owl.carousel.js"></script>
        <script src="../js/jquery.magnific-popup.min.js"></script>
        <script src="../js/ajaxchimp.min.js"></script>
        <script src="../js/newsletter.js"></script>
        <script src="../js/jquery.form.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <!-- <script src="../js/searched.js"></script> -->
        <script src="../js/dashbord-mobile-menu.js"></script>
        <script src="../js/forms-2.js"></script>
        <script src="../js/color-switcher.js"></script>
        <script src="../js/dropzone.js"></script>

        <!-- MAIN JS -->
        <script src="../js/script.js"></script>
        <script>
            $(".dropzone").dropzone({
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
            });
        </script>
        <script>
            $(".header-user-name").on("click", function () {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });
        </script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>