      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
      	<section class="wrapper">

      		<div class="row">
      			<div class="col-lg-9 main-chart">
      				<!-- CALENDAR-->
      				<div class="border-head">
      					<h3>CALENDARIO DE PRUEBAS</h3>
      				</div>
      				<div id="calendar" class="mb">
      					<div class="panel green-panel no-margin">
      						<div class="panel-body">
      							<div id="my-calendar"></div>
      						</div>
      					</div>
      				</div><!-- / calendar -->

      				<div class="row mt">
      					<!--CUSTOM CHART START -->
      					<div class="border-head">
      						<h3>ASISTENCIA</h3>
      					</div>
      					<div class="custom-bar-chart">
      						<ul class="y-axis">
      							<li><span>100%</span></li>
      							<li><span>80%</span></li>
      							<li><span>60%</span></li>
      							<li><span>40%</span></li>
      							<li><span>20%</span></li>
      							<li><span>0</span></li>
      						</ul>
      						<div class="bar">
      							<div class="title">JAN</div>
      							<div class="value tooltips" data-original-title="98%" data-toggle="tooltip" data-placement="top">98%</div>
      						</div>
      						<div class="bar ">
      							<div class="title">FEB</div>
      							<div class="value tooltips" data-original-title="96%" data-toggle="tooltip" data-placement="top">96%</div>
      						</div>
      						<div class="bar ">
      							<div class="title">MAR</div>
      							<div class="value tooltips" data-original-title="92%" data-toggle="tooltip" data-placement="top">92%</div>
      						</div>
      						<div class="bar ">
      							<div class="title">APR</div>
      							<div class="value tooltips" data-original-title="90%" data-toggle="tooltip" data-placement="top">90%</div>
      						</div>
      						<div class="bar">
      							<div class="title">MAY</div>
      							<div class="value tooltips" data-original-title="97%" data-toggle="tooltip" data-placement="top">97%</div>
      						</div>
      						<div class="bar ">
      							<div class="title">JUN</div>
      							<div class="value tooltips" data-original-title="78%" data-toggle="tooltip" data-placement="top">78%</div>
      						</div>
      						<div class="bar">
      							<div class="title">JUL</div>
      							<div class="value tooltips" data-original-title="71%" data-toggle="tooltip" data-placement="top">71%</div>
      						</div>
      					</div>
      					<!--custom chart end-->
      				</div><!-- /row -->

      			</div><!-- /col-lg-9 END SECTION MIDDLE -->


      			<!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->

      			<div class="col-lg-3 ds">
      				<!--COMPLETED ACTIONS DONUTS CHART-->
      				<h3>PROFESORES</h3>
      				<!-- Fill profesors -->
      				<?php
						foreach ($profesores as $profesor) {
							if ($profesor->Id_Mensajes != $_SESSION['Id_Mensajes']) {
						?>
      						<div id="<?php echo $profesor->Id_Mensajes ?>" name="" class="desc" onclick="setIdTo(this.id)">
      							<div class="thumb">
      								<img class="img-circle" src="<?= base_url() ?>assets/img/ui-sam.jpg" width="35px" height="35px" align="">
      							</div>
      							<div class="details">
      								<p id="nombre-<?php echo $profesor->Id_Mensajes ?>"><?= $profesor->Nombre . " " . $profesor->Apellidos ?><br>
      									<muted><?= $profesor->Username ?></muted>
      								</p>
      							</div>
      						</div>
      				<?php
							}
						}
						?>

      				<!-- USERS ONLINE SECTION -->
      				<h3>ALUMNOS</h3>
      				<!-- Fill alumns -->
      				<?php
						foreach ($alumnos as $alumno) {
							if ($alumno->Id_Mensajes != $_SESSION['Id_Mensajes']) {
						?>
      						<div id="<?php echo $alumno->Id_Mensajes ?>" name="" class="desc" onclick="setIdTo(this.id)">
      							<div class="thumb">
      								<img class="img-circle" src="<?= base_url() ?>assets/img/ui-sam.jpg" width="35px" height="35px" align="">
      							</div>
      							<div class="details">
      								<p id="nombre-<?php echo $alumno->Id_Mensajes ?>"><?= $alumno->Nombre . " " . $alumno->Apellidos ?><br>
      									<muted><?= $alumno->Username ?></muted>
      								</p>
      							</div>
      						</div>
      				<?php
							}
						}
						?>
      				<br>

      			</div><!-- /col-lg-3 -->
      		</div>
      		<! --/row -->
      	</section>
      </section>

      <!--main content end-->
