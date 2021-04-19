$(document).ready(function(){
  var key = "";
  function showPosts() {
          key = $("#search").val() == ""? "empty":$("#search").val();
    var n = $("#category").val();
    if(key === "empty") {
      n = 4;
    }
          $.post("search.php", {keyword: key, num: n})
          .done(function(data) {
      if(data === "") {
        $.post("search.php", {keyword: key, num: 5})
        .done(function(data) {
          $("#main-post").html(data);
        });
      }
      else {
        $("#main-post").html(data);
      }
          });
       }
  showPosts();
  $("#search").keyup(showPosts);
});