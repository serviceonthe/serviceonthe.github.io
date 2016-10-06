	  
	
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
						<?php
							if($this->session->flashdata('success') || $this->session->flashdata('danger'))
							{
							?>
								<div class="alert alert-<?php echo ($this->session->flashdata('success'))?'success':'danger';?> alert-dismissable">
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
									<?php echo ($this->session->flashdata('success'))?$this->session->flashdata('success'):$this->session->flashdata('danger');?>
								</div>
							<?php
							}
							?>
                    <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                      	<div class="col-md-12 col-sm-12 mb">
                      		<!-- <div class="white-panel">
                            <img class="img img-responsive" width="100%" src="<?php echo base_url(); ?>assets/admin_assets/img/g-analytics.jpg" />
                                                    </div> -->

                          <! --/grey-panel -->


                           <script>
                            (function(w,d,s,g,js,fs){
                              g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
                              js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
                              js.src='https://apis.google.com/js/platform.js';
                              fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
                            }(window,document,'script'));
                          </script>

                          <script>
                            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                            ga('create', 'UA-68372867-1', 'auto');
                            ga('send', 'pageview');
                          </script>



                          <div id="embed-api-auth-container"></div>                          
                          <div class="col-md-6 col-sm-12 mb" id="chart-1-container"></div>
                          <div class="col-md-6 col-sm-12 mb" id="chart-2-container"></div>
                          <div class="col-md-6 col-sm-12 mb" id="chart-container"></div>

                          <div style="display:none" class="col-md-6 col-sm-12 mb" id="view-selector-container"></div>
                          <div class="col-md-6 col-sm-12 mb" id="main-chart-container"></div>
                          <div class="col-md-6 col-sm-12 mb" id="breakdown-chart-container"></div>

                          <div style="display:none" class="col-md-6 col-sm-12 mb" id="view-selector-1-container"></div>
                          <div style="display:none" class="col-md-6 col-sm-12 mb" id="view-selector-2-container"></div>
                          <script>
                            gapi.analytics.ready(function() {

                            // var account_id='ga:106879352';
                            var account_id='ga:107120335';

                            /**
                             * Authorize the user immediately if the user has already granted access.
                             * If no access has been created, render an authorize button inside the
                             * element with the ID "embed-api-auth-container".
                             */
                            gapi.analytics.auth.authorize({
                              container: 'embed-api-auth-container',
                              clientid: '845493644141-gphtateqbc3uvciq6525vj6sqbcn7cdc.apps.googleusercontent.com'
                            });

                          /**
                           * Create a ViewSelector for the first view to be rendered inside of an
                           * element with the id "view-selector-1-container".
                           */
                          var viewSelector1 = new gapi.analytics.ViewSelector({
                            container: 'view-selector-1-container'
                          });

                          /**
                           * Create a ViewSelector for the second view to be rendered inside of an
                           * element with the id "view-selector-2-container".
                           */
                          var viewSelector2 = new gapi.analytics.ViewSelector({
                            container: 'view-selector-2-container'
                          });

                            var dataChart = new gapi.analytics.googleCharts.DataChart({
                            query: {
                              metrics: 'ga:sessions',
                              dimensions: 'ga:date',
                              'start-date': '30daysAgo',
                              'end-date': 'yesterday'
                            },
                            chart: {
                              container: 'chart-container',
                              type: 'LINE',
                              options: {
                                width: '100%'
                              }
                            }
                          });


                          // Render both view selectors to the page.
                          viewSelector1.execute();
                          viewSelector2.execute();


                          /**
                           * Create the first DataChart for top countries over the past 30 days.
                           * It will be rendered inside an element with the id "chart-1-container".
                           */
                          var dataChart1 = new gapi.analytics.googleCharts.DataChart({
                            query: {
                              metrics: 'ga:sessions',
                              dimensions: 'ga:country',
                              'start-date': '30daysAgo',
                              'end-date': 'yesterday',
                              'max-results': 6,
                              sort: '-ga:sessions'
                            },
                            chart: {
                              container: 'chart-1-container',
                              type: 'PIE',
                              options: {
                                width: '100%',
                                pieHole: 4/9
                              }
                            }
                          });


                          /**
                           * Create the second DataChart for top countries over the past 30 days.
                           * It will be rendered inside an element with the id "chart-2-container".
                           */
                          var dataChart2 = new gapi.analytics.googleCharts.DataChart({
                            query: {
                              metrics: 'ga:sessions',
                              dimensions: 'ga:country',
                              'start-date': '30daysAgo',
                              'end-date': 'yesterday',
                              'max-results': 6,
                              sort: '-ga:sessions'
                            },
                            chart: {
                              container: 'chart-2-container',
                              type: 'PIE',
                              options: {
                                width: '100%',
                                pieHole: 4/9
                              }
                            }
                          });

                          /**
                           * Update the first dataChart when the first view selecter is changed.
                           */
                          // viewSelector1.on('change', function(ids) {
                            // alert(ids);
                            dataChart1.set({query: {ids: account_id}}).execute();
                            dataChart2.set({query: {ids: account_id}}).execute();
                            dataChart.set({query: {ids: account_id}}).execute();
                          // });

                          /**
                           * Update the second dataChart when the second view selecter is changed.
                           */
                          /*viewSelector2.on('change', function(ids) {
                            dataChart2.set({query: {ids: ids}}).execute();
                          });*/



                        /**
                           * Create a new ViewSelector instance to be rendered inside of an
                           * element with the id "view-selector-container".
                           */
                          var viewSelector = new gapi.analytics.ViewSelector({
                            container: 'view-selector-container'
                          });

                          // Render the view selector to the page.
                          viewSelector.execute();

                          /**
                           * Create a table chart showing top browsers for users to interact with.
                           * Clicking on a row in the table will update a second timeline chart with
                           * data from the selected browser.
                           */
                          var mainChart = new gapi.analytics.googleCharts.DataChart({
                            query: {
                              'dimensions': 'ga:browser',
                              'metrics': 'ga:sessions',
                              'sort': '-ga:sessions',
                              'max-results': '6'
                            },
                            chart: {
                              type: 'TABLE',
                              container: 'main-chart-container',
                              options: {
                                width: '100%'
                              }
                            }
                          });


                          /**
                           * Create a timeline chart showing sessions over time for the browser the
                           * user selected in the main chart.
                           */
                          var breakdownChart = new gapi.analytics.googleCharts.DataChart({
                            query: {
                              'dimensions': 'ga:date',
                              'metrics': 'ga:sessions',
                              'start-date': '7daysAgo',
                              'end-date': 'yesterday'
                            },
                            chart: {
                              type: 'LINE',
                              container: 'breakdown-chart-container',
                              options: {
                                width: '100%'
                              }
                            }
                          });


                          /**
                           * Store a refernce to the row click listener variable so it can be
                           * removed later to prevent leaking memory when the chart instance is
                           * replaced.
                           */
                          var mainChartRowClickListener;


                          /**
                           * Update both charts whenever the selected view changes.
                           */
                          // viewSelector.on('change', function(ids) {
                            var options = {query: {ids: account_id}};

                            // Clean up any event listeners registered on the main chart before
                            // rendering a new one.
                            if (mainChartRowClickListener) {
                              google.visualization.events.removeListener(mainChartRowClickListener);
                            }

                            mainChart.set(options).execute();
                            breakdownChart.set(options);

                            // Only render the breakdown chart if a browser filter has been set.
                            if (breakdownChart.get().query.filters) breakdownChart.execute();
                          // });


                          /**
                           * Each time the main chart is rendered, add an event listener to it so
                           * that when the user clicks on a row, the line chart is updated with
                           * the data from the browser in the clicked row.
                           */
                          mainChart.on('success', function(response) {

                            var chart = response.chart;
                            var dataTable = response.dataTable;

                            // Store a reference to this listener so it can be cleaned up later.
                            mainChartRowClickListener = google.visualization.events
                                .addListener(chart, 'select', function(event) {

                              // When you unselect a row, the "select" event still fires
                              // but the selection is empty. Ignore that case.
                              if (!chart.getSelection().length) return;

                              var row =  chart.getSelection()[0].row;
                              var browser =  dataTable.getValue(row, 0);
                              var options = {
                                query: {
                                  filters: 'ga:browser==' + browser
                                },
                                chart: {
                                  options: {
                                    title: browser
                                  }
                                }
                              };

                              breakdownChart.set(options).execute();
                            });
                          });

                        });
                        </script>
                      	</div><!-- /col-md-4-->
                      	
                    </div><!-- /row -->
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>NOTIFICATIONS</h3>
                                        
                      <!-- First Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>2 Minutes Ago</muted><br/>
                      		   <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                      		</p>
                      	</div>
                      </div>
                      <!-- Second Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>3 Hours Ago</muted><br/>
                      		   <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
                      		</p>
                      	</div>
                      </div>
                      <!-- Third Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>7 Hours Ago</muted><br/>
                      		   <a href="#">Brandon Page</a> purchased a year subscription.<br/>
                      		</p>
                      	</div>
                      </div>
                      <!-- Third Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>7 Hours Ago</muted><br/>
                      		   <a href="#">Brandon Page</a> purchased a year subscription.<br/>
                      		</p>
                      	</div>
                      </div>
                      <!-- Third Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>7 Hours Ago</muted><br/>
                      		   <a href="#">Brandon Page</a> purchased a year subscription.<br/>
                      		</p>
                      	</div>
                      </div>                      
                  </div><!-- /col-lg-3 -->
              </div><!--/row -->
          </section>
      </section>

      <!--main content end-->
