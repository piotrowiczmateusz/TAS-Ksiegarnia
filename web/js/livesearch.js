$(function()
{
  // a = 0;
  // var i = setInterval( timer, 1000 );
  //
  // function timer() {
  //     console.log( a );
  //     if ( a > 2 ) {
  //       clearInterval( i );
  //         return;
  //     }
  //     a += 1;
  // }

  $("#search").on("input",function(){


                      $search = $("#search").val();
                      if($search.length>0){
                          $.get("/search-book",{"search":$search},function($data){
                              $("#result").html($data)
                          })
                      }
                      else
                      {
                        $(".liveSearch").css("display","none");
                          $(".liveSearchRow2").css("display","none");
                      }
  });
});
