<?php
/**
 * Template Name: Staff page
 */

get_header(); ?>

		<div id="content-wraper" >
			<div class="staff" >
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
			<h1 style="margin: 0; font-weight: normal;">Nuestro Staff</h1>
			
			<div class="wide-box box-border box-floated-left staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/laura-fernandez-taito.png" alt="Laura Fernandez Taito"> 
				</div>
				<div class="staff-box-content">
					<h3>Laura Fernández Taito</h3>
					<span>Directora general</span>
					<p>	Traductora literaria, técnico - científica en Inglés, especializada en Temas Migratorios. Fundadora y Directora de ciudadaniaseuropeas.com, y Co-fundadora de Visasargentinas.com.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			<div class="wide-box box-border box-floated-right staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/sebastian-cabanuz.png" alt="Sebastián Cabañuz"> 
				</div>
				<div class="staff-box-content">
					<h3>Dr. Sebastián Cabañuz</h3>
					<span>Director de investigación enealógica</span>
					<p>Abogado, egresado de la Universidad de Buenos Aires, especialista en jurisprudencia y reformas en la legislación europea. Co-fundador de Visasargentinas.com<br>
						Especializado en genealogía argentina, española, italiana, y polaca.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			
			<div class="wide-box box-border box-floated-left staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/unknown.jpg" alt="Laura Fernandez Taito"> 
				</div>
				<div class="staff-box-content">
					<h3>Anabella Paula Forte</h3>
					<span>Consultora y coordinadora</span>
					<p>Completando estudios de grado en Licenciatura en Hisotoria, en la Universidad de Buenos Aires. Especializada en genealogía francesa, española e italiana, y en actualización de requisitos consulares. Bilingue francés.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			<div class="wide-box box-border box-floated-right staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/facundo-barbato.png" alt="Facundo Gutierrez Barbato"> 
				</div>
				<div class="staff-box-content">
					<h3>Facundo Gutierrez Barbato</h3>
					<span>Consultor</span>
					<p>Completando estudios de grado en FADU, Universidad de Buenos Aires. Especializado en Idioma, Documentología y Archivo, y en ciudadanías italiana, española y polaca.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			
			<div class="wide-box box-border box-floated-left staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/unknown.jpg" alt="Dr. Mariano A. Santillán Rafaniello"> 
				</div>
				<div class="staff-box-content">
					<h3>Laura Cecilia Koselsteino</h3>
					<span>Consultora</span>
					<p>Completando estudios en Consultoría Psicológica. Especializada en ciudadanías portuguesa, italiana y española y en el análisis de la aplicación que cada consulado hace de los requisitos legales. Bilingue portugués.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			<div class="wide-box box-border box-floated-right staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/unknown.jpg" alt="María de los Ángeles Desinanoo"> 
				</div>
				<div class="staff-box-content">
					<h3>Dra. Ivana Maite Odriozola </h3>
					<span>Consultora</span>
					<p>Abogada, recibida en la Universidad de Buenos Aires. Consultora especializada en ciudadanías italiana y española, encargada del asesoramiento y seguimiento post - entrega de carpeta consular.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			
			<div class="wide-box box-border box-floated-left staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/unknown.jpg" alt="Dr. Mariano A. Santillán Rafaniello"> 
				</div>
				<div class="staff-box-content">
					<h3>María Lorena Esperi</h3>
					<span>Consultora</span>
					<p>Abogada, egresada de la Universidad de La Plata. A cargo del seguimiento de los trámite de "cosa juzgada" de los trámites de ciudadanía italiana y española, y de la investigación genealógica en Italia. Bilingue italiano.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			<div class="wide-box box-border box-floated-right staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/gerarso-capasso.png" alt="Gerardo Capasso "> 
				</div>
				<div class="staff-box-content">
					<h3>Gerardo Capasso</h3>
					<span>Coordinador de Búsquedas Genealógicas en Italia</span>
					<p>Completando estudios de grado en la carrera de Abogacía, Universidad de Buenos Aires. Especializado en búsquedas genealógica en Italia e Inglaterra. Trilingue italiano e inglés.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			
			<div class="wide-box box-border box-floated-left staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/marcelo-lauria.png" alt="Marcelo Lauría"> 
				</div>
				<div class="staff-box-content">
					<h3>Marcelo César Lauría</h3>
					<span>Coordinador de Búsquedas Genealógicas en España</span>
					<p>Gestor Nacional, egresado de A.C.A.R.A. Periodista, egresado de TEA. Especializado en búsquedas genealógica en España.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			<div class="wide-box box-border box-floated-right staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/cristian-pellegrino.png" alt="Cristian Castaño Pellegrino"> 
				</div>
				<div class="staff-box-content">
					<h3>Cristian Castaño Pellegrino</h3>
					<span>Coordinador de Archivo y Documentación</span>
					<p>Completando estudios de grado en Administración de Empresas, en la Universidad Argentina de la Empresa.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			
			<div class="wide-box box-border box-floated-left staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/maria-de-los-angeles-desianoo.png" alt="María de los Ángeles Desinanoo"> 
				</div>
				<div class="staff-box-content">
					<h3>María de los Ángeles Desinanno </h3>
					<span>Consultora Senior</span>
					<p>Completando estudios de grado en Licenciatura en Ciencia Política, con especialización en Relaciones Internacionales. Especializada en genealogía alemana, polaca e italiana.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			<div class="wide-box box-border box-floated-right staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/unknown.jpg" alt="María de los Ángeles Desinanoo"> 
				</div>
				<div class="staff-box-content">
					<h3>Natalia Yamila Gonzalez</h3>
					<span>Clasificación de documentos</span>
					<p>Asistente de archivología y organización de la documentación, para su posterior traducción y legalización, previa presentación consular.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			
			<div class="wide-box box-border box-floated-left staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/unknown.jpg" alt="María de los Ángeles Desinanoo"> 
				</div>
				<div class="staff-box-content">
					<h3>Pamela Natalia Valdés </h3>
					<span>Area Finanzas</span>
					<p>Tecnica en Gestion Organizacional. Completando estudios de grado en Licenciatura Relaciones Laborales, Universidad de Lomas de Zamora.
Atención al cliente y gestión de pagos. Asistencia general.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			<?php /*
			<div class="wide-box box-border box-floated-left staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/mariano-rafaniello.png" alt="Dr. Mariano A. Santillán Rafaniello"> 
				</div>
				<div class="staff-box-content">
					<h3>Dr. Mariano A. Santillán Rafaniello</h3>
					<span>Director del área legal</span>
					<p>Abogado UBA, especializado en legislación italiana, portuguesa, española y francesa. Estudios en italiano jurídico. Maestrando en Derecho Internacional Privado de la Universidad de Buenos Aires.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			
			
			<div class="wide-box box-border box-floated-left staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/abel-herrero.png" alt="Dr.Diego Abel Herrero"> 
				</div>
				<div class="staff-box-content">
					<h3>Dr.Diego Abel Herrero</h3>
					<span>Abogado y consultor semi-senior</span>
					<p>Abogado, egresado de la UBA, especializado en derecho internacional público y de la integración de la Unión Europea. Exponente en diversos congresos y seminarios</p>
				</div>
				<div class="clear-both"></div>
			</div>
						
			
			
			<div class="wide-box box-border box-floated-right staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/mauro-gomelsky.png" alt="Facundo Gutierrez Barbato"> 
				</div>
				<div class="staff-box-content">
					<h3>Mauro Luis Gomelsky</h3>
					<span>Asistente en Archivología y Documentación</span>
					<p>Completando estudios de grado en Licenciatura en Administración de Empresas, en la Universidad de Buenos Aires. Especializado en búsquedas genealógica en Portugal y Brasil. Bilingüe portugués.</p>
				</div>
				<div class="clear-both"></div>
			</div>	
			
			
				
			
			<div class="wide-box box-border box-floated-left staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/incorp1.png" alt="Incorporación 1 "> 
				</div>
				<div class="staff-box-content">
					<h3>Incorporación 1 </h3>
					<span>Asistente en Archivología y Documentación</span>
					<p>Completando estudios de grado en Licenciatura en Administración de Empresas, en la Universidad de Buenos Aires. Especializado en búsquedas genealógica en Portugal y Brasil. Bilingüe portugués.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			<div class="wide-box box-border box-floated-right staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/incorp2.png" alt="Incorporación 1 "> 
				</div>
				<div class="staff-box-content">
					<h3>Incorporación 1 </h3>
					<span>Asistente en Archivología y Documentación</span>
					<p>Completando estudios de grado en Licenciatura en Administración de Empresas, en la Universidad de Buenos Aires. Especializado en búsquedas genealógica en Portugal y Brasil. Bilingüe portugués.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			*/?>
			<div class="wide-box box-border box-floated-right staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/traductores.png" alt="TRADUCTORES PÚBLICOS NACIONALES"> 
				</div>
				<div class="staff-box-content">
					<h3>TRADUCTORES PÚBLICOS NACIONALES</h3>
					<p>Todos nuestros traductores públicos tienen competencia en todo el territorio nacional, y se encuentran matriculados en el Colegio Público de Traductores y en los Consulados correspondientes a cada Nacionalidad.</p>
				</div>
				<div class="clear-both"></div>
			</div>
			<div class="wide-box box-border box-floated-left staff-width" >
				<div class="wide-box-img">
					<img src="<?php bloginfo('template_directory'); ?>/images/staff/rrhh.png" alt="RRHH  FINANZAS"> 
				</div>
				<div class="staff-box-content">
					<h3>RRHH &amp; FINANZAS</h3>
					<p><strong>Lic. Luis Avalos</strong> <br>
						Psicólogo Laboral - Recursos Humanos<br>
						<strong>Daniel Lescano</strong><br>
						Consultor en Economía y Finanzas<br>
						<strong>Ignacio y Mariano Cárpena</strong><br>
						Contadores
					</p>
				</div>
				<div class="clear-both"></div>
			</div>
			<div class="clear-both"></div>
			
		</div>

<?php get_footer(); ?>