@extends('user.layouts.layout')
@section('content')
<div role="main" class="main pgl-bg-grey">
    <!-- Begin page top -->
    <section class="page-top">
        <div class="container">
            <div class="page-top-in">
                <h2><span>Liên hệ chúng tôi</span></h2>
            </div>
        </div>
    </section>
    <!-- End page top -->

    <!-- Begin content with sidebar -->
    <div class="container">
        <div class="row">
            <div class="col-md-9 content">

                <div class="contact">
                    {{-- <p>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit.</p> --}}
                    {{-- <div id="contact-map" class="pgl-bg-light">
                    </div> --}}
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.1955508333645!2d105.79664331437753!3d20.98479699465484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc6bdc7f95f%3A0x58ffc66343a45247!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgR2lhbyB0aMO0bmcgVuG6rW4gdOG6o2k!5e0!3m2!1svi!2s!4v1654329415337!5m2!1svi!2s" width="850" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <hr>
                    <h2 style="font-size: 22px">Để lại lời nhắn</h2>
                    <form id="contact-form" name="form1" method="post" action="http://pixelgeeklab.com/html/realestast/send_contact.php">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="name">Họ tên*</label>
                                    <input type="text" name="name" id="name" class="form-control" data-msg-required="Please enter your name." required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="customer_mail"> Email*</label>
                                    <input type="email" name="customer_mail" id="customer_mail" class="form-control" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="subject">Số điện thoại*</label>
                                    <input type="text" name="subject" id="subject" class="form-control" data-msg-required="Please enter the subject." required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="website">Tiêu đề</label>
                                    <input type="text" name="website" id="website" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comments">Nội dung*</label>
                            <textarea rows="9" name="comments" id="comments" class="form-control" data-msg-required="Please enter your message." required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Gửi" class="btn btn-primary min-wide" data-loading-text="Loading...">
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-3 sidebar">

                <!-- Begin Our Agents -->
                <aside class="block pgl-agents pgl-bg-light">
                    <h3>Quản trị viên</h3>
                    <div class="owl-carousel pgl-pro-slide pgl-agent-item" data-plugin-options='{"items": 1, "pagination": false, "autoHeight": true}'>

                        <div class="pgl-agent-item">
                            <div class="img-thumbnail-medium">
                                <a href="agentprofile.html"><img src="{{ asset('images/avata.jpg') }}" class="img-responsive" alt=""></a>
                            </div>
                            <div class="pgl-agent-info">
                                <small>NO.1</small>
                                <h4><a href="agentprofile.html">Nguyễn khắc Hiếu</a></h4>
                                <address>
                                    <i class="fa fa-map-marker"></i> Quê quán: Thanh Hoá<br>
                                    <i class="fa fa-phone"></i> Điện thoại : 0378 642 530<br>
                                    <i class="fa fa-fax"></i> Fax : 1-666-999-5555<br>
                                    <i class="fa fa-envelope-o"></i> Mail: <a href="mailto:hieu@gmail.com">hieu@gmail.com</a>
                                </address>
                            </div>
                        </div>

                        <div class="pgl-agent-item">
                            <div class="img-thumbnail-medium">
                                <a href="agentprofile.html"><img src="{{ asset('images/avata.jpg') }}" class="img-responsive" alt=""></a>
                            </div>
                            <div class="pgl-agent-info">
                                <small>NO.1</small>
                                <h4><a href="agentprofile.html">Nguyễn khắc Hiếu</a></h4>
                                <address>
                                    <i class="fa fa-map-marker"></i> Quê quán: Thanh Hoá<br>
                                    <i class="fa fa-phone"></i> Điện thoại : 0378 642 530<br>
                                    <i class="fa fa-fax"></i> Fax : 1-666-999-5555<br>
                                    <i class="fa fa-envelope-o"></i> Mail: <a href="mailto:hieu@gmail.com">hieu@gmail.com</a>
                                </address>
                            </div>
                        </div>

                    </div>
                </aside>
                <!-- End Our Agents -->

            </div>
        </div>
    </div>
    <!-- End content with sidebar -->

</div>
@endsection
