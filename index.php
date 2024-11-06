<?php
  require 'backend/bdConnection.php';

  $personalInfo = null;
  $skills = null;
  $errors = "";
  try {
    // Query for personal info 
    $statement = $pdo->prepare("SELECT * FROM `personal-info` WHERE 1");
    $statement->execute();
    $personalInfo = $statement->fetch(PDO::FETCH_ASSOC);

    // Query for skills 
    $statement = $pdo->prepare("SELECT * FROM `skills` WHERE 1");
    $statement->execute();
    $skills = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Query for education
    $statement = $pdo->prepare("SELECT * FROM `education` ORDER BY `priority` ASC;");
    $statement->execute();
    $educations = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Query for experiance
    $statement = $pdo->prepare("SELECT * FROM `experiance` ORDER BY `priority` ASC;");
    $statement->execute();
    $experiances = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Query for award
    $statement = $pdo->prepare("SELECT * FROM `award` ORDER BY `priority` ASC;");
    $statement->execute();
    $awards = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Query for Publication
    $statement = $pdo->prepare("SELECT * FROM `publication` ORDER BY `priority`ASC;");
    $statement->execute();
    $publications = $statement->fetchAll(PDO::FETCH_ASSOC);

    
  } catch (PDOException $e) {
    if(!$personalInfo){
      $errors = $errors . "No personal data found ";
    }
    if(!$skills){
      $errors = $errors . "No skill data found ";
    }
    if(!$educations){
      $errors = $errors . "No education data found ";
    }

    header("Location: pages/error.php?error=" . urlencode($errors));
    exit();
  }

  // echo '<pre>'; var_dump($skills); echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- SEO Meta Tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="title" content="Hasibul Hasan Rupok | Lecturer, Developer, and ML Enthusiast" />
  <meta name="description" content="Portfolio of Hasibul Hasan Rupok, a lecturer in CSE, full stack web developer, and machine learning enthusiast from Dhaka, Bangladesh." />
  <meta name="keywords" content="Hasibul Hasan Rupok, lecturer, web developer, machine learning, full stack, portfolio, projects, CSE, Dhaka, Bangladesh" />
  <meta name="robots" content="index, follow" />
  <meta name="author" content="Hasibul Hasan Rupok" />
  <link rel="canonical" href="http://www.hasibul-rupok.com/" />

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="http://www.hasibul-rupok.com/" />
  <meta property="og:title" content="Hasibul Hasan Rupok | Lecturer, Developer, and ML Enthusiast" />
  <meta property="og:description" content="Discover the work of Hasibul Hasan Rupok, lecturer in CSE, web developer, and machine learning enthusiast from Dhaka." />
  <meta property="og:image" content="http://www.hasibul-rupok.com/files/myImage/WhiteShirt.png" />

  <!-- Twitter  -->
  <meta property="twitter:card" content="summary_large_image" />
  <meta property="twitter:url" content="http://www.hasibul-rupok.com/" />
  <meta property="twitter:title" content="Hasibul Hasan Rupok | Lecturer, Developer, and ML Enthusiast" />
  <meta property="twitter:description" content="Explore the portfolio of Hasibul Hasan Rupok, an educator (lecturer in CSE), developer, and researcher in machine learning and web development." />
  <meta property="twitter:image" content="http://www.hasibul-rupok.com/files/myImage/WhiteShirt.png" />

  <!-- Favicon -->
  <link rel="icon" href="files/tabIcon.png">

  <!-- ****** Old SEO ******* -->
  <!-- <meta name="title" content="Hasibul Hasan Rupok" />
  <meta name="description"
    content="Hi, my name is Hasibul Hasan Rupok. I am a full stack web developer and machine learning enthusiast. I am from Dhaka, Bangladesh. Currently, I am pursuing my bachelor degree in Computer Science and Engineering from the Department of Computer Science and Engineering, United International University." />
  <meta name="keywords"
    content="Hasibul Hasan Rupok, Hasibul, Hasan, Rupok, Hasibul Rupok, Web developer, bangladeshi web-development, bangladeshi web development, bangladeshi developer, java developer, bangladeshi java developer, bangladeshi java app developer, python developer, bangladeshi python developer, bangladeshi python app developer, best bangladeshi web developer, best bangladeshi java developer, best bangladeshi python developer, best bangladeshi developer, best bangladeshi application developer, best bangladeshi app developer" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Hasibul Hasan Rupok" />
  <meta property="og:description"
    content="Hasibul Hasan Rupok, Hasibul, Hasan, Rupok, Hasibul Rupok, Web developer, bangladeshi web-development, bangladeshi web development, bangladeshi developer, java developer, bangladeshi java developer, bangladeshi java app developer, python developer, bangladeshi python developer, bangladeshi python app developer, best bangladeshi web developer, best bangladeshi java developer, best bangladeshi python developer, best bangladeshi developer, best bangladeshi application developer, best bangladeshi app developer" />
  <meta name="brand_name" content="Hasibul Hasan Rupok" />
  <meta name="author" content="Hasibul Hasan Rupok" /> -->
  <!-- ******* old SEO end ****** -->

  <link rel="stylesheet" href="dist/output.css" /> <!-- tailwind -->
  <link rel="stylesheet" href="css/all.css" /> <!-- font-awesome -->
  <!-- custom css -->
  <link rel="stylesheet" href="css/index.css" />
  <link rel="stylesheet" href="css/profile.css" />
  <link rel="stylesheet" href="css/aboutMeDetail.css">
  <link rel="stylesheet" href="css/footer.css">
  
  <title>Hasibul Hasan Rupok | Lecturer, Developer, and ML Enthusiast</title>

  <!-- Structured Data (JSON-LD for Rich Results) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "Hasibul Hasan Rupok",
    "jobTitle": ["Lecturer", "Full Stack Web Developer", "Machine Learning Enthusiast"],
    "url": "http://www.hasibul-rupok.com/",
    "sameAs": [
      "https://www.facebook.com/rupok.4/",
      "https://www.instagram.com/hasibul_rupok/",
      "https://www.youtube.com/channel/UCI_i7XC4bYxkbcmS3RhVueg",
      "https://www.linkedin.com/in/hasibul-rupok/",
      "https://github.com/HasibulRupok"
    ],
    "image": "http://www.hasibul-rupok.com/files/myImage/WhiteShirt.png",
    "worksFor": [
      {
        "@type": "Organization",
        "name": "Uttara University",
        "department": "CSE",
        "jobTitle": "Lecturer"
      },
      {
        "@type": "Organization",
        "name": "United International University",
        "department": "CSE",
        "jobTitle": "Contractual Lecturer"
      }
    ],
    "alumniOf": {
      "@type": "University",
      "name": "United International University",
      "sameAs": "https://www.uiu.ac.bd/"
    },
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Dhaka",
      "addressCountry": "Bangladesh"
    }
  }
  </script>
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
        <?php foreach($educations as $education): ?>
          <div class="container right">
            <div class="content">
              <h3><?php echo $education['duration']; ?></h3>
              <h2>
              <?php echo $education['degree']; ?> -
                <span><?php echo $education['institution']; ?></span>
              </h2>
              <p><?php echo $education['description']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>

        <!-- <div class="container right">
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
        </div> -->

      </div>

      <!-- Experience -->
      <div class="timeline" id="experienceTab" style="display:none;">
        <?php foreach($experiances as $experiance): ?>
          <div class="container right">
            <div class="content">
              <h3><?php echo $experiance['duration']; ?></h3>
              <h2>
                <?php echo $experiance['title']; ?> -
                <span><?php echo $experiance['organization']; ?></span>
              </h2>
              <p> <?php echo $experiance['description']; ?> </p>
            </div>
          </div>
        <?php endforeach; ?>

        <!-- <div class="container right">
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
        </div> -->
        
      </div>

      <!-- Award -->
      <div class="timeline" id="awardTab" style="display:none;">
        <?php foreach($awards as $award): ?>
          <div class="container right">
            <div class="content">
              <h3><?php echo $award['time'];?></h3>
              <h2><?php echo $award['placement'];?> - <span><?php echo $award['competation'];?></span></h2>
              <p><?php echo $award['description'];?></p>
            </div>
          </div>
        <?php endforeach; ?>
        <!-- <div class="container right">
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
        </div> -->

      </div>

      <!-- Publication -->
      <div class="timeline" id="publicationTab" style="display:none;">
        <?php foreach($publications as $publication): ?>
          <div class="container right">
            <div class="content">
              <h3><?php echo $publication['date']; ?></h3>
              <h2><?php echo $publication['title']; ?>
                <span></span>
              </h2>
              <p>
              Author(s): <?php echo $publication['author']; ?>
              </p>
              <div class="publication-view-link">
                <a href="<?php echo $publication['link']; ?>" target="_blank">View</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
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