<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<div class="type-3108">


    <div class='container1'>

        <div class="container-auto">
            <!-- Footer top -->
            <div class="footer-top row-ct">
                <div class="col l-3 m-6 s-12">
                    <div class="item item-logo">
                        <!-- logo -->
                         <a href="#" class="logo">
                            <img src="./img/logo.png" alt="logo.png">
                         </a>
                        <!-- description logo -->
                         <span class="description-logo">
                            Ascetic mountains hatred truth hope victorious sexuality ocean and abstract inexpedient noble burying faith. Merciful madness of sea decieve derive.
                         </span>
                        <!-- icon social -->
                         <ul class="list-icon-social">
                            <li>
                                <a href="" class="fa fa-facebook"></a>
                            </li>
                            <li>
                                <a href="" class="fa fa-twitter"></a>
                            </li>
                            <li>
                                <a href="" class="fa fa-google-plus"></a>
                            </li>
                            <li>
                                <a href="" class="fa fa-pinterest"></a>
                            </li>
                         </ul>
                    </div>
                </div>
                <div class="col l-3 m-6 s-12">
                    <div class="item item-recent-post">
                        <!-- title -->
                        <h2 class="title">RECENT POSTS</h2>
                        <!-- post  -->
                        <div class="post">
                            <a class="post-content" href="">Free fearful disgust hatred fearful decieve. Strong chaos eternal-return abstract...</a>
                            <a class="post-auth" href="">By admin july 28</a>
                        </div>
                        <div class="post">
                            <a class="post-content" href="">Free fearful disgust hatred fearful decieve. Strong chaos eternal-return abstract...</a>
                            <a class="post-auth" href="">By admin july 28</a>
                        </div>
                        
                    </div>
                </div>
                <div class="col l-3 m-6 s-12">
                    <div class="item item-get-in-touch">
                        <!-- title -->
                        <h2 class="title">GET IN TOUCH</h2>
                        <!-- info  -->
                        <div class="email">
                            <h5>Email:</h5>
                            
                            <span>info@example.com</span>
                        </div>
                        
                        <div class="address">
                            <h5>Address:</h5>
                            
                            <span>123 Western Street, Sydney, Australia</span>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="col l-3 m-6 s-12">
                    <div class="item item-number">
                        <div class="phone-wrap">
                            <span id="logo" class="fa fa-phone"></span>
                            <span class="number">+456 789 0321</span>
                        </div>  
                        <p class="des-phone">Call Us Free, We are 24/7 Avaible</p>
                        
                    </div>
                </div>

                <!-- Map -->
                 <div class="map-img">
                    <img src="./img/map.png" alt="">
                 </div>
                
            </div>
            <!-- Footer bottom -->
             <div class="footer-bottom ">
                <div class="footer-bottom-flex">
                    <div class="copy-right">
                        Copyright ©; 2024  Naples Phone Repair. All Rights Reserved
                    </div>
                
                    <ul class="list-page">
                        <li>
                            <a href="">HOME</a>
                        </li>
                        <li>
                            <a href="">ABOUT US</a>
                        </li>
                        <li>
                            <a href="">SERVICES</a>
                        </li>
                        <li>
                            <a href="">GALLARY</a>
                        </li>
                        <li>
                            <a href="">BLOG</a>
                        </li>
                        <li>
                            <a href="">CONTACT US</a>
                        </li>
                    </ul>
                </div>
             </div>

        </div>

    </div>

</div>
