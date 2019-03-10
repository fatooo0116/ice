<?php




/*
*   @Title: ajax   cal  CRUD - Read
*
*/
function cal_read_fun(){
   // global $woocommerce;
   // $woocommerce->cart->add_fee( __('Custom', 'woocommerce'), 5 );
   // $result = WC()->cart->add_to_cart( 8, 1 ,0,array(),array("fee"=>"a4"));

   $data = $_POST["data"];



   global $wpdb;
   $custom_db_name = $wpdb->prefix . 'calendar_date';
   $sql = "SELECT * FROM ".$custom_db_name." WHERE post=".$data['data'].' order by date DESC';
   $mylink = $wpdb->get_results($sql);


      $custom_db_type = $wpdb->prefix.'exam_type';
      $sql_type = "SELECT * FROM ".$custom_db_type;
      $myallType = $wpdb->get_results($sql_type);
      foreach( $myallType as $vt){
          $alltype[$vt->id] = $vt->type_name;
      }

      $custom_db_group = $wpdb->prefix.'exam_group';
      $sql_group = "SELECT * FROM ".$custom_db_group;
      $myallgroup = $wpdb->get_results($sql_group);
      foreach( $myallgroup as $vg){
          $allgroup[$vg->id] = $vg->group_name;
      }


    foreach( $mylink as $value){

        $custom_db_type = $wpdb->prefix.'exam_type_relative';
        $sql_type = "SELECT * FROM ".$custom_db_type." WHERE exam_id=".$value->id;
        $myType = $wpdb->get_results($sql_type);
        foreach($myType  as $vx){
              $vx->name = $alltype[$vx->type_id];
              $value->type[] = $vx;
        }


        $custom_db_group = $wpdb->prefix.'exam_group_relative';
        $sql_group = "SELECT * FROM ".$custom_db_group." WHERE exam_id=".$value->id;
        $myGroup = $wpdb->get_results($sql_group);
        foreach($myGroup  as $vg){
              $vg->name = $allgroup[$vg->group_id];
              $value->group[] = $vg;
        }

    }



   //print_r($_POST["data"]);

    $out = array(
      'data' => $mylink,
    );
    echo json_encode($out);

   die();
 }
 add_action('wp_ajax_nopriv_cal_read', 'cal_read_fun');
 add_action('wp_ajax_cal_read', 'cal_read_fun');






/*
*   @Title: ajax   cal  CRUD - insert
*
*/
function cal_insert_fun(){
   // global $woocommerce;
   // $woocommerce->cart->add_fee( __('Custom', 'woocommerce'), 5 );
   // $result = WC()->cart->add_to_cart( 8, 1 ,0,array(),array("fee"=>"a4"));

   $data = $_POST["data"];


   global $wpdb;
   $custom_db_name = $wpdb->prefix . 'calendar_date';


   if($data['prid']==0){  /*  insert */
         $result = $wpdb->insert(
             $custom_db_name,
             array(
                 'post' => $data['pid'],
                 'date' => Date($data['date']),
                 'url' => $data['exurl'],
                 'title' => $data['title'],
                 /*
                 'cal2' => $mydata3,
                 'cal3' => $mydata4,
                 */
             )
         );

         $new_exam_id = $wpdb->insert_id;

         if(count($data['type'])>0){      /* Insert  Type  */
            $custom_db_type = $wpdb->prefix.'exam_type_relative';

            foreach($data['type'] as $value){
              $wpdb->insert(
                  $custom_db_type,
                  array(
                      'exam_id' =>  $new_exam_id,
                      'type_id' => $value,
                      'date' => Date($data['date'])
                  )
              );
            }
         }

         /*  Type */
         if(count($data['group'])>0){     /* Insert  Group  */
           $custom_db_group = $wpdb->prefix.'exam_group_relative';

           foreach($data['group'] as $value){
             $wpdb->insert(
                 $custom_db_group,
                 array(
                     'exam_id' =>  $new_exam_id,
                     'group_id' => $value,
                     'date' => Date($data['date'])
                 )
             );
           }
         }  /* Group*/

   }else{  /*  update */

       $result = $wpdb->update(
           $custom_db_name,
           array(
              'post' => $data['pid'],
              'date' => Date($data['date']),
              'url' => $data['exurl'],
              'title' => $data['title'],
               /*
               'cal2' => $mydata3,
               'cal3' => $mydata4,
               */
           ),
           array( 'id' =>$data['prid'] )
       );

       /*  先清除  Type  and  Group  再更新 */

                  /*  Clear  Type / Group  Relative  Table */
                  $custom_db_type = $wpdb->prefix.'exam_type_relative';
                  $result = $wpdb->delete( $custom_db_type, array( 'exam_id' => $data['prid'] ) );


                  $custom_db_group = $wpdb->prefix.'exam_group_relative';
                  $result = $wpdb->delete( $custom_db_group, array( 'exam_id' => $data['prid'] ) );




                  if(count($data['type'])>0){      /* Insert  Type  */
                     $custom_db_type = $wpdb->prefix.'exam_type_relative';

                     foreach($data['type'] as $value){
                       $wpdb->insert(
                           $custom_db_type,
                           array(
                               'exam_id' =>  $data['prid'],
                               'type_id' => $value,
                               'date' => Date($data['date'])
                           )
                       );
                     }
                  } /*  Type */

                  if(count($data['group'])>0){     /* Insert  Group  */
                    $custom_db_group = $wpdb->prefix.'exam_group_relative';

                    foreach($data['group'] as $value){
                      $wpdb->insert(
                          $custom_db_group,
                          array(
                              'exam_id' =>  $data['prid'],
                              'group_id' => $value,
                              'date' => Date($data['date'])
                          )
                      );
                    }
                  }  /* Group*/

   } /* End Update */


   $sql = "SELECT * FROM ".$custom_db_name." WHERE post=".$data['pid']." order by date DESC";
   $mylink = $wpdb->get_results($sql);


   $custom_db_type = $wpdb->prefix.'exam_type';
   $sql_type = "SELECT * FROM ".$custom_db_type;
   $myallType = $wpdb->get_results($sql_type);
   foreach( $myallType as $vt){
       $alltype[$vt->id] = $vt->type_name;
   }

   $custom_db_group = $wpdb->prefix.'exam_group';
   $sql_group = "SELECT * FROM ".$custom_db_group;
   $myallgroup = $wpdb->get_results($sql_group);
   foreach( $myallgroup as $vg){
       $allgroup[$vg->id] = $vg->group_name;
   }


   foreach( $mylink as $value){

       $custom_db_type = $wpdb->prefix.'exam_type_relative';
       $sql_type = "SELECT * FROM ".$custom_db_type." WHERE exam_id=".$value->id;
       $myType = $wpdb->get_results($sql_type);
       //$value->type = $myType;
       $myType = $wpdb->get_results($sql_type);
       foreach($myType  as $vx){
             $vx->name = $alltype[$vx->type_id];
             $value->type[] = $vx;
       }

       $custom_db_group = $wpdb->prefix.'exam_group_relative';
       $sql_group = "SELECT * FROM ".$custom_db_group." WHERE exam_id=".$value->id;
       $myGroup = $wpdb->get_results($sql_group);
       //$value->group = $myGroup;
       foreach($myGroup  as $vg){
             $vg->name = $allgroup[$vg->group_id];
             $value->group[] = $vg;
       }
   }







   //print_r($_POST["data"]);

    $out = array(
      'data' => $mylink,
      'status'=>$result
    );
    echo json_encode($out);
   die();
 }
 add_action('wp_ajax_nopriv_cal_insert', 'cal_insert_fun');
 add_action('wp_ajax_cal_insert', 'cal_insert_fun');








 /*
 *   @Title: ajax   cal  CRUD - Update
 *
 */
 function cal_update_fun(){
    $data = $_POST["data"];

    global $wpdb;




    $custom_db_name = $wpdb->prefix . 'calendar_date';
    $sql = "SELECT * FROM ".$custom_db_name." where id=".$data["prid"].' order by date DESC';
    $mylink = $wpdb->get_results($sql);


    foreach( $mylink as $value){

        $custom_db_type = $wpdb->prefix.'exam_type_relative';
        $sql_type = "SELECT * FROM ".$custom_db_type." WHERE exam_id=".$value->id;
        $myType = $wpdb->get_results($sql_type);
        $value->type = $myType;

        $custom_db_group = $wpdb->prefix.'exam_group_relative';
        $sql_group = "SELECT * FROM ".$custom_db_group." WHERE exam_id=".$value->id;
        $myGroup = $wpdb->get_results($sql_group);
        $value->group = $myGroup;
    }



    //print_r($_POST["data"]);

     $out = array(
       'data' => array(
                    'id'=>$mylink[0]->id,
                    //'date'=> strtotime($mylink[0]->date),
                    'title'=>$mylink[0]->title,
                    'url'=>$mylink[0]->url,
                    'post'=>$mylink[0]->post,
                    'date'=>$mylink[0]->date,
                    'type'=>$mylink[0]->type,
                    'group'=>$mylink[0]->group,
                ),
       'status'=>$sql
     );
     echo json_encode($out);
    die();
  }
  add_action('wp_ajax_nopriv_cal_update', 'cal_update_fun');
  add_action('wp_ajax_cal_update', 'cal_update_fun');











 /*
 *   @Title: ajax   cal  CRUD - Del
 *
 */
 function cal_del_fun(){
    $data = $_POST["data"];

    global $wpdb;
    $custom_db_name = $wpdb->prefix . 'calendar_date';
    $result = $wpdb->delete( $custom_db_name, array( 'id' => $data['prid'] ) );


    /*  Clear  Type / Group  Relative  Table */
    $custom_db_type = $wpdb->prefix.'exam_type_relative';
    $result = $wpdb->delete( $custom_db_type, array( 'exam_id' => $data['prid'] ) );


    $custom_db_group = $wpdb->prefix.'exam_group_relative';
    $result = $wpdb->delete( $custom_db_group, array( 'exam_id' => $data['prid'] ) );



    $sql = "SELECT * FROM ".$custom_db_name." where post=".$data['pid'].' order by date DESC';;
    $mylink = $wpdb->get_results($sql);

        $custom_db_type = $wpdb->prefix.'exam_type';
        $sql_type = "SELECT * FROM ".$custom_db_type;
        $myallType = $wpdb->get_results($sql_type);
        foreach( $myallType as $vt){
            $alltype[$vt->id] = $vt->type_name;
        }

        $custom_db_group = $wpdb->prefix.'exam_group';
        $sql_group = "SELECT * FROM ".$custom_db_group;
        $myallgroup = $wpdb->get_results($sql_group);
        foreach( $myallgroup as $vg){
            $allgroup[$vg->id] = $vg->group_name;
        }


      foreach( $mylink as $value){

          $custom_db_type = $wpdb->prefix.'exam_type_relative';
          $sql_type = "SELECT * FROM ".$custom_db_type." WHERE exam_id=".$value->id;
          $myType = $wpdb->get_results($sql_type);
          foreach($myType  as $vx){
                $vx->name = $alltype[$vx->type_id];
                $value->type[] = $vx;
          }


          $custom_db_group = $wpdb->prefix.'exam_group_relative';
          $sql_group = "SELECT * FROM ".$custom_db_group." WHERE exam_id=".$value->id;
          $myGroup = $wpdb->get_results($sql_group);
          foreach($myGroup  as $vg){
                $vg->name = $allgroup[$vg->group_id];
                $value->group[] = $vg;
          }
      }





    //print_r($_POST["data"]);

     $out = array(
       'data' => $mylink,
       'status'=>$result
     );
     echo json_encode($out);
    die();
  }
  add_action('wp_ajax_nopriv_cal_del', 'cal_del_fun');
  add_action('wp_ajax_cal_del', 'cal_del_fun');
