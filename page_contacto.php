<?php 
/*
Template name: Pagina de Contacto
*/
?>
<?php
/*
 * Si el formulario es enviado
 */
function limpiar_tags($tags){  
	$tags = strip_tags($tags);  
	$tags = stripslashes($tags);  
	$tags = htmlentities($tags);
	$tags=trim($tags);
	return $tags;  
}  

if(isset($_POST['submitted'])) {
	// Si no dejo vacio el campo que habia que dejar vacio entonces hay un error
	if(limpiar_tags($_POST['checking']) !== '') {
		$hasError = true;
	} else {
		/*
		 * Revisa el nombre
		 */
		if(limpiar_tags($_POST['contactName']) == '') {
			$nameError = 'Olvidaste ingresar tu nombre.';
			$hasError = true;
		} else {
			$name = limpiar_tags($_POST['contactName']);
		}
		
		/*
		 * Revisa que sea una direccion de email valida
		 */
		if(limpiar_tags($_POST['email']) == '')  {
			$emailError = 'Olvidaste ingresar tu email.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+.[A-Z]{2,4}$", limpiar_tags($_POST['email']))) {
			$emailError = 'Ingresa un email real.';
			$hasError = true;
		} else {
			$email = limpiar_tags($_POST['email']);
		}
		
		/*
		 * Revisa que un comentario sea escrito 
		 */
		if(limpiar_tags($_POST['textoMensaje']) == '') {
			$commentError = 'No ingresaste ningun mensaje.';
			$hasError = true;
		} else {
			// elimino todo lo que sea html
			if(function_exists('stripslashes')) {
				$comments = stripslashes(limpiar_tags($_POST['textoMensaje']));
			} else {
				$comments = limpiar_tags($_POST['textoMensaje']);
			}
		}
	}
	
	/*
	 * Si no hay errores envia el email
	 */
	if(!isset($hasError) && $hasError != true && mostrar_email()!='') {
		$emailTo = mostrar_email();
		$subject = 'Mensaje de '.$name;
		$body = "Nombre: $name \n\nEmail: $email \n\nComentario:\n\n $comments";
		$headers = "From: $email\r\n";
		$headers .= "Reply-To: $email\r\n";
 
		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
} 
?>
<?php get_header(); ?>

	<!-- section -->
	<section role="main">

		<h1>Contacto</h1>
		
		<?php 
		/*
		 * Si el email es enviado muestra un mensaje
		 * Sino muestra el formulario
		 */
		if(isset($emailSent) && $emailSent == true) :
		?>
		<article>
			<h3>Gracias por comunicarte, <?php echo $name;?></h3>
			<p>Tu email sera atendido y respondido a la brevedad.</p>
			<p>Mientras tanto te invito a revisar los post mas comentados del blog.</p>
			<ul>
				<?php $popular_posts = $wpdb->get_results("SELECT id,post_title, post_date, comment_count FROM {$wpdb->prefix}posts ORDER BY comment_count DESC LIMIT 0,10");
				foreach($popular_posts as $post) :?>
					<li><?php echo date('F jS, Y', strtotime($post->post_date));?> : <a href="<?php echo get_permalink($post->id); ?>" title="Permalink to <?php echo $post->post_title;?>"><?php print $post->post_title;?></a> (<?php echo $post->comment_count; ?>)</li>
				<?php endforeach;?>
			</ul>
		<?php else : ?>
			<!-- Si hay un error con el envio o con el captcha -->
			<?php if(isset($hasError)) : ?>
				<div class="label alert">
				 	Hubo un error enviando el formulario.				 	
				</div>
			<?php endif; ?>
	 		<!-- Muestro el formulario -->
	 		<p>Usa este formulario para mandarme un email, tratare de responderte a la brevedad.</p>
			<form action="<?php the_permalink(); ?>" id="contactForm" method="post">

				<?php $class_input = ($nameError != '') ? 'error' : '' ?>
				<input type="text" name="contactName" class="<?php echo $class_input ?>" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" placeholder="Tu nombre">
				<?php if($nameError != '') { ?>
					<small class="error"><?php echo $nameError;?></small>
				<?php } ?>
				<br>
				
				<?php $class_input = ($emailError != '') ? 'error' : '' ?>
				<input type="text" name="email" class="<?php echo $class_input ?>" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" placeholder="Tu email">
				<?php if($emailError != '') { ?>
					<small class="error"><?php echo $emailError;?></small>
				<?php } ?>
				<br>

				<label>Tu mensaje aqui</label>
				<?php $class_input = ($commentError != '') ? 'error' : '' ?>
				<textarea name="textoMensaje" class="<?php echo $class_input ?>" rows="25" cols="40" class="<?php echo $class_input ?>"><?php
					if(isset($_POST['textoMensaje'])) { 
						if(function_exists('stripslashes')) { 
							echo trim(stripslashes($_POST['textoMensaje'])); 
						} else { 
							echo trim($_POST['textoMensaje']); 
						}
					} 
				?></textarea>
				<?php if($commentError != '') { ?>
					<small class="error"><?php echo $commentError;?>
					</small> 
				<?php } ?>
				<br>

				<label for="checking">Deja este campo vacio para demostrar que eres humano</label>
				<input type="text" name="checking" id="checking" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>">
				<?php /* Campo escondido */ ?>
				<input type="hidden" name="submitted" id="submitted" value="true" />
				<br><br>
				<input type="submit" value="Enviar" class="button small right">
			</form>
		<?php endif; ?>
		</article>
	</section>
	<!-- /section -->

	<?php get_sidebar();?>
		
<?php get_footer(); ?>