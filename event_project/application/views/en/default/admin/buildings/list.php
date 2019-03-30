<div class="page-title">

	<div class="title_left">

	  <h3>Buildings</h3>

	</div>



	<div class="title_right">

	  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

	    <form method="get">

	    <div class="input-group">

	      <input type="text" class="form-control" placeholder="Search for..." name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">

	      <span class="input-group-btn">

	      	<button class="btn btn-default" type="button">Go!</button>

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

                  <h2>Building List</h2>

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

                        <th>Name</th>

                        <th>Longitude</th>

                        <th>Latitude</th>
                        <th>Additional Info</th>

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

					  ?>

					  <tr>

					  	<td><?php echo $sr; ?></td>

					  	<td><?php echo $rec->name; ?></td>

					  	<td><?php echo $rec->longitude; ?></td>

					  	<td><?php echo $rec->latitude; ?></td>
					  	<td><?php echo $rec->additional_info; ?></td>

					  	<td><a href="<?php echo site_url('admin/buildings/edit/'.$rec->id); ?>" title="Edit"><i class="fa fa-pencil"></i></a> <a href="<?php echo site_url('admin/buildings/delete/'.$rec->id); ?>" title="Delete"><i class="fa fa-close"></i></a></td>

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