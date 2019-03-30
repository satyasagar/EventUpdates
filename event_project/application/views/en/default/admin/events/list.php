<div class="page-title">

	<div class="title_left">

	  <h3>Events</h3>

	</div>



	<div class="title_right">

	  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

	    <form method="get">

		    <div class="input-group">

		      <input type="text" class="form-control" placeholder="Search for..." name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">

		      <span class="input-group-btn">

		      	<button class="btn btn-default" type="submit" >Go!</button>

		      </span>

		    </div>

	    </form>

	  </div>

	</div>

</div>



<div class="clearfix"></div>



<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="x_panel">

			<div class="x_title">

                  <h2>Events List</h2>

                  <ul class="nav navbar-right panel_toolbox">

                    <li style="float: right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                  </ul>

                  <div class="clearfix"></div>

			</div>

            

			<div class="x_content">

				<table class="table">

                    

                    <thead>

                      <tr>

                        <th>#</th>

                        <th>Title</th>

                        <th>Description</th>

                        <th>Building</th>
                        
                        <th>Room no.</th>

                        <th>Date</th>
                        <th>Time</th>

                        <th>Action</th>

                      </tr>

                    </thead>

                    

                    <tbody>

                       <?php

                        if($rs)

                        {

                        	$sr = 1;

							foreach($rs->result() as $rec)

							{

								$building_name = $this->mod_buildings->getSingleCol('name','id',$rec->building_id);

								if(!$building_name)

								{

									$building_name = 'Unknown';

								}

						?>

						<tr>

							<td><?php echo $sr; ?></td>

							<td><?php echo $rec->title; ?></td>

							<td><?php echo $rec->description; ?></td>

							<td><?php echo $building_name; ?></td>
							
							<td><?php echo $rec->room; ?></td>

							<td><?php echo $rec->date ?></td>
							<td><?php echo $rec->time ?></td>

							<td><a href="<?php echo site_url('admin/events/edit/'.$rec->id); ?>" title="Edit"><i class="fa fa-pencil"></i></a> <a href="<?php echo site_url('admin/events/delete/'.$rec->id); ?>" title="Delete"><i class="fa fa-close"></i></a></td>

						</tr>

						<?php		

							$sr++;

							}

						}	

                       ?>

                    </tbody>

                    

				</table>

				

			</div>    

		</div>

	</div>

</div>