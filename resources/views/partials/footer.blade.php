<!-- ======= Footer ======= -->

<footer id="footer">

    <div class="footer-top">

        <div class="container">

            <div class="row">



                <div class="col-lg-6 col-md-6">

                    <div class="footer-info">

                        <h3>Management Event</h3>

                        <p class="pb-3" style="text-align: justify">Lorem ipsum dolor, sit amet consectetur
                            adipisicing elit. Quod cum earum fugit atque, ullam suscipit maiores tempora odio pariatur
                            ea explicabo reiciendis, aliquam saepe? Quis laborum libero officiis dolorum, ad corrupti
                            fuga ut rem consequuntur, minus natus, atque voluptatum quod excepturi! Quod nam facere
                            repellendus ullam totam, quisquam earum magnam!</p>

                        <div class="social-links mt-3">

                            <a href="#"> <img src="{{ asset('assets/asset/Untitled-6-01.png') }}"
                                    class="icon-footer-1"></a>

                            <a href="#"> <img src="{{ asset('assets/asset/Untitled-6-02.png') }}"
                                    class="icon-footer-1"></a>

                            <a href="#"> <img src="{{ asset('assets/asset/Untitled-6-03.png') }}"
                                    class="icon-footer-1"></a>

                            <a href="#"> <img src="{{ asset('assets/asset/Untitled-7-01.png') }}"
                                    class="icon-footer-1"></a>

                        </div>



                        <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="150">

                            <h4>Link</h4>

                            <ul>

                                <li><i class="bx bx-chevron-right"></i>
                                    <a href="/">Beranda</a>
                                </li>

                            </ul>

                        </div>



                        <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="250">

                            <h4>Kontak</h4>

                            <ul>
                                <li><img src="{{ asset('assets/asset/Untitled-4-01.png') }}" class="icon-footer"><a
                                        href="#">Jawa Barat, Indonesia</a></li>

                                <li><img src="{{ asset('assets/asset/Untitled-4-02.png') }}" class="icon-footer"><a
                                        href="#">example@gmail.com</a></li>

                                <li><img src="{{ asset('assets/asset/Untitled-4-03.png') }}" class="icon-footer"><a
                                        href="#">+0123456789</a></li>
                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="container">

        <div class="copyright">

            &copy; Copyright <strong><span>Management Event</span></strong>. All Rights Reserved

        </div>

        <div class="credits">

            Designed by <a href="https://spero.id/">Spero</a>

        </div>

    </div>

</footer>
<!-- End Footer --><a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<!-- Vendor JS Files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>

<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>

<script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>

<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

<script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>

<script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>


<!-- Vendor JS Files -->
<script>
    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
    $('#state').change(function() {})
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

<script>
    $.ajax({
            type: "GET",
            url: "{{ url('getCity') }}?state_id=" + stateID,
            success: function(res) {
                if (res) {
                    $("#city").empty();
                    $("#city").append('<option>Pilih Kota</option>');
                    $.each(res, function(key, value) {
                        $("#city").append('<option value="' + key + '">' + value +
                            '</option>');
                    });
                } else {
                    $("#city").empty();
                }
            }
        }
        else {
            $("#city").empty();
        });
</script>

<script src="{{ asset('assets/js/main.js') }}"></script>

