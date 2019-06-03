$(document).ready(function(){

 //envoyer tweet
    $('#post_form').on('submit', function(event){
           event.preventDefault();
           if($('#post_content').val() == '') {
               alert('Enter Story Content');
           }
           else {
               var form_data = $(this).serialize();
             
               $.ajax({
                            url:"../controleur/home.php",
                            method:"POST",
                            data:form_data,
                             
            
                            success:function(data)
                            {
                                alert('Post has been shared');
                                $('#post_form')[0].reset();
                                
                                fetch_post();
                                
                                
                            }
                      })
            }
    });

    // afficher tweet
   fetch_post();

    function fetch_post()
    {
       
            var action = 'fetch_post';
            
            $.ajax({
                url:"../controleur/home.php",
                method:"POST",
                // dataType:'JSON',
                data:{action:action},
                // beforeSend:function() {
                //     $('#post_list').empty();
                            

                // },
              
                success:function(data)
                {
                
                    // $.each(JSON.parse(data),function(index, element) {
                
                    //     $('#avatar').append(' <img src="../assets/membres/avatar/'+element.avatar+'" class="img-thumbnail" width="150"/>');

                    //     $('#tweet_info').append('<div class = "col-md-8"><h3>'+element.username+'</h3><p>'+element.content+'</p><p>'+ element.tweet_date+'</p></div>');
                       
                       
                    // })  
                    // $('#avatar').append(data);

                    // $('#tweet_info').append(data);
                    $('#post_list').prepend(data);
                        
                    
                                         
                }
               
            });  
    }

 // list user
    fetch_user();
    function fetch_user()
    {
        var action = 'fetch_user';

        $.ajax({
            url:"../controleur/home.php",
            method:"POST",
            data:{action:action},
          
            success:function(data)
            {

                $('#user_list').prepend(data);
                // $(data).appendTo('#post_list');
            }

        });
    }
    var id_tweet;
    var id_user;

    $(document).on('click','.post_comment',function(){
        id_tweet = $(this).attr("id");
        console.log(id_tweet);
        id_user = $(this).data('id_user')
        $('#comment_form'+id_tweet).slideToggle('slow');
    });
    // $(document).on('click','.submit_comment',function(){
    //     var comment = $('#comment'+id_tweet).val();
    //     var action ='submit_comment';
    //     var recreiver_id = id_user;
    //     if(comment !='') {
    //         $.ajax({
    //             url:"../controleur/home.php",
    //             method:"POST",
    //             data:{action:action},
    //             // data:{id_tweet:id_tweet,receiver_id:receiver_id,comment:comment,action:action},
    //             success:function(data)
    //             {
    //                 console.log(data);
    //                 $('#comment_form'+id_tweet).slideUp('slow');
    //                 fetch_post()

    //             }
    //         })

    //     }
    // })
//     $('#search_form').on('submit', function(event){
//         event.preventDefault();
//         if($('#search_content').val() == '') {
//             alert('You need to enter a research!');
//         }
//         else {
//             var form_data = $(this).serialize();
          
//             $.ajax({
//                          url:"../controleur/search.php",
//                          method:"post",
//                          data:form_data,
                          
    
//                          success:function(data)
//                          {
//                              console.log(data);
//                              $('#post_form')[0].reset();
                             
//                              search_user();
                             
                             
//                          }
//                    })
//          }
//  });

//  search_user();
//  function search_user()
//  {
//      var action = 'search_user';

//      $.ajax({
//          url:"../controleur/search.php",
//          method:"post",
//          data:{action:action},
       
//          success:function(data)
//          {
//              console.log(data)

//              $('#search_list').prepend(data);
//              // $(data).appendTo('#post_list');
//          }

//      });
//  }

 fetch_user_twitt();
 function fetch_user_twitt()
 {
     var action = 'fetch_user_twitt';

     $.ajax({
         url:"../controleur/home.php",
         method:"POST",
         data:{action:action},
       
         success:function(data)
         {
             console.log(data)

             $('#twitt_list').prepend(data);
    
         }

     });
 }

 count_user_twitt();
 function count_user_twitt()
 {
     var action = 'count_user_twitt';

     $.ajax({
         url:"../controleur/home.php",
         method:"POST",
         data:{action:action},
       
         success:function(data)
         {
             console.log(data)

             $('#count_twitt').prepend(data);
         }

     });
 }

 count_follower();
 function count_follower()
 {
     var action = 'count_follower';

     $.ajax({
         url:"../controleur/home.php",
         method:"POST",
         data:{action:action},
       
         success:function(data)
         {
             $('#count_follower').prepend(data);
         }

     });
 }

 count_following();
 function count_following()
 {
     var action = 'count_following';

     $.ajax({
         url:"../controleur/home.php",
         method:"POST",
         data:{action:action},
       
         success:function(data)
         {
             $('#count_following').prepend(data);
           
         }

     });
 }
 getFollowing();
 function getFollowing()
 {
     var action = 'get_following';

     $.ajax({
         url:"../controleur/home.php",
         method:"POST",
         data:{action:action},
       
         success:function(data)
         {
             $('#following').prepend(data);
           
         }

     });
 }

 getFollow();
 function getFollow()
 {
     var action = 'get_follow';

     $.ajax({
         url:"../controleur/home.php",
         method:"POST",
         data:{action:action},
       
         success:function(data)
         {
             $('#follower').prepend(data);
           
         }

     });
 }


 $('#search_form').on('submit', function(event){
    event.preventDefault();
    if($('#search').val() == '') {
        alert('Enter users');
    }
    else {
        var form_data = $(this).serialize();
       
        $.ajax({
                     url:"../controleur/home.php",
                     method:"POST",
                     data:form_data,
     
                     success:function(data)
                     {
                         $('#result').html(data);
                            
                     }
               })
        }
});




});
   
   