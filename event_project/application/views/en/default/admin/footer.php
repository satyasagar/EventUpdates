			</div>

		<!-- footer content -->

		<footer>

		  <div class="copyright-info">

		    <p class="pull-right">Manage Events -  Admin Template

		    </p>

		  </div>

		  <div class="clearfix"></div>

		</footer>

		<!-- /footer content -->



		</div>

		<!-- /page content -->

    </div>

  </div>



  <div id="custom_notifications" class="custom-notifications dsp_none">

    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">

    </ul>

    <div class="clearfix"></div>

    <div id="notif-group" class="tabbed_notifications"></div>

  </div>

  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->

  <script src="<?php echo base_url(); ?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>

  <!-- icheck -->

  <script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>



  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>



  <!-- pace -->

  <script src="<?php echo base_url(); ?>assets/js/pace/pace.min.js"></script>

  

  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

                    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>



                     <script type="text/javascript">

					

                     jQuery(document).ready(function($) {

                       jQuery("#date").datepicker();



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



                     </script>

</body>

</html>