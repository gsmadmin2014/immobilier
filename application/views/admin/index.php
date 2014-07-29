<div class="page-header position-relative">
	<h1>
		Dashboard
		<small>
			<i class="icon-double-angle-right"></i>
			overview &amp; stats
		</small>
	</h1>
</div><!--/.page-header-->

<div class="row-fluid">
	<div class="span12">
		<!--PAGE CONTENT BEGINS-->
		<div class="row-fluid">
			<div class="span7 infobox-container">
				<div class="infobox infobox-green  ">
					<div class="infobox-icon">
						<i class="icon-comments"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?php if(isset($usercount)){echo $usercount;}else{echo "0";} ?></span>
						<div class="infobox-content">Users</div>
					</div>
					<div class="stat stat-success"><?php if(isset($usercount)){echo $usercount;}else{echo "0";} ?></div>
				</div>

				<div class="infobox infobox-blue  ">
					<div class="infobox-icon">
						<i class="icon-twitter"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?php if(isset($agencecount)){echo $agencecount;}else{echo "0";} ?></span>
						<div class="infobox-content">Agences</div>
					</div>

					<div class="badge badge-success">
						+32%
						<i class="icon-arrow-up"></i>
					</div>
				</div>

				<div class="infobox infobox-pink  ">
					<div class="infobox-icon">
						<i class="icon-shopping-cart"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?php if(isset($immocount)){echo $immocount;}else{echo "0";} ?></span>
						<div class="infobox-content">Immobilier</div>
					</div>
					<div class="stat stat-important">+4%</div>
				</div>

				<div class="infobox infobox-red  ">
					<div class="infobox-icon">
						<i class="icon-beaker"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number">7</span>
						<div class="infobox-content">experiments</div>
					</div>
				</div>

				<div class="infobox infobox-orange2  ">
				
                    <div class="infobox-progress">
						<div class="easy-pie-chart percentage" data-percent="42" data-size="46">
							<span class="percent"><?php if(isset($immocountRent)){echo (round(($immocountRent/$immocount)*100));}else{echo "0";} ?></span>
							%
						</div>
					</div>

					<div class="infobox-data">
						<span class="infobox-text">	<?php if(isset($immocountRent)){echo $immocountRent;}else{echo "0";} ?></span>

						<div class="infobox-content">
							
						Rents
						</div>
					</div>

					
				</div>

				<div class="infobox infobox-blue2  ">
					<div class="infobox-progress">
						<div class="easy-pie-chart percentage" data-percent="42" data-size="46">
							<span class="percent"><?php if(isset($immocountSale)){echo (round(($immocountSale/$immocount)*100));}else{echo "0";} ?></span>
							%
						</div>
					</div>

					<div class="infobox-data">
						<span class="infobox-text">	<?php if(isset($immocountSale)){echo $immocountSale;}else{echo "0";} ?></span>

						<div class="infobox-content">
							
						Sales
						</div>
					</div>
				</div>

				<div class="space-6"></div>

				<div class="infobox infobox-green infobox-small infobox-dark">
					<div class="infobox-progress">
						<div class="easy-pie-chart percentage" data-percent="<?php if(isset($immocountVilla)){echo (round(($immocountVilla/$immocount)*100));}else{echo "0";} ?>" data-size="39">
							<span class="percent"><?php if(isset($immocountVilla)){echo (round(($immocountVilla/$immocount)*100));}else{echo "0";} ?></span>
							%
						</div>
					</div>

					<div class="infobox-data">
						<div class="infobox-content">Villa</div>
						
					</div>
				</div>

				<div class="infobox infobox-blue infobox-small infobox-dark">
					<div class="infobox-progress">
					<div class="easy-pie-chart percentage" data-percent="<?php if(isset($immocountCondo)){echo (round(($immocountCondo/$immocount)*100));}else{echo "0";} ?>" data-size="39">
						<span class="percent"><?php if(isset($immocountCondo)){echo (round(($immocountCondo/$immocount)*100));}else{echo "0";} ?></span>
						%
					</div>
					</div>

					<div class="infobox-data">
						<div class="infobox-content">Condo</div>
						
					</div>
				</div>

				<div class="infobox infobox-grey infobox-small infobox-dark">
					<div class="infobox-progress">
					<div class="easy-pie-chart percentage" data-percent="<?php if(isset($immocountAppart)){echo (round(($immocountAppart/$immocount)*100));}else{echo "0";} ?>" data-size="39">
						<span class="percent"><?php if(isset($immocountAppart)){echo (round(($immocountAppart/$immocount)*100));}else{echo "0";} ?></span>
						%
					</div>
					</div>

					<div class="infobox-data">
						<div class="infobox-content">Appartements</div>
						
					</div>
				</div>
			</div>

			<div class="vspace"></div>

			<div class="span5">
				<div class="widget-box">
					<div class="widget-header widget-header-flat widget-header-small">
						<h5>
							<i class="icon-signal"></i>
							Types immobilier
						</h5>

						<div class="widget-toolbar no-border">
							<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
								This Week
								<i class="icon-angle-down icon-on-right"></i>
							</button>

							<ul class="dropdown-menu dropdown-info pull-right dropdown-caret">
								<li class="active">
									<a href="#">This Week</a>
								</li>

								<li>
									<a href="#">Last Week</a>
								</li>

								<li>
									<a href="#">This Month</a>
								</li>

								<li>
									<a href="#">Last Month</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div id="piechart-placeholder"></div>

							<div class="hr hr8 hr-double"></div>

							<div class="clearfix">
								<div class="grid3">
									<span class="grey">
										<i class="icon-facebook-sign icon-2x blue"></i>
										&nbsp; likes
									</span>
									<h4 class="bigger pull-right">1,255</h4>
								</div>

								<div class="grid3">
									<span class="grey">
										<i class="icon-twitter-sign icon-2x purple"></i>
										&nbsp; tweets
									</span>
									<h4 class="bigger pull-right">941</h4>
								</div>

								<div class="grid3">
									<span class="grey">
										<i class="icon-pinterest-sign icon-2x red"></i>
										&nbsp; pins
									</span>
									<h4 class="bigger pull-right">1,050</h4>
								</div>
							</div>
						</div><!--/widget-main-->
					</div><!--/widget-body-->
				</div><!--/widget-box-->
			</div><!--/span-->
		</div><!--/row-->
		
		<!--PAGE CONTENT ENDS-->
	</div><!--/.span-->
</div><!--/.row-fluid-->

<!--page specific plugin scripts-->

<!--[if lte IE 8]>-->
  <script src="<?php echo base_url();?>assets/ace/js/excanvas.min.js"></script>
<!--<![endif]-->

<script src="<?php echo base_url();?>assets/ace/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo base_url();?>assets/ace/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url();?>assets/ace/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>assets/ace/js/jquery.easy-pie-chart.min.js"></script>
<script src="<?php echo base_url();?>assets/ace/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>assets/ace/js/flot/jquery.flot.min.js"></script>
<script src="<?php echo base_url();?>assets/ace/js/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo base_url();?>assets/ace/js/flot/jquery.flot.resize.min.js"></script>

<!--ace scripts-->

<input type="hidden" id="villa" value="<?php if(isset($immocountVilla)){echo (round(($immocountVilla/$immocount)*100));}else{ echo 0;} ?>" />
<input type="hidden" id="appart" value="<?php if(isset($immocountAppart)){echo (round(($immocountAppart/$immocount)*100));}else{ echo 0;} ?>" />
<input type="hidden" id="condo" value="<?php if(isset($immocountCondo)){echo (round(($immocountCondo/$immocount)*100));}else{ echo 0;} ?>" />

<script type="text/javascript">
$(function() {
    var villa=$("#villa").val();
    var appart=$("#appart").val();
    var condo=$("#condo").val();
	$('.easy-pie-chart.percentage').each(function(){
		var $box = $(this).closest('.infobox');
		var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
		var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
		var size = parseInt($(this).data('size')) || 50;
		$(this).easyPieChart({
			barColor: barColor,
			trackColor: trackColor,
			scaleColor: false,
			lineCap: 'butt',
			lineWidth: parseInt(size/10),
			animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
			size: size
		});
	})

	$('.sparkline').each(function(){
		var $box = $(this).closest('.infobox');
		var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
		$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
	});




  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
  var data = [
	{ label: "Villa",  data: villa, color: "#68BC31"},
	{ label: "Condo",  data: condo, color: "#2091CF"},
	{ label: "Appartement",  data: appart, color: "#AF4E96"}
  ]
  function drawPieChart(placeholder, data, position) {
 	  $.plot(placeholder, data, {
		series: {
			pie: {
				show: true,
				tilt:0.8,
				highlight: {
					opacity: 0.25
				},
				stroke: {
					color: '#fff',
					width: 2
				},
				startAngle: 2
			}
		},
		legend: {
			show: true,
			position: position || "ne", 
			labelBoxBorderColor: null,
			margin:[-30,15]
		}
		,
		grid: {
			hoverable: true,
			clickable: true
		}
	 })
 }
 drawPieChart(placeholder, data);

 /**
 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
 so that's not needed actually.
 */
 placeholder.data('chart', data);
 placeholder.data('draw', drawPieChart);



  var $tooltip = $("<div class='tooltip top in hide'><div class='tooltip-inner'></div></div>").appendTo('body');
  var previousPoint = null;

  placeholder.on('plothover', function (event, pos, item) {
	if(item) {
		if (previousPoint != item.seriesIndex) {
			previousPoint = item.seriesIndex;
			var tip = item.series['label'] + " : " + item.series['percent']+'%';
			$tooltip.show().children(0).text(tip);
		}
		$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
	} else {
		$tooltip.hide();
		previousPoint = null;
	}
	
 });






	var d1 = [];
	for (var i = 0; i < Math.PI * 2; i += 0.5) {
		d1.push([i, Math.sin(i)]);
	}

	var d2 = [];
	for (var i = 0; i < Math.PI * 2; i += 0.5) {
		d2.push([i, Math.cos(i)]);
	}

	var d3 = [];
	for (var i = 0; i < Math.PI * 2; i += 0.2) {
		d3.push([i, Math.tan(i)]);
	}
	

	


	
	

})
</script>
