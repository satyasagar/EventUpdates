<div class="page-title">

	<div class="title_left">

	  <h3>New Event</h3>

	</div>

</div>



<div class="clearfix"></div>



<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="x_panel">

			<div class="x_title">

                  <h2>Event Info</h2>

                  <ul class="nav navbar-right panel_toolbox">

                    <li style="float: right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                  </ul>

                  <div class="clearfix"></div>

			</div>

            

			<div class="x_content">

				

				<form class="form-horizontal form-label-left" method="post" action="<?php echo site_url('admin/events/add'); ?>">



                    <div class="item form-group">

                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>

                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <input id="title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="title" placeholder="Title.." required="required" type="text">

                      </div>

                    </div>

                    

                    <div class="item form-group">

                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>

                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <input type="text" id="description" name="description" required="required" class="form-control col-md-7 col-xs-12" placeholder="Description..">

                      </div>

                    </div>

                    

                    <div class="form-group">

                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Building</label>

                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <select class="form-control" name="building_id">

                          <option value="">Choose option</option>

                          <?php

                          	$rs = $this->mod_buildings->getall();

                          	if($rs)

                          	{

								foreach($rs->result() as $rec)

    								{

    						  ?>

    						  <option value="<?php echo $rec->id; ?>"> <?php echo $rec->name; ?> </option>

    						  <?php		

    								}

    							}

                          ?>

                        </select>

                      </div>

                    </div>
                    
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room">Room no. <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="room" name="room" required="required" class="form-control col-md-7 col-xs-12" placeholder="Room no..">
                      </div>
                    </div>
					
					<!--
                    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
                    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

                     <script type="text/javascript">

                     $(document).ready(function() {
                       $("#date").datepicker();

                        var txt='';
                        $("#hours_ev").empty();
                        for(var i=1;i<=12;i++){
                          if(i<10){
                            txt="0"+i;
                            console.log("0"+i);
                          }else{
                            txt=i;
                          }
                          $('#hours_ev').append($("<option></option>").attr("value",txt).text(txt)); 
                        }





                        var txts='';
                        $("#minutes_ev").empty();
                        for(var i=0;i<=59;i++){
                          if(i<10){
                            txts="0"+i;
                            console.log("0"+i);
                          }else{
                            txts=i;
                          }
                          $('#minutes_ev').append($("<option></option>").attr("value",txts).text(txts)); 
                        }


                     });

                     </script> -->
                    <div class="item form-group">

                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Date <span class="required">*</span>

                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <input type="text" id="date" name="date" required="required" class="form-control col-md-7 col-xs-12" placeholder="YYYY-MM-DD" />
                      </div>

                    </div>



                  <div class="item form-group">

                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time" style="padding-top:0px !important;">Time <span class="required">*</span>

                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <!--input type="text" id="time" name="time" required="required" class="form-control col-md-7 col-xs-12" placeholder="HH-MM" /-->
                         <select id="hours_ev" name="hours_ev">
                            
                         </select> 
                         <select id="minutes_ev" name="minutes_ev">
                            
                         </select> 
                         <select id="am_ev" name="am_ev">
                            <option value="am">AM</option>
                            <option value="pm">PM</option>
                         </select>
                      </div>

                    </div>

                    

                    

                    

                    <div class="ln_solid"></div>

                    

                    <div class="form-group">

                      <div class="col-md-6 col-md-offset-3">

                        <button type="submit" class="btn btn-success">Submit</button>

                      </div>

                    </div>

                  </form>

				

			</div>    

		</div>

	</div>

</div>