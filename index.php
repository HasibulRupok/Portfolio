<?php
  require 'backend/bdConnection.php';

  $personalInfo = null;
  $skills = null;
  try {
    // Query for personal info 
    $statement = $pdo->prepare("SELECT * FROM `personal-info` WHERE 1");
    $statement->execute();
    $personalInfo = $statement->fetch(PDO::FETCH_ASSOC);

    if(!$personalInfo){
      echo "No personal data found";
    }

    // Query for skills 
    $statement = $pdo->prepare("SELECT * FROM `skills` WHERE 1");
    $statement->execute();
    $skills = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(!$skills){
      echo "No skill data found";
    }

    
  } catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
  }

  // echo '<pre>'; var_dump($skills); echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- SEO  -->
  <meta name="title" content="Hasibul Hasan Rupok" />
  <meta name="description"
    content="Hi, my name is Hasibul Hasan Rupok. I am a full stack web developer and machine learning enthusiast. I am from Dhaka, Bangladesh. Currently, I am pursuing my bachelor degree in Computer Science and Engineering from the Department of Computer Science and Engineering, United International University." />
  <meta name="keywords"
    content="Hasibul Hasan Rupok, Hasibul, Hasan, Rupok, Hasibul Rupok, Web developer, bangladeshi web-development, bangladeshi web development, bangladeshi developer, java developer, bangladeshi java developer, bangladeshi java app developer, python developer, bangladeshi python developer, bangladeshi python app developer, best bangladeshi web developer, best bangladeshi java developer, best bangladeshi python developer, best bangladeshi developer, best bangladeshi application developer, best bangladeshi app developer" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Hasibul Hasan Rupok" />
  <meta property="og:description"
    content="Hasibul Hasan Rupok, Hasibul, Hasan, Rupok, Hasibul Rupok, Web developer, bangladeshi web-development, bangladeshi web development, bangladeshi developer, java developer, bangladeshi java developer, bangladeshi java app developer, python developer, bangladeshi python developer, bangladeshi python app developer, best bangladeshi web developer, best bangladeshi java developer, best bangladeshi python developer, best bangladeshi developer, best bangladeshi application developer, best bangladeshi app developer" />

  <meta name="brand_name" content="Hasibul Hasan Rupok" />
  <meta name="author" content="Hasibul Hasan Rupok" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="files/tabIcon.png">

  <!-- tailwind -->
  <link rel="stylesheet" href="dist/output.css" />
  <!-- font-awesome -->
  <link rel="stylesheet" href="css/all.css" />
  <!-- custom css -->
  <link rel="stylesheet" href="css/index.css" />
  <!-- <link rel="stylesheet" href="../css/navAndHome.css" /> -->
  <link rel="stylesheet" href="css/profile.css" />
  <link rel="stylesheet" href="css/aboutMeDetail.css">
  <link rel="stylesheet" href="css/footer.css">
  <title>Hasibul Hasan Rupok</title>
</head>

<!-- oncontextmenu="return false" -->

<body oncontextmenu="return true">
  <section class="bg-circles">
    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>
    <div class="circle-4"></div>
  </section>

  <section class="w-11/12 mx-auto h-5/6 my-auto bodySection">
    <!-- navbar  sm:block sm:mt-2 sm:w-fit sm:mx-auto       -->
    <nav class="bg-transparent">
      <ul class="list-none lg:flex lg:justify-end md:flex md:justify-end navWidthSm navInFull" id="liContainer"
        style="display: none ;">
        <li class="mx-2 px-2 activePage" id="homeBtn" onclick="navBtnClicked()">
          <button href="">Home</button>
        </li>
        <li class="mx-2 px-2" onclick="navBtnClicked()">
          <a href="#about-me-section">Profile</a>
        </li>
        <li class="mx-2 px-2" onclick="navBtnClicked()"><a href="#recent-work-section">Recent-work</a></li>
        <li class="mx-2 px-2" onclick="navBtnClicked()"><a href="#contactMeSection">Contact Me</a></li>
      </ul>
      <button class="resNavBtn text-xl" id="menuButton" onclick="menuButtonClicked()">
        <i class="fa-solid fa-bars"></i>
      </button>
    </nav>


    <section class="md:flex justify-between mt-5 homeInSmall homeParent align-item-center " id="homeSection">
      <div class="justify-items-center homeSplit w-1/2">
        <div class="vertically-Center">
          <p>Hello i'm</p>
          <h1 class="text-2xl font-bold name"><?php echo $personalInfo['name']; ?></h1>
          <p><?php echo $personalInfo['title']; ?></p>

          <div class="md:inline twoButtonParent">
            <!-- <button class="twoButton" id="moreBBtn" href="pages/profile.html">More About Me</button> -->
            <a class="twoButton" id="moreBBtn" href="#about-me-section">More About Me</a>
            <button class="twoButton"><a class="" target="_blank" href="files/cv.pdf">View CV</a></button>
          </div>
        </div>
      </div>

      <div class="w-1/2 homeSplit homeImage">
        <div class="vertically-Center">
          
          <?php if (isset($personalInfo['image1']) && $personalInfo['image1']): ?>
            <img class="mx-auto dp-1" id="homeDp" src="<?php echo $personalInfo['image1']; ?>" alt="" />
          <?php else: ?>
            <img class="mx-auto dp-1" id="homeDp" src="files/dp2.png" alt="" />
          <?php endif; ?>

        </div>
      </div>
    </section>

    <section id="about-me-section" class="">
      <!-- about me section  -->
      <h1 class="topTitle">About Me</h1>

      <!-- image and text div  -->
      <div class="md:flex w">
        <!-- img div  -->
        <div class="halfWidth w-2/5">
          
          <?php if (isset($personalInfo['image2']) && $personalInfo['image2']): ?>
            <img class="dpImage" src="<?php echo $personalInfo['image2']; ?>" alt="" />
          <?php else: ?>
            <img class="dpImage" src="files/dp.png" alt="" />
          <?php endif; ?>

        </div>
        <div class="halfWidth md:ml-3 md:pl-3 textContainer">
          <div class="aboutText">
            <?php if (isset($personalInfo['aboutMe']) && $personalInfo['aboutMe']): ?>
              <?php echo $personalInfo['aboutMe']; ?>
            <?php endif; ?>
          </div>

          <!-- skill section  -->
          <div class="skillContainer">
            <h3 class="text-2xl font-semibold skillTitle">Skills</h3>
            <div class="skillList">
              <!-- <p class="eachSkill">C</p> -->

              <?php foreach($skills as $skill): ?>
                <p class="eachSkill"><?php echo $skill['skillName'];  ?></p>
              <?php endforeach; ?>

            </div>
          </div>

          <!-- </div>
          <div> -->

          <!-- education exp  -->
          <div>

          </div>
        </div>
    </section>

    <section id="about-me-detail-section">
      <div id="profile-info-buttons-container">
        <button class="text-2xl expButton activeExpButton" id="educationBtn">Education </button>
        <button class="text-2xl expButton" id="experienceBtn">Experience</button>
        <button class="text-2xl expButton" id="awardBtn">Award</button>
        <button class="text-2xl expButton" id="publicationBtn">Publication</button>
      </div>
      <!-- Education -->
      <div class="timeline" id="educationTab" style="display:block;">
        <div class="container right">

          <div class="content">
            <h3>2020 - 2023</h3>
            <h2>
              Bsc in Computer Science & Engineering -
              <span>United International Unitersity</span>
            </h2>
            <p>
              I'm really enjoying my study with my university, my favorite subjects are Data Structure and
              Algorithm, Digital Image Processing, Deep Learning, Artifical Intelligence. I enjoy the theory
              courses but i love to practice the thing that i learn in the theory courses in the lab. My
              favourite
              language is JAVA but I also comfortable with CPP, Python.
            </p>
          </div>

        </div>
        <div class="container right">
          <div class="content">
            <h3>2017 - 2019</h3>
            <h2>
              Higher Secondary School certificate -
              <span>MJF School & College</span>
            </h2>
            <p>
              GPA 5.00 out of 5.00 from Science group, my favourite subject was Higher-Mathematics, I used to
              practice math minimum 20 hours in a week. I passed from MJF School and College, Shariatpur.
            </p>
          </div>
        </div>
        <div class="container right">
          <div class="content">
            <h3>2016 - 2017</h3>
            <h2>
              Secondary School certificate -
              <span>MJF School & College</span>
            </h2>
            <p>
              GPA 5.00 out of 5.00(group Science) from Dhaka education board, I passed from MJF School and
              College, Shariatpur.
            </p>
          </div>
        </div>
      </div>

      <!-- Experience -->
      <div class="timeline" id="experienceTab" style="display:none;">
        <div class="container right">

          <div class="content">
            <h3>January 2024 to Ongoing</h3>
            <h2>
              Lecturer at the Department of CSE -
              <span>United International University</span>
            </h2>
            <p>
              After completing my bachelor degree, i have joined here as a lecturer (in contract), currently i am taking
              Data Stracture & Algorithm, Structure Programming Language, Digital Logic Design, Theory of Computation,
              Discrete Mathematics, and Introduction to Computer Science courses.
            </p>
          </div>

        </div>

        <div class="container right">

          <div class="content">
            <h3>Fall 2022</h3>
            <h2>
              Undergrade Teaching Assistant -
              <span>Data Structure & Algorithm 2 Lab</span>
            </h2>
            <p>
              Now i'm am pursuing my bachelor degree in CSE from United International University and at the same
              time I joined here as an Undergrade Teaching Assistant for Data Structure & Algorithm-II Labratory
              course.
            </p>
          </div>

        </div>
        <div class="container right">
          <div class="content">
            <h3>Since 2023</h3>
            <h2>
              Full Stack Web Development -
              <span>More than 1.5 years</span>
            </h2>
            <p>
              I started my web-development journey since 2020, till now i'm trying to learn the new thing and
              also
              trying to Web-3.0
            </p>
          </div>
        </div>
        <div class="container right">
          <div class="content">
            <h3>Summer 2023 - Fall 2023</h3>
            <h2>
              Grader at the Department of CSE -
              <span>United International University</span>
            </h2>
            <p>
              I worked here for 2 semester as a grader, where i checked the answer script and prepared the grade sheet.
            </p>
          </div>
        </div>
      </div>

      <!-- Award -->
      <div class="timeline" id="awardTab" style="display:none;">
        <div class="container right">

          <div class="content">
            <h3>2 January 2023</h3>
            <h2>First Runner Up - <span>CSE project show Fall 2022</span></h2>
            <p>
              It was a project for System Analysis and Design lab course named 'Tour Planner'. It is a web
              bassed application which will help a person for planning a tour to end a tour.
            </p>
          </div>

        </div>
        <div class="container right">

          <div class="content">
            <h3>2 January 2023</h3>
            <h2>First Runner Up - <span>CSE project show Fall 2022</span></h2>
            <p>
              It was a project for Micro Processor & Micro Controllers lab course named 'Smart Coffee Both'. By
              using this machine a user can register her/himself by RFID and then can buy coffee, it will
              remember the coffee test of that user and next time a user can get the same coffee just by a
              silgle click.
            </p>
          </div>

        </div>
        <div class="container right">

          <div class="content">
            <h3>19 September 2022</h3>
            <h2>Second Runner Up - <span>CSE project show Summer 2022</span></h2>
            <p>
              It was a project for Database Management System Labratory course, the project was a baby sitter
              applycation maned BabySitter BD. User can take care of babies and also can hire someone to take
              care
              of his/her baby. Project is available on my GitHub.
            </p>
          </div>

        </div>
        <div class="container right">

          <div class="content">
            <h3>August 2016</h3>
            <h2>Champion - <span> Science Fair 2016</span></h2>
            <p>
              I made a project on renewable fuel, where we can produce gassoline from some renewable source,
              this
              project became first on that category.
            </p>
          </div>

        </div>
        <div class="container right">

          <div class="content">
            <h3>February 2016</h3>
            <h2>Champion - <span> National Electricity and Fuel Week 2016 Speech Competition</span></h2>
            <p>
              In 2016 there was a nationally arranged Speech Competition on electricity and fuel, i participate
              on
              that competition and grab the first position.
            </p>
          </div>

        </div>

      </div>

      <!-- Publication -->
      <div class="timeline" id="publicationTab" style="display:none;">
        <div class="container right">

          <div class="content">
            <h3>27 April, 2024</h3>
            <h2>ElectroSortNet: A Novel CNN Approach for E-Waste Classification and IoT-Driven Separation System.
              <span></span>
            </h2>
            <p>
              Author(s): <strong>Hasibul Hasan Rupok</strong>, Nahian Sourov, Sanjida Jannat Anannaya, Amina Afroz,
              Mahmudul Hasan Bipul, Md. Motaharul Islam.
            </p>
            <div class="publication-view-link">
              <a href="https://ieeexplore.ieee.org/abstract/document/10561784" target="_blank">View</a>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- recent work  -->
    <section class="" id="recent-work-section">
      <h2 class="text-center text-2xl font-bold">My Recent Works</h2>

      <div class="mt-3">
        <div class="row md:flex md:justify-between ">
          <div>
            <img class="" src="files/virtual.jpeg" alt="">
            <p class="ml-3">Virtual Assistent</p>

            <div class="flex justify-between projectViewBtns">
              <a class="ml-3" href="https://youtu.be/ViZtKUgJHMQ" target="_blank">View Project</a>
              <button class="ml-3" href="" target="_blank" value="virtual assistent"
                onclick="viewDetails(this.value)">View Details</button>
            </div>

          </div>

          <div>
            <img class="" src="files/Screenshot 2022-10-04 at 12.24.30 PM.png" alt="">
            <p class="ml-3">BabySitter BD</p>
            <div class="flex justify-between projectViewBtns">
              <a class="ml-3" href="https://github.com/HasibulRupok/BabySitter" target="_blank">View Project</a>
            </div>

          </div>

          <div id="id0">
            <img class="" src="files/techShop.png" alt="">
            <p class="ml-3">Tech-Shop</p>
            <div class="flex justify-between projectViewBtns">
              <a class="ml-3" href="https://github.com/HasibulRupok/TechShop-by-JAVA" target="_blank">View Project</a>
            </div>
          </div>



        </div>
        <!-- row2 -->
        <div class="row md:flex md:justify-between ">
          <div>
            <img class="" src="files/googlephotoshare.jpeg" alt="">
            <p class="ml-3">Google_Photos Sharing Bot</p>
            <div class="flex justify-between projectViewBtns">
              <a class="ml-3" href="https://youtu.be/h-rhAW5tiX8" target="_blank">View Project</a>
            </div>
          </div>

          <div>
            <img class="" src="files/emailSender.png" alt="">
            <p class="ml-3">Auto Email Sender</p>
            <div class="flex justify-between projectViewBtns">
              <a class="ml-3" href="https://github.com/HasibulRupok/Email-sender" target="_blank">View Project</a>
            </div>
          </div>

          <div>
            <img class="" src="files/blockchain.png" alt="">
            <p class="ml-3">Blockchain in JAVA</p>
            <div class="flex justify-between projectViewBtns">
              <a class="ml-3" href="https://github.com/HasibulRupok/BlockChain-in-JAVA" target="_blank">View
                Project</a>
            </div>
          </div>
        </div>
        <!-- row3 -->
        <div class="row md:flex md:justify-between ">
          <div>
            <img class="" src="files/tic-tac-toe.jpeg" alt="">
            <p class="ml-3">Tic Tac Toe</p>
            <div class="flex justify-between projectViewBtns">
              <a class="ml-3" href="https://github.com/HasibulRupok/TikTakToe-by-JAVA" target="_blank">View
                Project</a>
            </div>
          </div>

          <div>
            <img class="" src="files/live weather.png" alt="">
            <p class="ml-3">Live Weather</p>
            <div class="flex justify-between projectViewBtns">
              <a class="ml-3" href="https://hasibulrupok.github.io/Live-Weather/" target="_blank">View Project</a>
            </div>
          </div>

          <div>
            <img class="" src="files/personal portfolio.png" alt="">
            <p class="ml-3">Personal Portfolio</p>
            <div class="flex justify-between projectViewBtns">
              <a class="ml-3" href="https://hasibulrupok.github.io/personal-portfolio/" target="_blank">View
                Project</a>
            </div>
          </div>
        </div>
      </div>
      <!-- recent work end -->
    </section>

    <!-- contact me section  -->
    <section class="" id="contactMeSection">
      <h2 class="text-2xl centerdText font-bold">Contact Me</h2>

      <div class="md:flex">
        <div class="splitContact">
          <input class="contactInput" type="text" placeholder="Name" id="inputName"> <br>
          <input class="contactInput" type="text" placeholder="Subject" id="inputSubject"> <br>
          <input class="contactInput" type="text" placeholder="Email" id="inputEmail"> <br>
          <textarea class="contactInput" name="" id="inputMessage" cols="30" rows="4" placeholder="Message"></textarea>
          <br>

          <button id="sendMessageBtn">Send Message</button>
          <p id="messageNotification"></p>

        </div>
        <div class="splitContact myInfo">
          <div>
            <h3>Email</h3>
            <p class="phone-email"><?php echo $personalInfo['email1']; ?></p>

            <?php if (isset($personalInfo['email2']) && $personalInfo['email2']): ?>
              <p class="phone-email"><?php echo $personalInfo['email2']; ?></p>
            <?php endif; ?>
          </div>

          <div>
            <h3>Phone</h3> 

            <?php if (isset($personalInfo['phone1']) && $personalInfo['phone1']): ?>
              <p class="phone-email"><?php echo $personalInfo['phone1']; ?></p>
            <?php endif; ?>

            <?php if (isset($personalInfo['phone2']) && $personalInfo['phone2']): ?>
              <p class="phone-email"><?php echo $personalInfo['phone2']; ?></p>
            <?php endif; ?>
          </div>

          <div class="followMe">
            <h3>Follow Me</h3>
            <div class="socialMedia">

              <?php if (isset($personalInfo['linkedin']) && $personalInfo['linkedin']): ?>
                <a href="<?php echo $personalInfo['linkedin']; ?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
              <?php endif; ?>

              <?php if (isset($personalInfo['github']) && $personalInfo['github']): ?>
                <a href="<?php echo $personalInfo['github']; ?>" target="_blank"><i class="fa-brands fa-github"></i></a>
              <?php endif; ?>

              <?php if (isset($personalInfo['youtube']) && $personalInfo['youtube']): ?>
                <a href="<?php echo $personalInfo['youtube']; ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a>
              <?php endif; ?>

              <?php if (isset($personalInfo['facebook']) && $personalInfo['facebook']): ?>
                <a href="<?php echo $personalInfo['facebook']; ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a>
              <?php endif; ?>

              <?php if (isset($personalInfo['instagram']) && $personalInfo['instagram']): ?>
                <a href="<?php echo $personalInfo['instagram']; ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
              <?php endif; ?>

            </div>
          </div>

        </div>
      </div>

    </section>
    <!-- total section end -->
  </section>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/index.js"></script>
  <script src="js/navAndHome.js"></script>
  <script src="js/profile.js"></script>
</body>

</html>