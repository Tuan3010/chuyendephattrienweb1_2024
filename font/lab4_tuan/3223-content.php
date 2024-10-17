<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<div class="type-3223">
  <div class="container-custom">
    <div class="row-ct">

      <div class="col-lg-9 col-ct">
        <div class="box-none"></div>
      </div>


      <div class="col-lg-3 col-ct">
        <aside class="side-bar">
          <div class="search-box">
            <form action="#" method="get">
              <input class="input-search" type="text" placeholder="Search">
              <button type="submit">
                <i style="font-size: 14px;" class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>

          <div class="img-box">
            <a href="#">
              <img width="100%" src="./img/blog-img-05a.jpg" alt="">
            </a>
          </div>

          <div class="our-school">
            <h3>Our school</h3>
            <p>Lorem ipsum dolor sit amet, conse ctetur adip isicing elit, sed do eiusmod tempor incididunt ut la</p>
          </div>

          <div class="categories">
            <h3>Categories</h3>
            <ul>
              <li><a href="">Courses (7)</a></li>
              <li><a href="">Languages (2)</a></li>
              <li><a href="">Lectures (4)</a></li>
              <li><a href="">Pottery (1)</a></li>
              <li><a href="">Workshops (3)</a></li>
            </ul>
          </div>

          <div class="latest-post">
            <h3>Latest posts</h3>

            <div class="post-item">
              <div class="img">
                <a href="">
                  <img width="100%" src="./img/post1.jpg" alt="">
                </a>
              </div>
              <div class="left">
                <a class="daytime">January 20, 2021</a>
                <a class="description">Performance in modern art</a>
              </div>
            </div>
            <div class="post-item">
              <div class="img">
                <img width="100%" src="./img/post2.jpg" alt="">
              </div>
              <div class="left">
                <a class="daytime">January 20, 2021</a>
                <a class="description">Performance in modern art</a>
              </div>
            </div>
            <div class="post-item">
              <div class="img">
                <img width="100%" src="./img/post3.jpg" alt="">
              </div>
              <div class="left">
                <a class="daytime">January 20, 2021</a>
                <a class="description">Performance in modern art</a>
              </div>
            </div>
            
          </div>
        </aside>
      </div>
    </div>
  </div>


</div>
