@extends('layouts.admin')
@section('content')

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h4 class="text-themecolor mb-0">About Us</h4>
		</div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">
            <ol class="breadcrumb mb-0 p-0 bg-transparent fa-pull-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">About Us</li>
			</ol>
		</div>
	</div>
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
		
		<div class="col-12">
			<div class="card">
				<div class="border-bottom title-part-padding">
					<h4 class="card-title mb-0">About Us</h4>
				</div>
				<div class="card-body min_height">
				
					<div class="">
					
						<!-- Alert Append Box -->
						<div class="alert alert-success alert-dismissible text-white border-0 fade show" role="alert">
							<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
							<strong>Success - </strong> A simple Success alert
						</div> 
						
					</div>
					
					<textarea cols="80" id="testedit1" name="testedit1" rows="10" data-sample="2">
						<h2>What is Lorem Ipsum?</h2>
						
						<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<h2>What is Lorem Ipsum?</h2>
						
						<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
					</textarea>
				    <button class="btn btn-success btn_submit fa-pull-right mt-3">Update</button>
				</div>
			</div>
		</div>
		
	</div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->


<!-- This Page JS -->
<script src="{{ asset('assets/admin/libs/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/admin/libs/ckeditor/samples/js/sample.js') }}"></script>
<script>
	//default
	initSample();
	
	//inline editor
	// We need to turn off the automatic editor creation first.
	CKEDITOR.disableAutoInline = true;
	
	CKEDITOR.inline('editor2', {
		extraPlugins: 'sourcedialog',
		removePlugins: 'sourcearea'
	});
	
	var editor1 = CKEDITOR.replace('editor1', {
		extraAllowedContent: 'div',
		height: 460
	});
	editor1.on('instanceReady', function () {
		// Output self-closing tags the HTML4 way, like <br>.
		this.dataProcessor.writer.selfClosingEnd = '>';
		
		// Use line breaks for block elements, tables, and lists.
		var dtd = CKEDITOR.dtd;
		for (var e in CKEDITOR.tools.extend({}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent)) {
			this.dataProcessor.writer.setRules(e, {
				indent: true,
				breakBeforeOpen: true,
				breakAfterOpen: true,
				breakBeforeClose: true,
				breakAfterClose: true
			});
		}
		// Start in source mode.
		this.setMode('source');
	});
</script>
<script data-sample="1">
	CKEDITOR.replace('testedit', {
		height: 150
	});
</script>
<script data-sample="2">
	CKEDITOR.replace('testedit1', {
		height: 400
	});
</script>
<script data-sample="3">
	CKEDITOR.replace('testedit2', {
		height: 400
	});
</script>
<script data-sample="4">
	CKEDITOR.replace('tool-location', {
		toolbarLocation: 'bottom',
		// Remove some plugins that would conflict with the bottom
		// toolbar position.
		removePlugins: 'elementspath,resize'
	});
</script>







@stop