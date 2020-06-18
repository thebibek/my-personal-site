<?php
include('config_session.php');

if (isset($_GET['edit_event'])) {
	$page_id = $_GET['edit_event'];
	$sql = mysql_query("SELECT * FROM blog WHERE blog_id = $blog_id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
?>
	<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
		<h2 class="panel_hwc_modal-title">Edit Blog Detail of <?php print $row->blog_name; ?></h2>
	</header>
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="panel_hwc_modal-body">
            <div class="modal-wrapper">
                <div class="ibox-content">
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-2 col-form-label pull-left">Name</label>
                        <div class="col-sm-10 pull-right">
                        	<input type="hidden" name="blog_id" value="<?php print $row->blog_id; ?>">
                            <input type="text" class="form-control" value="<?php echo $row->blog_name; ?>" name="blog_name" required="" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-2 col-form-label pull-left">Description</label>
                        <div class="col-sm-10 pull-right">
                           <textarea  id="edit_descripton" class="form-control" name="page_full"><?php echo $row->page_full; ?></textarea>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-sm-12 form-group">
                            <label class="col-sm-2 col-form-label pull-left">Event Date</label>
                            <div class="col-sm-10 pull-right">
                                <input type="date" class="form-control" name="event_date"  value="<?php echo $row->event_date; ?>" required="" />
                            </div>
                            <div class="clearfix"></div>
                        </div> 
                    <div class="col-sm-12 form-group">
                            <label class="col-sm-2 col-form-label pull-left">URL</label>
                            <div class="col-sm-10 pull-right">
                                <input type="text" class="form-control" name="url"  value="<?php echo $row->url; ?>" required="" />
                            </div>
                            <div class="clearfix"></div>
                        </div>  
                     <?php  } ?>
                </div>
            </div>
        </div>
        <footer class="panel_hwc_modal-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" name="edit_event" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Edit Event</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </footer>
        <div class="clearfix"></div>
    </form>
    <script src="assets/js/jquery/tiny/tinymce.min.js"></script>
<?php
}
if (isset($_GET['edit_event_image'])) {
	$page_id = $_GET['edit_event_image'];
	$sql = mysql_query("SELECT * FROM event WHERE page_id = $page_id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
?>
	<div id="custom-content" class="modal-block modal-block-lg modal-block modal-header-color modal-block-primary" >
		<section class="panel_hwc_modal">
			<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
				<h2 class="panel_hwc_modal-title">Edit Detail of <?php print $row->page_heading; ?></h2>
			</header>
			<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="panel_hwc_modal-body">
                    <div class="modal-wrapper">
                        <div class="ibox-content">
                        	<div class="col-md-8 pull-left">
	                            <div class="col-md-12 form-group">
	                                <label class="col-sm-2 pull-left control-label">Upload Image</label>
	                                <div class="col-sm-10 pull-left">
	                                    <div class="fileupload fileupload-new" data-provides="fileupload">
	                                        <div class="input-append">
	                                            <div class="uneditable-input">
	                                                <i class="fa fa-file fileupload-exists"></i>
	                                                <span class="fileupload-preview"></span>
	                                            </div>
	                                            <span class="btn btn-hwc btn-primary btn-file">
	                                                <span class="fileupload-exists">Change</span>
	                                                <span class="fileupload-new">Select Image</span>
	                                                <input type="file" name="image" required />
	                                            </span>
	                                            <input type="hidden" name="page_id" value="<?php print $row->page_id; ?>">
	                                            <a href="#" class="btn btn-hwc btn-warning fileupload-exists" data-dismiss="fileupload">Remove</a>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
                            </div>
                            <div class="col-md-4 pull-left">

                            	<img style="width: 100%; object-fit: cover;" src="../images/news&events/<?php echo $row->image ?>" alt="<?php echo $row->image ?>" />
                            </div>
                            <div class="clearfix"></div>	
                        </div>
                    </div>
                </div>
                <footer class="panel_hwc_modal-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" name="edit_event_image" class="btn btn-primary "><i class="fa fa-image text-white"></i> Edit Image</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </footer>
                <div class="clearfix"></div>
            </form>
		</section>
	</div>

<?php
	} }

//news
if (isset($_GET['edit_news'])) {
	$page_id = $_GET['edit_news'];
	$sql = mysql_query("SELECT * FROM page WHERE page_id = $page_id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<!-- <div id="custom-content" class="modal-block modal-block-md modal-block modal-header-color modal-block-primary" >
			<section class="panel_hwc_modal"> -->
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">Edit Detail of <?php print $row->page_heading; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                            <div class="col-sm-12 form-group">
	                                <label class="col-sm-2 col-form-label pull-left">Name</label>
	                                <div class="col-sm-10 pull-right">
	                                	<input type="hidden" name="page_id" value="<?php print $row->page_id; ?>">
	                                    <input type="text" class="form-control" value="<?php echo $row->page_heading; ?>" name="page_heading" required="" />
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
	                            <div class="col-sm-12 form-group">
	                                <label class="col-sm-2 col-form-label pull-left">Description</label>
	                                <div class="col-sm-10 pull-right">
	                                   <textarea  id="edit_descripton" class="form-control" name="page_full"><?php echo $row->page_full; ?></textarea>
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
	                            <div class="col-sm-12 form-group">
	                                    <label class="col-sm-2 col-form-label pull-left">URL</label>
	                                    <div class="col-sm-10 pull-right">
	                                        <input type="text" class="form-control" name="url"  value="<?php echo $row->url; ?>" required="" />
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div> 
	                             <?php  } ?>
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button type="submit" name="edit_news" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Edit News</button>
	                            <button class="btn btn-default modal-dismiss">Cancel</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
	            <script src="assets/js/jquery/tiny/tinymce.min.js"></script>
	            <script>
		      </script>
		<?php
}
if (isset($_GET['edit_news_image'])) {
	$page_id = $_GET['edit_news_image'];
	$sql = mysql_query("SELECT * FROM page WHERE page_id = $page_id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<div id="custom-content" class="modal-block modal-block-lg modal-block modal-header-color modal-block-primary" >
			<section class="panel_hwc_modal">
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">Edit Detail of <?php print $row->page_heading; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                        	<div class="col-md-8 pull-left">
		                            <div class="col-md-12 form-group">
		                                <label class="col-sm-2 pull-left control-label">Upload Image</label>
		                                <div class="col-sm-10 pull-left">
		                                    <div class="fileupload fileupload-new" data-provides="fileupload">
		                                        <div class="input-append">
		                                            <div class="uneditable-input">
		                                                <i class="fa fa-file fileupload-exists"></i>
		                                                <span class="fileupload-preview"></span>
		                                            </div>
		                                            <span class="btn btn-hwc btn-primary btn-file">
		                                                <span class="fileupload-exists">Change</span>
		                                                <span class="fileupload-new">Select Image</span>
		                                                <input type="file" name="image" required />
		                                            </span>
		                                            <input type="hidden" name="page_id" value="<?php print $row->page_id; ?>">
		                                            <a href="#" class="btn btn-hwc btn-warning fileupload-exists" data-dismiss="fileupload">Remove</a>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
	                            </div>
	                            <div class="col-md-4 pull-left">

	                            	<img style="width: 100%; object-fit: cover;" src="../images/news&events/<?php echo $row->image ?>" alt="<?php echo $row->image ?>" />
	                            </div>
	                            <div class="clearfix"></div>	
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button type="submit" name="edit_news_image" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Edit News</button>
	                            <button class="btn btn-default modal-dismiss">Cancel</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
			</section>
		</div>

		<?php
	}
}	
//news
//category start
if (isset($_GET['edit_category'])) {
		$gallery_category_id = $_GET['edit_category'];
		$sql = mysql_query("SELECT * FROM gallery_category WHERE gallery_category_id = $gallery_category_id") or die(mysql_error());
		while ($row = mysql_fetch_object($sql)) {
		?>
		<!-- <div id="custom-content" class="modal-block modal-block-md modal-block modal-header-color modal-block-primary" >
			<section class="panel_hwc_modal"> -->
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">Edit Detail of <?php print $row->gallery_name; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                            <div class="col-sm-12 form-group">
	                                <label class="col-sm-2 col-form-label pull-left">Name</label>
	                                <div class="col-sm-10 pull-right">
	                                	<input type="hidden" name="gallery_category_id" value="<?php print $row->gallery_category_id; ?>">
	                                    <input type="text" class="form-control" value="<?php echo $row->gallery_name; ?>" name="gallery_name" required="" />
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
	                             <?php  } ?>
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button type="submit" name="edit_category" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Edit Category</button>
	                            <button class="btn btn-default modal-dismiss">Cancel</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
	            <script src="assets/js/jquery/tiny/tinymce.min.js"></script>
	            <script>
            	$(function(){
            		tinymce.remove();
                    tinymce.init({
                        selector: '#edit_descripton',
                        width: '100%',
                        height:  270
                    });
            	});
		      </script>
		<?php
}
//category ends
//faq starts
if (isset($_GET['edit_faq'])) {
		$page_id = $_GET['edit_faq'];
		$sql = mysql_query("SELECT * FROM page WHERE page_id = $page_id") or die(mysql_error());
		while ($row = mysql_fetch_object($sql)) {
		?>
		<!-- <div id="custom-content" class="modal-block modal-block-md modal-block modal-header-color modal-block-primary" >
			<section class="panel_hwc_modal"> -->
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">Edit Detail of <?php print $row->page_heading; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                            <div class="col-sm-12 form-group">
	                                <label class="col-sm-2 col-form-label pull-left">Query</label>
	                                <div class="col-sm-10 pull-right">
	                                	<input type="hidden" name="page_id" value="<?php print $row->page_id; ?>">
	                                    <input type="text" class="form-control" value="<?php echo $row->page_heading; ?>" name="page_heading" required="" />
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
	                             <div class="col-sm-12 form-group">
	                                <label class="col-sm-2 col-form-label pull-left">Answer</label>
	                                <div class="col-sm-10 pull-right">
	                                    <textarea class="form-control" value="<?php echo $row->page_full; ?>" name="page_full" type="text" placeholder="Answer" required=""><?php echo $row->page_full; ?></textarea>
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>

	                             <?php  } ?>
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button type="submit" name="edit_faq" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Edit Page</button>
	                            <button class="btn btn-default modal-dismiss">Cancel</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
	            <script src="assets/js/jquery/tiny/tinymce.min.js"></script>
	            <script>
            	$(function(){
            		tinymce.remove();
                    tinymce.init({
                        selector: '#edit_descripton',
                        width: '100%',
                        height:  270
                    });
            	});
		      </script>
		<?php
}
//faq ends
//service start
if (isset($_GET['view_service'])) {
	$page_id = $_GET['view_service'];
	$sql = mysql_query("SELECT * FROM page WHERE page_id = $page_id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<div id="custom-content" class="modal-block modal-block-lg modal-block modal-header-color modal-block-primary" >
			<link rel="stylesheet" type="text/css" href="css/widgEditor.css"  />
			<section class="panel_hwc_modal">
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">View Detail of <?php print $row->page_heading; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                        	<div class="col-sm-8 pull-left">
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Name</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->page_heading; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Description</label>
		                                <div class="col-sm-10 pull-right">
		                                  <div class="text-dark view_p" style="color: #343a40 !important;"><?php echo $row->page_full ?></div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">URL</label>
		                                <div class="col-sm-9 pull-right">
		                                	 <div class="text-dark view_p" style="color: #343a40 !important;"><?php echo $row->url; ?></div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Duration 1</label>
		                                <div class="col-sm-9 pull-right">
		                                	 <div class="text-dark view_p" style="color: #343a40 !important;"><?php echo $row->duration1; ?></div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Duration 2</label>
		                                <div class="col-sm-9 pull-right">
		                                	 <div class="text-dark view_p" style="color: #343a40 !important;"><?php echo $row->duration2; ?></div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Duration 3</label>
		                                <div class="col-sm-9 pull-right">
		                                	 <div class="text-dark view_p" style="color: #343a40 !important;"><?php echo $row->duration3; ?></div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Price for Duration 1</label>
		                                <div class="col-sm-9 pull-right">
		                                	 <div class="text-dark view_p" style="color: #343a40 !important;"><?php echo $row->price1; ?></div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Price for Duration 2</label>
		                                <div class="col-sm-9 pull-right">
		                                	 <div class="text-dark view_p" style="color: #343a40 !important;"><?php echo $row->price2; ?></div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Price for Duration 3</label>
		                                <div class="col-sm-9 pull-right">
		                                	 <div class="text-dark view_p" style="color: #343a40 !important;"><?php echo $row->price3; ?></div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Meta Title</label>
		                                <div class="col-sm-9 pull-right">
		                                	 <div class="text-dark view_p" style="color: #343a40 !important;"><?php echo $row->page_title; ?></div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Meta Keyword</label>
		                                <div class="col-sm-9 pull-right">
		                                	 <div class="text-dark view_p" style="color: #343a40 !important;"><?php echo $row->page_keyword; ?></div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Meta Description</label>
		                                <div class="col-sm-9 pull-right">
		                                	 <div class="text-dark view_p" style="color: #343a40 !important;"><?php echo $row->page_keyword; ?></div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="pull-right" style="margin-top: 10px;">
                            			<a class="popup_edit btn btn-primary" style="color: #fff;"  id="<?php print $row->page_id; ?>">Edit Service</a>
                            		</div>
                            		<div class="clearfix"></div>	

	                            </div>
	                            <div class="col-sm-4 pull-left">
	                            	<label class="col-sm-12 col-form-label">Current Image</label>
	                            	<?php 
		                            	if ($row->image == '') {
		                            		  echo 'No image Uploaded Yet!!';
		                            	}
		                            	else
		                            	{
		                            ?>
		                            		<p class="text-dark view_p"><?php echo $row->page_heading; ?></p>
		                            		<img style="width: 100%; object-fit: cover;" src="../images/service/<?php echo $row->image; ?>" alt="<?php echo $row->page_heading; ?>" />
		                            		<br>
		                            		<div class="pull-right" style="margin-top: 10px;">
		                            			<a class="simple-ajax-popup btn btn-primary" href="ajax.php?edit_service_image=<?php print $row->page_id; ?>">Change Image</a>
		                            		</div>
		                            		<div class="clearfix"></div>	
		                            <?php
		                            	} 
	                            	?>
	                            </div>
	                            <div class="clearfix"></div>
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button class="btn btn-default modal-dismiss">Okay</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
			</section>
			<script src="assets/js/jquery/tiny/tinymce.min.js"></script>
			<script>
				 $('.simple-ajax-popup').magnificPopup({
		            type: 'ajax',
		            overflowY: 'scroll'
		        });
				$('.popup_edit').click(function(){
		            var id =  this.id;
		            $.ajax({
		                    url: 'ajax.php',
		                    type: 'GET',
		                    data: 'edit_page='+id,
		                    success:function(data){
		                        console.log(data);
		                        $('.simple-ajax-popup').magnificPopup('close');
		                        $('#page_modal .panel_hwc_modal').html(data);
		                        $.magnificPopup.open({
		                            items: {
		                                src: '#page_modal'
		                            },
		                              type: 'inline',
		                                preloader: false,
		                                modal: true
		                        });
		                        tinymce.remove();
		                        tinymce.init({
				                    selector: '#edit_descripton',
				                    width: '100%',
				                    height:  270,
		                            setup: function (editor) {
		                                editor.on('change', function () {
		                                   	// This will print out all your content in the tinyMce box
						                    console.log('the content '+editor.getContent());
						                     // Your text from the tinyMce box will now be passed to your  text area ... 
						                    $("#edit_descripton").text(editor.getContent()); 
		                                });
		                            }
				                });

		                    }
		                });
		        });
			</script>
		</div>
		<?php
	}
}
if (isset($_GET['edit_page'])) {
	$page_id = $_GET['edit_page'];
	$sql = mysql_query("SELECT * FROM page WHERE page_id = $page_id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<!-- <div id="custom-content" class="modal-block modal-block-md modal-block modal-header-color modal-block-primary" >
			<section class="panel_hwc_modal"> -->
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">Edit Detail of <?php print $row->page_heading; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                            <div class="col-sm-12 form-group">
	                                <label class="col-sm-2 col-form-label pull-left">Name</label>
	                                <div class="col-sm-10 pull-right">
	                                	<input type="hidden" name="page_id" value="<?php print $row->page_id; ?>">
	                                    <input type="text" class="form-control" value="<?php echo $row->page_heading; ?>" name="page_heading" required="" />
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
	                            <div class="col-sm-12 form-group">
	                                <label class="col-sm-2 col-form-label pull-left">Description</label>
	                                <div class="col-sm-10 pull-right">
	                                   <textarea  id="edit_descripton" class="form-control" name="page_full"><?php echo $row->page_full; ?></textarea>
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
	                                <div class="col-sm-12 form-group">
	                                    <label class="col-sm-2 col-form-label pull-left">URL</label>
	                                    <div class="col-sm-10 pull-right">
	                                        <input type="text" class="form-control" name="url" value="<?php echo $row->url; ?>" required="" />
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div>
	                                <div class="col-sm-12 form-group">
	                                    <label class="col-sm-2 col-form-label pull-left">Duration 1</label>
	                                    <div class="col-sm-10 pull-right">
	                                        <input type="text" class="form-control" name="duration1" value="<?php echo $row->duration1; ?>" required="" />
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div>
	                                <div class="col-sm-12 form-group">
	                                    <label class="col-sm-2 col-form-label pull-left">Duration 2</label>
	                                    <div class="col-sm-10 pull-right">
	                                        <input type="text" class="form-control" name="duration2" value="<?php echo $row->duration2; ?>"/>
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div> 
	                                <div class="col-sm-12 form-group">
	                                    <label class="col-sm-2 col-form-label pull-left">Duration 3</label>
	                                    <div class="col-sm-10 pull-right">
	                                        <input type="text" class="form-control" name="duration3" value="<?php echo $row->duration3; ?>" />
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div>
	                                <div class="col-sm-12 form-group">
	                                    <label class="col-sm-2 col-form-label pull-left">Price for Duration 1</label>
	                                    <div class="col-sm-10 pull-right">
	                                        <input type="text" class="form-control" name="price1"  value="<?php echo $row->price1; ?>" required="" />
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div> 
	                                <div class="col-sm-12 form-group">
	                                    <label class="col-sm-2 col-form-label pull-left">Price for Duration 2</label>
	                                    <div class="col-sm-10 pull-right">
	                                        <input type="text" class="form-control" name="price2"  value="<?php echo $row->price2; ?>" />
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div> 
	                                <div class="col-sm-12 form-group">
	                                    <label class="col-sm-2 col-form-label pull-left">Price for Duration 3</label>
	                                    <div class="col-sm-10 pull-right">
	                                        <input type="text" class="form-control" name="price3"  value="<?php echo $row->price3; ?>" />
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div>
	                                 <div class="col-sm-12 form-group">
	                                    <label class="col-sm-2 col-form-label pull-left">Meta Title</label>
	                                    <div class="col-sm-10 pull-right">
	                                        <input type="text" class="form-control" name="title"  value="<?php echo $row->page_title; ?>" required="" />
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div> 
	                                 <div class="col-sm-12 form-group">
	                                    <label class="col-sm-2 col-form-label pull-left">Meta Keyword</label>
	                                    <div class="col-sm-10 pull-right">
	                                        <input type="text" class="form-control" name="keyword"  value="<?php echo $row->page_keyword; ?>" required="" />
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div> 
	                                 <div class="col-sm-12 form-group">
	                                    <label class="col-sm-2 col-form-label pull-left">Meta Description</label>
	                                    <div class="col-sm-10 pull-right">
	                                        <input type="text" class="form-control" name="description"  value="<?php echo $row->page_description; ?>" required="" />
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div>  
	                             <?php  } ?>
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button type="submit" name="edit_page" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Edit Service</button>
	                            <button class="btn btn-default modal-dismiss">Cancel</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
	            <script src="assets/js/jquery/tiny/tinymce.min.js"></script>
	            <script>
		      </script>
		<?php
	}

if (isset($_GET['edit_service_image'])) {
	$page_id = $_GET['edit_service_image'];
	$sql = mysql_query("SELECT * FROM page WHERE page_id = $page_id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<div id="custom-content" class="modal-block modal-block-lg modal-block modal-header-color modal-block-primary" >
			<section class="panel_hwc_modal">
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">Edit Detail of <?php print $row->page_heading; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                        	<div class="col-md-8 pull-left">
		                            <div class="col-md-12 form-group">
		                                <label class="col-sm-2 pull-left control-label">Upload Image</label>
		                                <div class="col-sm-10 pull-left">
		                                    <div class="fileupload fileupload-new" data-provides="fileupload">
		                                        <div class="input-append">
		                                            <div class="uneditable-input">
		                                                <i class="fa fa-file fileupload-exists"></i>
		                                                <span class="fileupload-preview"></span>
		                                            </div>
		                                            <span class="btn btn-hwc btn-primary btn-file">
		                                                <span class="fileupload-exists">Change</span>
		                                                <span class="fileupload-new">Select Image</span>
		                                                <input type="file" name="image" required />
		                                            </span>
		                                            <input type="hidden" name="page_id" value="<?php print $row->page_id; ?>">
		                                            <a href="#" class="btn btn-hwc btn-warning fileupload-exists" data-dismiss="fileupload">Remove</a>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
	                            </div>
	                            <div class="col-md-4 pull-left">
	                            	<?php if ($row->image != ''){ ?>
	                            		<img style="width: 100%; object-fit: cover;" src="../images/service/<?php echo $row->image ?>" alt="<?php echo $row->image ?>" />
	                            	<?php }else
	                            	{
	                            		echo "Image Not Uploaded Yet!!";
	                            	} 
	                            	?>

	                            	
	                            </div>
	                            <div class="clearfix"></div>	
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button type="submit" name="edit_service_image" class="btn btn-primary "><i class="fa fa-image text-white"></i> Edit Image</button>
	                            <button class="btn btn-default modal-dismiss">Cancel</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
			</section>
		</div>

		<?php
	}
}	
//service end
//messages start
if (isset($_GET['view_subscriber'])) {
	$id = $_GET['view_subscriber'];
	$sql = mysql_query("SELECT * FROM message WHERE id = $id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<div id="custom-content" class="modal-block modal-block-lg modal-block modal-header-color modal-block-primary" >
			<link rel="stylesheet" type="text/css" href="css/widgEditor.css"  />
			<section class="panel_hwc_modal">
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">View Detail of <?php print $row->name; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                        	<div class="col-sm-8 pull-left">
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Name</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->name; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Email</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->email; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Message</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->message; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Date</label>
		                                <div class="col-sm-10 pull-right">
		                                  <p class="text-dark view_p"><?php echo $row->message_date; ?></p>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Time</label>
		                                <div class="col-sm-10 pull-right">
		                                  <p class="text-dark view_p"><?php echo $row->message_time; ?></p>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
                            		<div class="clearfix"></div>	

	                            </div>
	                            <div class="clearfix"></div>
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button class="btn btn-default modal-dismiss">Okay</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
			</section>
			<script src="assets/js/jquery/tiny/tinymce.min.js"></script>
			<script>
				 $('.simple-ajax-popup').magnificPopup({
		            type: 'ajax',
		            overflowY: 'scroll'
		        });
				$('.popup_edit').click(function(){
		            var id =  this.id;
		            $.ajax({
		                    url: 'ajax.php',
		                    type: 'GET',
		                    data: 'edit_page='+id,
		                    success:function(data){
		                        console.log(data);
		                        $('.simple-ajax-popup').magnificPopup('close');
		                        $('#page_modal .panel_hwc_modal').html(data);
		                        $.magnificPopup.open({
		                            items: {
		                                src: '#page_modal'
		                            },
		                              type: 'inline',
		                                preloader: false,
		                                modal: true
		                        });
		                        tinymce.remove();
		                        tinymce.init({
				                    selector: '#edit_descripton',
				                    width: '100%',
				                    height:  270,
		                            setup: function (editor) {
		                                editor.on('change', function () {
		                                   	// This will print out all your content in the tinyMce box
						                    console.log('the content '+editor.getContent());
						                     // Your text from the tinyMce box will now be passed to your  text area ... 
						                    $("#edit_descripton").text(editor.getContent()); 
		                                });
		                            }
				                });

		                    }
		                });
		        });
			</script>
		</div>
		<?php
	}
}
if (isset($_GET['view_booking'])) {
	$id = $_GET['view_booking'];
	$sql = mysql_query("SELECT * FROM message WHERE id = $id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<div id="custom-content" class="modal-block modal-block-lg modal-block modal-header-color modal-block-primary" >
			<link rel="stylesheet" type="text/css" href="css/widgEditor.css"  />
			<section class="panel_hwc_modal">
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">View Detail of <?php print $row->name; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                        	<div class="col-sm-12 pull-left">
		                            <div class="col-sm-6 form-group float-left">
		                                <label class="col-sm-2 col-form-label pull-left">Name</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->name; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-6 form-group float-left">
		                                <label class="col-sm-2 col-form-label pull-left">Email</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->email; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-6 form-group float-left">
		                                <label class="col-sm-2 col-form-label pull-left">Phone</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->phone; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-6 form-group float-left">
		                                <label class="col-sm-2 col-form-label pull-left">Address</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->address; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-6 form-group float-left">
		                                <label class="col-sm-2 col-form-label pull-left">Duration</label>
		                                <div class="col-sm-10 pull-right">
		                                  <p class="text-dark view_p"><?php echo $row->duration; ?></p>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-6 form-group float-left">
		                                <label class="col-sm-2 col-form-label pull-left">Total</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p">Rs.<?php echo $row->total; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-6 form-group float-left">
		                                <label class="col-sm-3 col-form-label pull-left">Booked For</label>
		                                <div class="col-sm-9 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->message_date; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-6 form-group float-left">
		                                <label class="col-sm-3 col-form-label pull-left">Booked On</label>
		                                <div class="col-sm-9 pull-right">
		                                  <p class="text-dark view_p"><?php echo $row->curdate; ?></p>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
                            		<div class="clearfix"></div>	

	                            </div>
	                            <div class="clearfix"></div>
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button class="btn btn-default modal-dismiss">Okay</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
			</section>
			<script src="assets/js/jquery/tiny/tinymce.min.js"></script>
			<script>
				 $('.simple-ajax-popup').magnificPopup({
		            type: 'ajax',
		            overflowY: 'scroll'
		        });
				$('.popup_edit').click(function(){
		            var id =  this.id;
		            $.ajax({
		                    url: 'ajax.php',
		                    type: 'GET',
		                    data: 'edit_page='+id,
		                    success:function(data){
		                        console.log(data);
		                        $('.simple-ajax-popup').magnificPopup('close');
		                        $('#page_modal .panel_hwc_modal').html(data);
		                        $.magnificPopup.open({
		                            items: {
		                                src: '#page_modal'
		                            },
		                              type: 'inline',
		                                preloader: false,
		                                modal: true
		                        });
		                        tinymce.remove();
		                        tinymce.init({
				                    selector: '#edit_descripton',
				                    width: '100%',
				                    height:  270,
		                            setup: function (editor) {
		                                editor.on('change', function () {
		                                   	// This will print out all your content in the tinyMce box
						                    console.log('the content '+editor.getContent());
						                     // Your text from the tinyMce box will now be passed to your  text area ... 
						                    $("#edit_descripton").text(editor.getContent()); 
		                                });
		                            }
				                });

		                    }
		                });
		        });
			</script>
		</div>
		<?php
	}
}
if (isset($_GET['view_member'])) {
	$id = $_GET['view_member'];
	$sql = mysql_query("SELECT * FROM message WHERE id = $id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<div id="custom-content" class="modal-block modal-block-lg modal-block modal-header-color modal-block-primary" >
			<link rel="stylesheet" type="text/css" href="css/widgEditor.css"  />
			<section class="panel_hwc_modal">
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">View Detail of <?php print $row->name; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                        	<div class="col-sm-8 pull-left">
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Name</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->name; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Email</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->email; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Phone</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->phone; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Address</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->address; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Type</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->membership; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Booking Date</label>
		                                <div class="col-sm-9 pull-right">
		                                  <p class="text-dark view_p"><?php echo $row->message_date; ?></p>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Booking Time</label>
		                                <div class="col-sm-9 pull-right">
		                                  <p class="text-dark view_p"><?php echo $row->message_time; ?></p>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Requirements</label>
		                                <div class="col-sm-9 pull-right">
		                                    	
		                                    <?php if ($row->message=='') {?>
		                                    	<p class="text-dark view_p">Not Specified</p>
											<?php }else{?>
												<p class="text-dark view_p"><?php echo $row->message; ?></p>
											<?php }?>                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
                            		<div class="clearfix"></div>	

	                            </div>
	                            <div class="clearfix"></div>
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button class="btn btn-default modal-dismiss">Okay</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
			</section>
			<script src="assets/js/jquery/tiny/tinymce.min.js"></script>
			<script>
				 $('.simple-ajax-popup').magnificPopup({
		            type: 'ajax',
		            overflowY: 'scroll'
		        });
				$('.popup_edit').click(function(){
		            var id =  this.id;
		            $.ajax({
		                    url: 'ajax.php',
		                    type: 'GET',
		                    data: 'edit_page='+id,
		                    success:function(data){
		                        console.log(data);
		                        $('.simple-ajax-popup').magnificPopup('close');
		                        $('#page_modal .panel_hwc_modal').html(data);
		                        $.magnificPopup.open({
		                            items: {
		                                src: '#page_modal'
		                            },
		                              type: 'inline',
		                                preloader: false,
		                                modal: true
		                        });
		                        tinymce.remove();
		                        tinymce.init({
				                    selector: '#edit_descripton',
				                    width: '100%',
				                    height:  270,
		                            setup: function (editor) {
		                                editor.on('change', function () {
		                                   	// This will print out all your content in the tinyMce box
						                    console.log('the content '+editor.getContent());
						                     // Your text from the tinyMce box will now be passed to your  text area ... 
						                    $("#edit_descripton").text(editor.getContent()); 
		                                });
		                            }
				                });

		                    }
		                });
		        });
			</script>
		</div>
		<?php
	}
}
if (isset($_GET['view_message'])) {
	$id = $_GET['view_message'];
	$sql = mysql_query("SELECT * FROM message WHERE id = $id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<div id="custom-content" class="modal-block modal-block-lg modal-block modal-header-color modal-block-primary" >
			<link rel="stylesheet" type="text/css" href="css/widgEditor.css"  />
			<section class="panel_hwc_modal">
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">View Detail of <?php print $row->name; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                        	<div class="col-sm-8 pull-left">
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Name</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->name; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Email</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->email; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Date</label>
		                                <div class="col-sm-9 pull-right">
		                                  <p class="text-dark view_p"><?php echo $row->message_date; ?></p>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Time</label>
		                                <div class="col-sm-9 pull-right">
		                                  <p class="text-dark view_p"><?php echo $row->message_time; ?></p>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-3 col-form-label pull-left">Message</label>
		                                <div class="col-sm-9 pull-right">
		                                  <p class="text-dark view_p"><?php echo $row->message; ?></p>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
                            		<div class="clearfix"></div>	

	                            </div>
	                            <div class="clearfix"></div>
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button class="btn btn-default modal-dismiss">Okay</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
			</section>
			<script src="assets/js/jquery/tiny/tinymce.min.js"></script>
			<script>
				 $('.simple-ajax-popup').magnificPopup({
		            type: 'ajax',
		            overflowY: 'scroll'
		        });
				$('.popup_edit').click(function(){
		            var id =  this.id;
		            $.ajax({
		                    url: 'ajax.php',
		                    type: 'GET',
		                    data: 'edit_page='+id,
		                    success:function(data){
		                        console.log(data);
		                        $('.simple-ajax-popup').magnificPopup('close');
		                        $('#page_modal .panel_hwc_modal').html(data);
		                        $.magnificPopup.open({
		                            items: {
		                                src: '#page_modal'
		                            },
		                              type: 'inline',
		                                preloader: false,
		                                modal: true
		                        });
		                        tinymce.remove();
		                        tinymce.init({
				                    selector: '#edit_descripton',
				                    width: '100%',
				                    height:  270,
		                            setup: function (editor) {
		                                editor.on('change', function () {
		                                   	// This will print out all your content in the tinyMce box
						                    console.log('the content '+editor.getContent());
						                     // Your text from the tinyMce box will now be passed to your  text area ... 
						                    $("#edit_descripton").text(editor.getContent()); 
		                                });
		                            }
				                });

		                    }
		                });
		        });
			</script>
		</div>
		<?php
	}
}
//messages end
//testimonial start
if (isset($_GET['view_test'])) {
	$testimonials_id = $_GET['view_test'];
	$sql = mysql_query("SELECT * FROM testimonials WHERE testimonials_id = $testimonials_id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<div id="custom-content" class="modal-block modal-block-lg modal-block modal-header-color modal-block-primary" >
			<link rel="stylesheet" type="text/css" href="css/widgEditor.css"  />
			<section class="panel_hwc_modal">
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">View Detail of <?php print $row->testimonials_heading; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                        	<div class="col-sm-8 pull-left">
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Name</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->testimonials_heading; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                             <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Post</label>
		                                <div class="col-sm-10 pull-right">
		                                    <p class="text-dark view_p"><?php echo $row->testimonials_post; ?></p>	                                
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="col-sm-12 form-group">
		                                <label class="col-sm-2 col-form-label pull-left">Review</label>
		                                <div class="col-sm-10 pull-right">
		                                  <div class="text-dark view_p" style="color: #343a40 !important;"><?php echo $row->testimonials_short ?></div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
		                            <div class="pull-right" style="margin-top: 10px;">
                            			<a class="popup_edit btn btn-primary" style="color: #fff;"  id="<?php print $row->testimonials_id; ?>">Edit Info</a>
                            		</div>
                            		<div class="clearfix"></div>	

	                            </div>
	                            <div class="col-sm-4 pull-left">
	                            	<label class="col-sm-12 col-form-label">Current Image</label>
	                            	<?php 
		                            	if ($row->image == '') {
		                            		  echo 'No image Uploaded Yet!!';
		                            	}
		                            	else
		                            	{
		                            ?>
		                            		<p class="text-dark view_p"><?php echo $row->testimonials_heading; ?></p>
		                            		<img style="width: 100%; object-fit: cover;" src="../images/testimonials/<?php echo $row->image; ?>" alt="<?php echo $row->testimonials_heading; ?>" />
		                            		<br>
		                            		<div class="pull-right" style="margin-top: 10px;">
		                            			<a class="simple-ajax-popup btn btn-primary" href="ajax.php?edit_test_image=<?php print $row->page_id; ?>">Change Image</a>
		                            		</div>
		                            		<div class="clearfix"></div>	
		                            <?php
		                            	} 
	                            	?>
	                            </div>
	                            <div class="clearfix"></div>
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button class="btn btn-default modal-dismiss">Okay</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
			</section>
			<script src="assets/js/jquery/tiny/tinymce.min.js"></script>
			<script>
				 $('.simple-ajax-popup').magnificPopup({
		            type: 'ajax',
		            overflowY: 'scroll'
		        });
				$('.popup_edit').click(function(){
		            var id =  this.id;
		            $.ajax({
		                    url: 'ajax.php',
		                    type: 'GET',
		                    data: 'edit_page_test='+id,
		                    success:function(data){
		                        console.log(data);
		                        $('.simple-ajax-popup').magnificPopup('close');
		                        $('#page_modal .panel_hwc_modal').html(data);
		                        $.magnificPopup.open({
		                            items: {
		                                src: '#page_modal'
		                            },
		                              type: 'inline',
		                                preloader: false,
		                                modal: true
		                        });
		                        tinymce.remove();
		                        tinymce.init({
				                    selector: '#edit_descripton',
				                    width: '100%',
				                    height:  270,
		                            setup: function (editor) {
		                                editor.on('change', function () {
		                                   	// This will print out all your content in the tinyMce box
						                    console.log('the content '+editor.getContent());
						                     // Your text from the tinyMce box will now be passed to your  text area ... 
						                    $("#edit_descripton").text(editor.getContent()); 
		                                });
		                            }
				                });

		                    }
		                });
		        });
			</script>
		</div>
		<?php
	}
}
if (isset($_GET['edit_page_test'])) {
	$testimonials_id = $_GET['edit_page_test'];
	$sql = mysql_query("SELECT * FROM testimonials WHERE testimonials_id = $testimonials_id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<!-- <div id="custom-content" class="modal-block modal-block-md modal-block modal-header-color modal-block-primary" >
			<section class="panel_hwc_modal"> -->	
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">Edit Detail of <?php print $row->testimonials_heading; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                            <div class="col-sm-12 form-group">
	                                <label class="col-sm-2 col-form-label pull-left">Name</label>
	                                <div class="col-sm-10 pull-right">
	                                	<input type="hidden" name="testimonials_id" value="<?php print $row->testimonials_id; ?>">
	                                    <input type="text" class="form-control" value="<?php echo $row->testimonials_heading; ?>" name="testimonials_heading" required="" />
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
	                            <div class="col-sm-12 form-group">
	                                    <label class="col-sm-2 col-form-label pull-left">Post</label>
	                                    <div class="col-sm-10 pull-right">
	                                        <input type="text" class="form-control" name="testimonials_post" value="<?php echo $row->testimonials_post; ?>" required="" />
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div>
	                            <div class="col-sm-12 form-group">
	                                <label class="col-sm-2 col-form-label pull-left">Review</label>
	                                <div class="col-sm-10 pull-right">
	                                   <textarea  id="" class="form-control" name="testimonials_short"><?php echo $row->testimonials_short; ?></textarea>
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
	                                
	                             <?php  } ?>
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button type="submit" name="edit_page" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Edit Testimonial</button>
	                            <button class="btn btn-default modal-dismiss">Cancel</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
	            <script src="assets/js/jquery/tiny/tinymce.min.js"></script>
	            <script>
		      </script>
		<?php
	}

if (isset($_GET['edit_test_image'])) {
	$testimonials_id = $_GET['edit_test_image'];
	$sql = mysql_query("SELECT * FROM testimonials WHERE testimonials_id = $testimonials_id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<div id="custom-content" class="modal-block modal-block-lg modal-block modal-header-color modal-block-primary" >
			<section class="panel_hwc_modal">
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">Edit Detail of <?php print $row->testimonials_heading; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                        	<div class="col-md-8 pull-left">
		                            <div class="col-md-12 form-group">
		                                <label class="col-sm-2 pull-left control-label">Upload Image</label>
		                                <div class="col-sm-10 pull-left">
		                                    <div class="fileupload fileupload-new" data-provides="fileupload">
		                                        <div class="input-append">
		                                            <div class="uneditable-input">
		                                                <i class="fa fa-file fileupload-exists"></i>
		                                                <span class="fileupload-preview"></span>
		                                            </div>
		                                            <span class="btn btn-hwc btn-primary btn-file">
		                                                <span class="fileupload-exists">Change</span>
		                                                <span class="fileupload-new">Select Image</span>
		                                                <input type="file" name="image" required />
		                                            </span>
		                                            <input type="hidden" name="testimonials_id" value="<?php print $row->testimonials_id; ?>">
		                                            <a href="#" class="btn btn-hwc btn-warning fileupload-exists" data-dismiss="fileupload">Remove</a>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
	                            </div>
	                            <div class="col-md-4 pull-left">

	                            	<img style="width: 100%; object-fit: cover;" src="../images/testimonials/<?php echo $row->image ?>" alt="<?php echo $row->image ?>" />
	                            </div>
	                            <div class="clearfix"></div>	
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button type="submit" name="edit_test_image" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Edit Page</button>
	                            <button class="btn btn-default modal-dismiss">Cancel</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
			</section>
		</div>

		<?php
	}
}	
//testimonial end
if (isset($_GET['edit_image_member'])) {
	$id = $_GET['edit_image_member'];
	$sql = mysql_query("SELECT * FROM admin WHERE id = $id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<div id="custom-content" class="modal-block modal-block-lg modal-block modal-header-color modal-block-primary" >
			<section class="panel_hwc_modal">
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">Edit Detail of <?php print $row->username; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                <div class="panel_hwc_modal-body">
	                    <div class="modal-wrapper">
	                        <div class="ibox-content">
	                        	<div class="col-md-8 pull-left">
		                            <div class="col-md-12 form-group">
		                                <label class="col-sm-2 pull-left control-label">Upload Image</label>
		                                <div class="col-sm-10 pull-left">
		                                    <div class="fileupload fileupload-new" data-provides="fileupload">
		                                        <div class="input-append">
		                                            <div class="uneditable-input">
		                                                <i class="fa fa-file fileupload-exists"></i>
		                                                <span class="fileupload-preview"></span>
		                                            </div>
		                                            <span class="btn btn-hwc btn-primary btn-file">
		                                                <span class="fileupload-exists">Change</span>
		                                                <span class="fileupload-new">Select Image</span>
		                                                <input type="file" name="image" required />
		                                            </span>
		                                            <input type="hidden" name="id" value="<?php print $row->id; ?>">
		                                            <a href="#" class="btn btn-hwc btn-warning fileupload-exists" data-dismiss="fileupload">Remove</a>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="clearfix"></div>
		                            </div>
	                            </div>
	                            <div class="col-md-4 pull-left">

	                            	<img style="width: 100%; object-fit: cover;" src="../images/team/<?php echo $row->image ?>" alt="<?php echo $row->image ?>" />
	                            </div>
	                            <div class="clearfix"></div>	
	                        </div>
	                    </div>
	                </div>
	                <footer class="panel_hwc_modal-footer">
	                    <div class="row">
	                        <div class="col-md-12 text-right">
	                            <button type="submit" name="edit_test_image" class="btn btn-primary "><i class="fa fa-image text-white"></i> Edit Image</button>
	                            <button class="btn btn-default modal-dismiss">Cancel</button>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                </footer>
	                <div class="clearfix"></div>
	            </form>
			</section>
		</div>

		<?php
	}
}
if (isset($_GET['edit_member'])) {
	$member_id = $_GET['edit_member'];
	$sql = mysql_query("SELECT * FROM admin WHERE id = $member_id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<div id="custom-content" class="modal-block modal-block-md modal-block modal-header-color modal-block-primary" >
			<section class="panel_hwc_modal">
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">Edit Detail of <?php print $row->name; ?></h2>
				</header>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="panel_hwc_modal-body">
                    <div class="modal-wrapper">
                        <div class="ibox-content">
                            <div class="col-sm-12 form-group"><h3>General Info:</h3></div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">Name</label>
                                <div class="col-sm-10 pull-right">
                                    <input type="text" class="form-control" name="name" value="<?php echo $row->name; ?>" required/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">Address</label>
                                <div class="col-sm-10 pull-right">
                                    <input type="text" class="form-control" name="address" value="<?php echo $row->address; ?>" required />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                             <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">E-mail</label>
                                <div class="col-sm-10 pull-right">
                                    <input type="email" class="form-control" name="email" value="<?php echo $row->email; ?>" required />
                                    <input type="hidden" name="member_id" value="<?php echo $member_id; ?>" required />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">Gender</label>
                                <div class="col-sm-10 pull-right">
                                    <select class="select form-control" name="gender" required>
                                        <option value="male" <?php if ($row->gender == 'male') { echo 'selected="selected"'; } ?>>Male</option>
                                        <option value="female" <?php if ($row->gender == 'female') { echo 'selected="selected"'; } ?>>Fe-Male</option>
                                        <option value="other"  <?php if ($row->gender == 'other') { echo 'selected="selected"'; } ?>>Other</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-sm-12 form-group"><h3>Social Links:</h3></div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">Facebook</label>
                                <div class="col-sm-10 pull-right">
                                    <input type="text" class="form-control" name="facebook" value="<?php print $row->facebook;?>" />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">Instagram</label>
                                <div class="col-sm-10 pull-right">
                                    <input type="text" class="form-control" name="instagram" value="<?php print $row->instagram;?>"  />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">Twitter</label>
                                <div class="col-sm-10 pull-right">
                                    <input type="text" class="form-control" name="twitter" value="<?php print $row->twitter;?>"  />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">LinkedIn</label>
                                <div class="col-sm-10 pull-right">
                                    <input type="text" class="form-control" name="linkedin" value="<?php print $row->linkedin;?>"  />
                                </div>
                                <div class="clearfix"></div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <footer class="panel_hwc_modal-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" name="edit_team" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Edit Member</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </footer>
                <div class="clearfix"></div>
            </form>
			</section>
			<script>
			$('.select').select2();
			</script>
		</div>
		<?php
	}
}
if (isset($_GET['edit_member_pwd'])) {
	$member_id = $_GET['edit_member_pwd'];
	$sql = mysql_query("SELECT * FROM admin WHERE id = $member_id") or die(mysql_error());
	while ($row = mysql_fetch_object($sql)) {
		?>
		<div id="custom-content" class="modal-block modal-block-md modal-block modal-header-color modal-block-primary" >
			<section class="panel_hwc_modal">
				<header class="panel_hwc_modal-heading" style="background-color: #1a5871; ">
					<h2 class="panel_hwc_modal-title">Edit Detail of <?php print $row->name; ?></h2>
				</header>
                <div class="panel_hwc_modal-body">
                    <div class="modal-wrapper">
                        <div class="ibox-content">
                        	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                            <div class="col-sm-12 form-group">
	                                <label class="col-sm-2 col-form-label pull-left">Username</label>
	                                <div class="col-sm-7 pull-left">
	                                	<input type="hidden" name="member_id" value="<?php echo $member_id; ?>" required />
	                                	<input type="hidden" class="form-control" name="pusername" value="<?php echo $row->username; ?>" required/>
	                                    <input type="text" class="form-control" name="username" value="<?php echo $row->username; ?>" required/>
	                                </div>
	                                <div class="col-sm-3 pull-right">
	                                	<button class="btn btn-primary" name="update-username">Update username</button>
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
	                        </form>
	                        <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	                            <div class="col-sm-12 form-group">
	                                <label class="col-sm-2 col-form-label pull-left">Password</label>
	                                <div class="col-sm-7 pull-left">
										<input type="password" class="form-control" name="password" placeholder="Enter password" required />
	                                	<input type="hidden" name="member_id" value="<?php echo $member_id; ?>" required />
	                                </div>
	                                <div class="col-sm-3 pull-right">
	                                	<button class="btn btn-primary" name="update-password">Update password</button>
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
	                        </form>
                        </div>
                    </div>
                </div>
                <footer class="panel_hwc_modal-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </footer>
                <div class="clearfix"></div>
			</section>
		</div>
		<?php
	}
}
if(isset($_POST['id'])){
	$newlevel = 0;
	$id = $_POST['id'];
	$action = $_POST['action'];
	$sql1 = mysql_query("SELECT level FROM menu WHERE menu_id = $id LIMIt 1") or die(mysql_error());
	$row1 = mysql_fetch_assoc($sql1);
	$curLevel = $row1['level'];
	if($action == 'up'){
		$newlevel = $curLevel-1;
	}
	else if($action == 'down'){
		$newlevel = $curLevel+1;
	}
	$sql2 = mysql_query("SELECT menu_id FROM menu WHERE level = '$newlevel' LIMIT 1") or die(mysql_error());
	$row2 = mysql_fetch_assoc($sql2);
	$pid = $row2['menu_id'];
	print "UPDATE menu SET level = CASE menu_id
                     WHEN $id THEN $newlevel
                     WHEN $pid THEN $curLevel
                   END
	 WHERE menu_id IN ($id,$pid)";
	$update1 = mysql_query("UPDATE menu SET level = CASE menu_id
                     WHEN $id THEN $newlevel
                     WHEN $pid THEN $curLevel
                   END
	 WHERE menu_id IN ($id,$pid)") or die(mysql_error());
	  $i =1;
	    $sql = mysql_query("SELECT * FROM menu ORDER BY level") or die(mysql_error());
	    $end = mysql_num_rows($sql);
	    while ($row = mysql_fetch_object($sql)) {
	?>
	    <tr class="grade">
	        <td><?php print $i++; ?></td>
	        <td><?php print $row->menu_heading; ?></td>
	        <td>
	            <?php 
	                if($row->image == '' || $row->image == NULL)
	                {
	                    print 'Image Not uploaded';

	                } else
	                {
	            ?> 
	                    <img style="width: 50px; height: 50px; object-fit: cover;" src="images/<?php echo $row->image ?>" alt="<?php echo $row->image ?>"> 
	            <?php
	                }
	            ?>
	                    
	        </td>
	        <td class="center"> 
	            <a class="simple-ajax-popup" href="ajax.php?view_page_menu=<?php print $row->menu_id; ?>"> <i class="fa fa-eye"></i> </a> 
	           	<a class="popup_edit" id="<?php print $row->menu_id; ?>"> <i class="fa fa-pencil"></i> </a>
	               <a onclick="confirm_delete(<?php print $row->menu_id; ?>)"> <i class="fa fa-trash"></i> </a> 
	            <a class="simple-ajax-popup" href="ajax.php?edit_page_menu_image=<?php print $row->menu_id; ?>"> <i class="fa fa-image"></i> </a>
	            <?php 
	            if($row->level == 1){
	            print '<a class="level down" id="'.$row->menu_id.'"><i class="fa fa-angle-down"></i></a>';
	            }
	            elseif($row->level == $end){
	            print '<a class="level up" id="'.$row->menu_id.'"><i class="fa fa-angle-up"></i></a>';
	            }
	            else{
	            print '<a class="level down" id="'.$row->menu_id.'"><i class="fa fa-angle-down"></i></a> <a class="level up" id="'.$row->menu_id.'"><i class="fa fa-angle-up"></i></a>';
	            } ?>
	            
	        </td>
	    </tr>
	    <?php
	    }
    ?>
    <script src="assets/js/jquery/tiny/tinymce.min.js"></script>
    <script>

        $(function() {
            $('.select').select2();
        });
       $('.popup_edit').click(function(){
            var id =  this.id;
            $.ajax({
                    url: 'ajax.php',
                    type: 'GET',
                    data: 'edit_page_menu='+id,
                    success:function(data){
                        console.log(data);
                        $('.simple-ajax-popup').magnificPopup('close');
                        $('#page_modal .panel_hwc_modal').html(data);
                        $.magnificPopup.open({
                            items: {
                                src: '#page_modal'
                            },
                              type: 'inline',
                                preloader: false,
                                modal: true
                        });

                    }
                });
        });
         $('.simple-ajax-popup').magnificPopup({
            type: 'ajax'
        });
    </script>
    <script>
        function confirm_delete(id)
        {
            var id = id;
            console.log(id);
            var link = '?del='+id;
            $('.delete_id').attr('href',link);
            $.magnificPopup.open({
                    items: {
                        src: '#confirm_delete'
                    },
                      type: 'inline',
                      preloader: false,
                      modal: true
                });
        }
    </script>

    <script>
        $('.level').click(function(){
            var id = this.id;
            var action ="";
            if($(this).hasClass('up')){
                action = 'up';
            } 
            else if($(this).hasClass('down')){
                action = 'down';
            }
            console.log(action);
            $.ajax({
                type:'POST',
                url:'ajax.php',
                data:'id='+id+'&action='+action,
                success:function(html){
                    console.log(html);
                    $('.update').html(html);
                }
            });
        });
    </script>
    <?php
}
?>