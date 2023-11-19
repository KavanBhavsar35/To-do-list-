$(document).ready(function () {
  $(".data-table").each(function (_, table) {
    $(table).DataTable();
  });
});

$(document).ready(function () {
  $(".data-table").each(function (_, table) {
    $(table).DataTable();
  });
  // Initialize DataTable
  $("#example_length #example_filter").hide();
  // Initially hide all pages
  $("#example").hide();

  // Show the default active page (Home)
  //  $("#home").show();

  // Handle navigation clicks
  $(".nav-link").click(function () {
    console.log("created")
    //  e.preventDefault();
    var target = $(this).attr("href");

    // Hide all pages
    $(".page").hide();

    // Remove "active" class from all links
    $(".nav-link").removeClass("active");

    // Add "active" class to the clicked link
    $(this).addClass("active");

    // Show the target page
    $(target).show();
  });
});

