<div class="modal bottom side fade" id="Modalstries" tabindex="-1" role="dialog" style=" overflow-y: auto;">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 bg-transparent">
                <button type="button" class="close mt-0 position-absolute top--30 right--10" data-dismiss="modal" aria-label="Close"><i class="ti-close text-white font-xssss"></i></button>
                <div class="modal-body p-0">
                    <div class="card w-100 border-0 rounded-3 overflow-hidden bg-gradiant-bottom bg-gradiant-top">
                        <div class="owl-carousel owl-theme dot-style3 story-slider owl-dot-nav nav-none">
                            <div class="item"><img src="images/story-5.jpg" alt="image"></div>
                            <div class="item"><img src="images/story-6.jpg" alt="image"></div>
                            <div class="item"><img src="images/story-7.jpg" alt="image"></div>
                            <div class="item"><img src="images/story-8.jpg" alt="image"></div>
                            
                        </div>
                    </div>
                    <div class="form-group mt-3 mb-0 p-3 position-absolute bottom-0 z-index-1 w-100">
                        <input type="text" class="style2-input w-100 bg-transparent border-light-md p-3 pe-5 font-xssss fw-500 text-white" value="Write Comments">               
                        <span class="feather-send text-white font-md text-white position-absolute" style="bottom: 35px;right:30px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-popup-chat">
        <div class="modal-popup-wrap bg-white p-0 shadow-lg rounded-3">
            <div class="modal-popup-header w-100 border-bottom">
                <div class="card p-3 d-block border-0 d-block">
                    <figure class="avatar mb-0 float-left me-2">
                        <img src="images/user-12.png" alt="image" class="w35 me-1">
                    </figure>
                    <h5 class="fw-700 text-primary font-xssss mt-1 mb-1">Hendrix Stamp</h5>
                    <h4 class="text-grey-500 font-xsssss mt-0 mb-0"><span class="d-inline-block bg-success btn-round-xss m-0"></span> Available</h4>
                    <a href="#" class="font-xssss position-absolute right-0 top-0 mt-3 me-4"><i class="ti-close text-grey-900 mt-2 d-inline-block"></i></a>
                </div>
            </div>
            <div class="modal-popup-body w-100 p-3 h-auto">
                <div class="message"><div class="message-content font-xssss lh-24 fw-500">Hi, how can I help you?</div></div>
                <div class="date-break font-xsssss lh-24 fw-500 text-grey-500 mt-2 mb-2">Mon 10:20am</div>
                <div class="message self text-right mt-2"><div class="message-content font-xssss lh-24 fw-500">I want those files for you. I want you to send 1 PDF and 1 image file.</div></div>
                <div class="snippet pt-3 ps-4 pb-2 pe-3 mt-2 bg-grey rounded-xl float-right" data-title=".dot-typing"><div class="stage"><div class="dot-typing"></div></div></div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-popup-footer w-100 border-top">
                <div class="card p-3 d-block border-0 d-block">
                    <div class="form-group icon-right-input style1-input mb-0"><input type="text" placeholder="Start typing.." class="form-control rounded-xl bg-greylight border-0 font-xssss fw-500 ps-3"><i class="feather-send text-grey-500 font-md"></i></div>
                </div>
            </div>
        </div> 
    </div>


    <script src="js/plugin.js"></script>
    <script src="js/lightbox.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.easypiechart.min.js"></script> 
    <script>
        $('.chart').easyPieChart({
            easing: 'easeOutElastic',
            delay: 3000,
            barColor: '#3498db',
            trackColor: '#aaa',
            scaleColor: false,
            lineWidth: 5,
            trackWidth: 5,
            size: 50,
            lineCap: 'round',
            onStep: function(from, to, percent) {
                this.el.children[0].innerHTML = Math.round(percent);
            }
        });
    </script> 