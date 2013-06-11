<link type="text/css" rel="stylesheet" href="/internal/css/reports.css" />
<script type="text/javascript" src="/internal/js/highcharts/highcharts.src.js"></script>
<script type="text/javascript" src="/internal/Cargo/js/reports.js"></script>

<div class="bootstrap-container">

  <!-- Breadcrumbs -->
	<section class="nav-bar">
		<div class="content">
			<div class="pull-right">

				<!-- BeginIf name="arrNotes" drilldown="1" -->
					<!-- Var name="strButton" -->
				<!-- EndIf -->

				<!-- <a href="" class="btn btn-primary pull-left">Settings</a> -->

				<!-- BeginIf name="arrDateIntervals" -->
					<div class="btn-group pull-right" style="display: inline-block; margin-left: 2px;">
						<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
							Last <!-- Var name="strReportInterval" -->&nbsp;
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<!-- BeginRepeat name="arrDateIntervals" -->
								<li><a href="<!-- Var name="strHref" -->">Last <!-- Var name="strName" --></a></li>
							<!-- EndRepeat -->
						</ul>
					</div>
				<!-- EndIf -->
			</div>

			<!-- BeginIf name="arrDrillup" -->
				<ul class="breadcrumbs">
					<!-- BeginRepeat name="arrDrillup" -->
						<!-- BeginIf name="bolActive" -->
							<li class="active" title="<!-- Var name="strName" -->">
								<!-- Var name="strName" -->
							</li>
						<!-- EndIf -->
						<!-- BeginElse -->
							<li title="<!-- Var name="strName" -->">
								<a href="<!-- Var name="strHref" -->">
									<!-- Var name="strName" -->
								</a>
							</li>
						<!-- EndElse -->
					<!-- EndRepeat -->
				</ul>
			<!-- EndIf -->

		</div>
	</section>

 	<!-- Report Header -->
	<header class="report-header">
		<div class="content">

			<!-- BeginIf name="arrTotals" drilldown="1" -->
				<!-- BeginIf name="arrTotals" drilldown="1" -->
					<div class="pull-right stats">
						<dl class="pull-left">
							<dt class="text-right">Sales</dt>
							<dd class="text-right"><!-- Var name="intSalesQty" number_format="true" --></dd>
						</dl>
						<dl class="pull-left">
							<dt class="text-right">Revenue</dt>
							<dd class="text-right">&pound;<!-- Var name="decRevenue" number_format="2" --></dd>
						</dl>
						<dl class="pull-left">
							<dt class="text-right">Orders</dt>
							<dd class="text-right"><!-- Var name="intOrders" number_format="true" --></dd>
						</dl>
					</div>
				<!-- EndIf -->
			<!-- EndIf -->

			<h1 title="<!-- Var name="strReportTitle" -->">
				<!-- Var name="strReportTitle" --><br />
				<small>Live sales for the last <!-- Var name="strReportInterval" --></small>
			</h1>
		</div>
	</header>

	<section class="nav-tabbed">
		<div  class="tabs">
			<div class="content">
				<nav role="navigation">
					<ul class="tabs">
						<!-- BeginIf name="arrDrilldown" -->
							<li class="tab active">
								<button type="button" data-target=".ls-drilldown" data-group="ls-tabs">Navigation</button>
							</li>
						<!-- EndIf -->
						<!-- BeginIf name="arrSegmentedHistory" -->
							<li class="tab">
								<button type="button" data-target=".ls-graph" data-group="ls-tabs">History Graphs</button>
							</li>
						<!-- EndIf -->
						<!-- BeginIf name="arrBestSellers" -->
							<li class="tab">
								<button type="button" data-target=".ls-bestsellers" data-group="ls-tabs">Top Products</button>
							</li>
						<!-- EndIf -->
					</ul>
				</nav>
			</div>
		</div>
	</section>

	<!-- Report Drilldown -->
	<!-- BeginIf name="arrDrilldown" drilldown="1" -->
		<section class="nav-drilldown">
			<div class="content content-padded content-whited ls-drilldown ls-tabs active">
				<nav role="navigation">
					<ul class="drilldown nomargin">
						<li>
							<!-- BeginIf name="arrDrilldownSort" drilldown="1" -->
								<div class="row-fluid">
									<!-- BeginIf name="arrName" drilldown="1" -->
										<div class="span7">
											<a href="<!-- Var name="strHref" -->">
												<h3 class="nomargin" style="display: inline;">
													<!-- Var name="strDrilldownLevel" -->
												</h3>
												<!-- BeginIf name="bolActive" -->
													<h3 class="<!-- Var name="strClass" -->"></h3>
												<!-- EndIf -->
											</a>
										</div>
									<!-- EndIf -->
									<!-- BeginIf name="arrMoorgate" drilldown="1" -->
										<div class="span1">
											<a href="<!-- Var name="strHref" -->">
												<!-- Var name="strName" -->
											</a>
											<!-- BeginIf name="bolActive" -->
												<span class="<!-- Var name="strClass" -->"></span>
											<!-- EndIf -->
										</div>
									<!-- EndIf -->
									<!-- BeginIf name="arrEDI" drilldown="1" -->
										<div class="span1">
											<a href="<!-- Var name="strHref" -->">
												<!-- Var name="strName" -->
											</a>
											<!-- BeginIf name="bolActive" -->
												<span class="<!-- Var name="strClass" -->"></span>
											<!-- EndIf -->
										</div>
									<!-- EndIf -->
									<!-- BeginIf name="arrSales" drilldown="1" -->
										<div class="span1">
											<a href="<!-- Var name="strHref" -->">
												<!-- Var name="strName" -->
											</a>
											<!-- BeginIf name="bolActive" -->
												<span class="<!-- Var name="strClass" -->"></span>
											<!-- EndIf -->
										</div>
									<!-- EndIf -->
									<!-- BeginIf name="arrRevenue" drilldown="1" -->
										<div class="span1">
											<a href="<!-- Var name="strHref" -->">
												<!-- Var name="strName" -->
											</a>
											<!-- BeginIf name="bolActive" -->
												<span class="<!-- Var name="strClass" -->"></span>
											<!-- EndIf -->
										</div>
									<!-- EndIf -->
									<!-- BeginIf name="arrOrders" drilldown="1" -->
										<div class="span1">
											<a href="<!-- Var name="strHref" -->">
												<!-- Var name="strName" -->
											</a>
											<!-- BeginIf name="bolActive" -->
												<span class="<!-- Var name="strClass" -->"></span>
											<!-- EndIf -->
										</div>
									<!-- EndIf -->
								</div>
							<!-- EndIf -->
						</li>
							<!-- BeginIf name="arrDrilldownData" -->
								<!-- BeginRepeat name="arrDrilldownData" -->
									<li class="row">
										<div class="row-fluid">
											<div class="span7">
												<a class="driller" href="<!-- Var name="strHref" -->"><h4 class="nomargin"><!-- Var name="strName" --></h4></a>
											</div>
											<!-- <div class="span1"><span class="<!-- Var name="strStatus" optional="1" -->"><!-- Var name="strStatus" optional="1" --></span></div> -->
											<div class="span1"><!-- Var name="intMoorgate" --></div>
											<div class="span1"><!-- Var name="intEDI" --></div>
											<div class="span1"><!-- Var name="intSalesQty" number_format="true" --></div>
											<div class="span1">&pound;<!-- Var name="decRevenue" number_format="2" --></div>
											<div class="span1"><!-- Var name="intOrders" number_format="true" --></div>
										</div>
									</li>
								<!-- EndRepeat -->
							<!-- EndIf -->
					</ul>
				</nav>
			</div>
		</section>
	<!-- EndIf -->

	<!-- Report Focus Graphs -->
	<!-- BeginIf name="arrSegmentedHistory" -->
		<!-- BeginRepeat name="arrSegmentedHistory" key="strSegmentName" -->
			<div class="content content-padded content-whited ls-graph ls-tabs">
				<!-- SubTemplate name="chart.tpl" -->
			</div>
		<!-- EndRepeat -->
	<!-- EndIf -->

	<!-- Report Focus Table -->
	<!-- BeginIf name="arrBestSellers" drilldown="1" -->
		<section class="nav-drilldown">
			<div class="content content-padded content-whited ls-bestsellers ls-tabs">
				<nav role="navigation">
					<ul class="drilldown nomargin">
						<li>
							<div class="row-fluid">
								<div class="span8">
									<h3 class="nomargin">Top Products</h3>
								</div>
								<!-- BeginIf name="arrBestSellersSort" drilldown="1" -->
									<!-- BeginIf name="arrSales" drilldown="1" -->
										<div class="offset1 span1">
											<a href="<!-- Var name="strHref" -->">
												<!-- Var name="strName" -->
												<!-- BeginIf name="bolActive" -->
													<span class="sort-desc"></span>
												<!-- EndIf -->
											</a>
										</div>
									<!-- EndIf -->
									<!-- BeginIf name="arrRevenue" drilldown="1" -->
										<div class="span1">
											<a href="<!-- Var name="strHref" -->">
												<!-- Var name="strName" -->
												<!-- BeginIf name="bolActive" -->
													<span class="sort-desc"></span>
												<!-- EndIf -->
											</a>
										</div>
									<!-- EndIf -->
									<!-- BeginIf name="arrOrders" drilldown="1" -->
										<div class="span1">
											<a href="<!-- Var name="strHref" -->">
												<!-- Var name="strName" -->
												<!-- BeginIf name="bolActive" -->
													<span class="sort-desc"></span>
												<!-- EndIf -->
											</a>
										</div>
									<!-- EndIf -->
								<!-- EndIf -->
							</div>
						</li>
							<!-- BeginRepeat name="arrBestSellers" -->
								<li class="row">
									<div class="row-fluid">
										<div class="span8">
											<h4 class="nomargin"><!-- Var name="strName" --></h4>
										</div>
										<div class="span1"><span class="<!-- Var name="strStatus" optional="1" -->"><!-- Var name="strStatus" optional="1" --></span></div>
										<div class="span1"><!-- Var name="intSalesQty" number_format="true" --></div>
										<div class="span1">&pound;<!-- Var name="decRevenue" number_format="2" --></div>
										<div class="span1"><!-- Var name="intOrders" number_format="true" --></div>
									</div>
								</li>
							<!-- EndRepeat -->
					</ul>
				</nav>
			</div>
		</section>
	<!-- EndIf -->
</div>

<!-- BeginIf name="arrNotes" drilldown="1" -->
	<!-- Var name="strLoader" -->
<!-- EndIf -->
