<?php 
	echo doctype('html5');
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php 
		$meta = array(
			array(
				'name' => 'Content-Type',
				'content' => 'text/html; charset=UTF-8',
				'type' => 'equiv'
			),
			array(
				'name' => 'X-UA-Compatible',
				'content' => 'IE=edge',
				'type' => 'equiv'
			),
			array(
				'name' => 'viewport',
				'content' => 'width=device-width, initial-scale=1'
			)
		);
		echo meta($meta);
		
		echo get_title();
		echo get_css();
		
		if(get_favicon()){
			echo link_tag(get_favicon());
		}
	?>
	<script type="text/javascript">
		var baseURL = '<?php echo base_url();?>';
	</script>
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<?php $this->load->view('sidebar'); ?>
			</div>
			<div class="top_nav">
				<?php $this->load->view('top-nav'); ?>
			</div>
			<div class="right_col" role="main">