jQuery(document).ready( function( $ ) {


  /*  image  Select Module [begin]  */

  var target = null;
  var targetid = null;
  var view = null;

  var frame = null;


  $(".upload_image_button").click(function() {

    target = $(this).attr("target");
    targetid = $(this).attr("targetid");
    view = $(this).attr("view");


    frame = wp.media({
      title: 'Select  a  Image..',
      button: {
        text: 'Use this media'
      },
      multiple: true  // Set to true to allow multiple files to be selected
    });




    frame.on("open",function(){


      var defaultid = $(targetid).val();
      var selection = frame.state().get('selection');
      var ids = defaultid.split(",");
      console.log(ids);

      ids.forEach(function(id) {
        attachment = wp.media.attachment(id);
        attachment.fetch();
        selection.add( attachment ? [ attachment ] : [] );
      });
    });



      // When an image is selected in the media frame...
     frame.on( 'select', function() {

       // Get media attachment details from the frame state
       var attachment = frame.state().get('selection').toJSON();
       var allimg = new Array();
       for(var key in attachment){
          allimg.push(attachment[key].id);
       }
       $(target).val(allimg.join());
     });



      if(frame){
        frame.open();
        return;
      }
  });




  /*  image  Select Module [end]  */



});
