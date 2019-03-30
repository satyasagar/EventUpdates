<div class="page-title">

	<div class="title_left">

	  <h3>New Building</h3>

	</div>

</div>



<div class="clearfix"></div>



<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="x_panel">

			<div class="x_title">

                  <h2>Building Info</h2>

                  <ul class="nav navbar-right panel_toolbox">

                    <li style="float: right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                  </ul>

                  <div class="clearfix"></div>

			</div>

            

			<div class="x_content">

				

				<form class="form-horizontal form-label-left" method="post" action="<?php echo site_url('admin/buildings/add'); ?>">



                    <div class="item form-group">

                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>

                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" type="text">

                      </div>

                    </div>

                    

                    <div class="item form-group">

                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="longitude">Longitude <span class="required">*</span>

                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <input type="text" id="longitude" name="longitude" required="required" class="form-control col-md-7 col-xs-12">

                      </div>

                    </div>

                    

                    <div class="item form-group">

                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="latitude">Latitude <span class="required">*</span>

                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <input type="text" id="latitude" name="latitude" required="required" class="form-control col-md-7 col-xs-12">

                      </div>

                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> <span class="required">*</span>

                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       <span><strong>Get Longitude  and Latitude :</strong> </span> <a href="http://www.latlong.net/" target="_blank">http://www.latlong.net</a>
                      </div>
                    </div>



                    <div class="item form-group">

                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="additional_info">Additional info <span class="required">*</span>

                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <textarea type="text" id="additional_info" name="additional_info" required="required" class="form-control col-md-7 col-xs-12"> </textarea>

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