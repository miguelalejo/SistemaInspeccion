<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
	<?php include_javascripts() ?>
    <?php include_stylesheets() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
 <body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">		
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>			
          </button>		 
	      <a class="navbar-brand" href="#">		
			CN-PINTAG
		  </a>		
        </div>		
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
			<?php if ($sf_user->hasGroup('administradores')|| $sf_user->hasGroup('inspectores')): ?>	
            <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registro<b class="caret"></b></a>
                  <ul class="dropdown-menu">
					<li class="dropdown-header">Registro y Creaci&oacute;n</li>
					<li><a href=<?php echo url_for('ruta_alumno') ?> >Alumno</a></li>
					<li><a href=<?php echo url_for('ruta_inspector') ?> >Inspector</a></li>
					<li><a href=<?php echo url_for('ruta_curso') ?> >Curso</a></li>
					<li><a href=<?php echo url_for('ruta_paralelo') ?> >Paralelo</a></li>					
					<li><a href=<?php echo url_for('ruta_materia') ?> >Materia</a></li>			
					<li><a href=<?php echo url_for('ruta_horario') ?> >Horario</a></li>	
					<li><a href=<?php echo url_for('ruta_dia') ?> >D&iacute;a</a></li>	
					<li><a href=<?php echo url_for('ruta_tiponovedad') ?> >Tipo Novedad</a></li>
					<li><a href=<?php echo url_for('ruta_tipofalta') ?> >Tipo Falta</a></li>				
                    <li class="divider"></li>                    
                  </ul>
            </li>	
			<?php endif ?>
			<?php if ($sf_user->hasGroup('administradores')): ?>
			<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administraci&oacute;n Escolar<b class="caret"></b></a>
                  <ul class="dropdown-menu">
					<li class="dropdown-header">Registro y Creaci&oacute;n</li>
                    <li><a href=<?php echo url_for('ruta_periodo') ?> >Periodo</a></li>
                    <li><a href=<?php echo url_for('ruta_periodoescolar') ?> >Periodo Escolar</a></li>
                    <li><a href=<?php echo url_for('ruta_parcial') ?> >Parcial</a></li>
                    <li class="divider"></li>                    
                  </ul>
            </li>		
			<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sistema<b class="caret"></b></a>
                  <ul class="dropdown-menu">
					<li class="dropdown-header">Administracion</li>
                  		<li><?php echo link_to('Usuarios', 'sf_guard_user') ?></li>
						<li><?php echo link_to('Grupos', 'sf_guard_group') ?></li>
						<li><?php echo link_to('Permisos', 'sf_guard_permission') ?></li>
                    <li class="divider"></li>                    
                  </ul>
            </li>
			<?php endif ?>
          </ul>
		  	<div class="navbar-form navbar-left">
				<?php if ($sf_user->hasGroup('administradores')): ?>
					<img class="img-circle" alt="32x32" style="width: 32px; height: 32px;" src="/images/icons/seguridad/verde.png">
				<?php endif ?>
				<?php if ($sf_user->hasGroup('inspectores')): ?>
					<img class="img-circle" alt="32x32" style="width: 32px; height: 32px;" src="/images/icons/seguridad/azul.png">
				<?php endif ?>
				<?php if ($sf_user->hasGroup('alumnos')): ?>
					<img class="img-circle" alt="32x32" style="width: 32px; height: 32px;" src="/images/icons/seguridad/amarillo.png">
				<?php endif ?>
			</div>
				<script type="text/javascript">
				function redirect() {
					window.location = "http://www.google.com/"

				}
				</script>
		   <form class="navbar-form navbar-right" action=<?php echo url_for('@sf_guard_signout'); ?> >
                <button type="submit" onclick="redirect()" class="btn btn-success">Cerrar Sessi&oacute;n</button>
          </form>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->

    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="row">            
			<?php echo $sf_content ?>
          </div><!--/row-->
        </div><!--/span-->
				
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
			<?php if ($sf_user->hasGroup('administradores')|| $sf_user->hasGroup('inspectores')): ?>				
				<a href="#" class="list-group-item active">Relacionar</a>
				<a href=<?php echo url_for('ruta_cursoalumno') ?> class="list-group-item">Alumno Curso</a>
				<a href=<?php echo url_for('ruta_novedad') ?> class="list-group-item">Alumno Novedad</a>
				<a href=<?php echo url_for('ruta_falta') ?> class="list-group-item">Alumno Falta</a>
				<a href="#" class="list-group-item active">Relacionar</a>
				<a href=<?php echo url_for('ruta_cursomateriahorario') ?> class="list-group-item">Curso Horario Y Materia</a>            
			<?php endif ?>
			<?php if ($sf_user->hasGroup('administradores')|| $sf_user->hasGroup('inspectores')||$sf_user->hasGroup('alumnos')): ?>
				<a href="#" class="list-group-item active">Reporte</a>
				<a href=<?php echo url_for('ruta_novedadesAlumno') ?> class="list-group-item">Novedades del Alumno</a>    
			<?php endif ?>			
			
          </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Colegio Nacional Pintag 2013</p>
      </footer>

    </div><!--/.container-->
  </body>      
</html>
