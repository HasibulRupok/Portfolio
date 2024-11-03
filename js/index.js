// nav toggle function
// $("#menuButton").click(function () {
//   $("#liContainer").toggle();
// });

$(document).ready(function () {
  var viewportWidth = $(window).width();
  if (viewportWidth < 768) {
    $(".vertically-Center").removeClass("vertically-Center");
    // $(".content-inner.active").removeClass("active");
  }

  $(document).ready(function () {
    // more click
    $("#moreBBtn").click(function () {
      // window.location.pathname = "../pages/profile.html";
    });

    $("#sendMessageBtn").click(function () {
      const name = $("#inputName").val();
      const subject = $("#inputSubject").val();
      const email = $("#inputEmail").val();
      const message = $("#inputMessage").val();

      if (name && subject && email && message) {
        $("#inputName").val('');
        $("#inputSubject").val('');
        $("#inputEmail").val('');
        $("#inputMessage").val('');

        document.getElementById("messageNotification").innerText = "We received your message but it is recomended to mail";
      }
      else {
        document.getElementById("messageNotification").innerText = "Provide all the information properly. NOTE: it is recomended to mail";
      }
    });
  });
});

const viewDetails = item =>{
  if(item !== ""){
    sessionStorage.setItem("viewItem", item);
    window.open("../pages/details.html", "_blank");
  }
}
