<div class="myFooter">
    <footer class="text-center text-start footer">
        <!-- Grid container -->
        <div class="container">
            <!-- Newsletter Subs -->
                <div class="row">
                    <div class="col">
                        @include('components.Mailchimp')
                        <p>

                        </p>
                    </div>
                    <!-- End Newsletter Subs -->

                    <!-- Logo&Rights -->
                    <div class="col">
                        <div class="navbar-brand">
                            <a  href="{{ url('/') }}">
                                <img  src="{{asset('images/logo.png')}}" alt="ThisCounted Logo" width="70%" height="70%">
                            </a>
                            <div>
                                <p>
                                    <strong>2022 ThisCounted. All rights reserved.</strong>
                                    <br>
                                    <span><a  style="color:black; font-size:13px" href="http://www.avantgaea.com/">design by Avant Gaea</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END Logo&Rights -->

                    <div class="col mt-auto mb-auto">
                            <a href="https://t.me/ThisCounted" target="_blank">
                                <img src="https://img.icons8.com/fluency/48/000000/telegram-app.png"/>
                            </a>
                            <a href="https://www.instagram.com/thiscounted/" target="_blank"  >
                                <img src="https://img.icons8.com/fluency/48/000000/instagram-new.png"/>
                            </a>
                        <a href="mailto:ThisCountd@gmail.com" target="_blank"  >
                            <img src="https://img.icons8.com/color/50/000000/gmail--v2.png"/>                        </a>
                    </div>
                </div>
            </div>
    </footer>
</div>
