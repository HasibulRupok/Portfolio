// nav toggle function
// $("#menuButton").click(function () {
//   $("#liContainer").toggle();
// });

const menuButtonClicked = () => {
  let nav = document.getElementById("liContainer").style.display;
  // console.log(nav);
  var viewportWidth = $(window).width();
  // console.log(viewportWidth);

  if (nav == 'none') {
    console.log("here");
    if (viewportWidth > 768) {
      document.getElementById("liContainer").style.display = 'flex';
    }
    else {
      document.getElementById("liContainer").style.display = 'block';
    }
  }
  else {
    document.getElementById("liContainer").style.display = 'none';
  }
}

const navBtnClicked = () => {
  menuButtonClicked();
}
