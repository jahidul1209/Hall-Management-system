<?php require_once 'header.php'?>
<?php require_once "config.php"?>
<div class="all-contents">
  <div class="slider-provost-message">
    <div class="row">
      <div class="col-md-8">
        .<div class="sliderPart">
          <div id="carouselExampleIndicators" data-ride="carousel" id="carousel-fade" class="carousel fadeIn" data-interval="5000">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100 " src="images/slider/slide2.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/slider/hall.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/slider/slide4.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4 provost-message-area">
        <h2>Message From Provost</h2>
        <div>
          <img src="images/provost/sir_3.jpg" class="img img-fluid provost-img">
        </div>
        <div>
         Sheikh Mujib Hall of Khulna Science And Technology University is a safest hall for minority female students such as Muslims, Hindu, Christian, and others. It is a big hall for women including meeting rooms, dining rooms, a prayer hall, gardens, and sporting facilities. There are approximately 1500 students in the hall. All students are comfortable and safe in this hall. All facilities are also available.In this hall, there have specific rules for residing female students. All students should follow this existing rules.
        </div>
        <div>
        </div>
      </div
    </div>
  </div> <!-- End slider and provost message -->


  <div class="news-notice">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div class=" news-single">
            <h2>Latest Notices</h2>
            <ul>
              <?php
$statement = $db->prepare("SELECT * FROM tbl_notices ORDER BY id DESC");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {?>
                <li><a href="notice.php?id=<?=$row['id']?>"><?=$row['title']?> at <span class="badge badge-info"><?=$row['time']?></span> </a></li>
              <?php }?>
            </ul>
            <a href="notices.php" class="btn btn-success">Read More Notices</a>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- End News and Notice Div -->

  <!-- Main Links -->
  <div class="main-links">
    <div class="container">
      <h2>Recent Events</h2>
      <div class="row mt-3 mb-5">

        <div class="col-md-3">
          <div class="card single-link" onclick="location.href='http://cse.pstu.ac.bd/welcome/news_details/2'">
            <img class="card-img-top" src="images/event/event_1.jpg">
            <div class="card-body">
              <h4 class="card-title">KU Bosonto Boron</h4>
            </div>
          </div>
        </div>

		<div class="col-md-3">
          <div class="card single-link" onclick="location.href='http://cse.pstu.ac.bd/welcome/news_details/5'">
            <img class="card-img-top" src="images/event/event_2.jpg">
            <div class="card-body">
              <h4 class="card-title">KU IT Carnival</h4>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card single-link" onclick="location.href='http://cse.pstu.ac.bd/welcome/gallery_category_details/15'">
            <img class="card-img-top" src="images/event/rag_1.jpg">
            <div class="card-body">
              <h4 class="card-title">KU Rag Day</h4>
            </div>
          </div>
        </div>


      </div>




      </div>



	</div>
  </div>
  <!-- End Main Links -->
</div> <!-- End all contents -->

<?php require_once 'footer.php'?>
