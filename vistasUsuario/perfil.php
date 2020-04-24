<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/aplicacion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Perfil</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div id="contenedor">
            <?php
                include __DIR__.'/../includes/estructura/cabecera.php';
            ?>

            <div id="contenido">
                <div id="interior">
					<center>		
					<div class="a-container">
					<div class="a-section ya-personalized">
						<div class="a-row a-spacing-base">
								<h1>Mi cuenta</h1><br><br>
						</div>
						<div class="ya-card-row">
							
							<div class="ya-card-cell">
								<a href="" class="ya-card__whole-card-link">
								<div data-card-identifier="SignInAndSecurity" class="a-box ya-card--rich"><div class="a-box-inner">
								<div class="a-row">
								<div class="a-column a-span3">
									<img alt="Inicio de sesión y seguridad" src="https://images-na.ssl-images-amazon.com/images/G/30/x-locale/cs/ya/images/sign-in-lock._CB485931467_.png">
								</div>
								<div class="a-column a-span9 a-span-last">
									<h2 class="a-spacing-none ya-card__heading--rich a-text-normal">
									Inicio de sesión y seguridad
									</h2>
									<div><span class="a-color-secondary">Editar inicio de sesión, nombre o contraseña</span></div></div>
								</div>
								<br>
								</div></div>
								</a>	
							</div>
						</div>

						<div class="ya-card-row">
							
								<div class="ya-card-cell">
									<a href="" class="ya-card__whole-card-link">
									<div data-card-identifier="AddressesAnd1Click" class="a-box ya-card--rich"><div class="a-box-inner">
									<div class="a-row">
										<div class="a-column a-span3">
											<img alt="Direcciones" src="https://images-na.ssl-images-amazon.com/images/G/30/x-locale/cs/ya/images/address-map-pin._CB485934191_.png">
										</div>
										<div class="a-column a-span9 a-span-last">
											<h2 class="a-spacing-none ya-card__heading--rich a-text-normal">
												Direcciones
											</h2>
											<div><span class="a-color-secondary">Editar direcciones y preferencias de envío para pedidos</span></div>
										</div>
										<br>
									</div>
									</div></div>
									</a>	
								</div>
								
							<div class="ya-card-cell">
								<a href="" class="ya-card__whole-card-link">
								<div data-card-identifier="PaymentOptions" class="a-box ya-card--rich"><div class="a-box-inner">
									<div class="a-row">
										<div class="a-column a-span3">
											<img alt="Métodos de pago" src="https://images-na.ssl-images-amazon.com/images/G/30/x-locale/cs/ya/images/Payments._CB485926314_.png">
										</div>
										<div class="a-column a-span9 a-span-last">
											<h2 class="a-spacing-none ya-card__heading--rich a-text-normal">
												Métodos de pago
											</h2>
											<div><span class="a-color-secondary">Editar o agregar métodos de pago</span></div>	
										</div>
										<br>
									</div>
								</div></div>
								</a>
							</div>	
						</div>

						<div class="ya-card-row">
							<div class="ya-card-cell">
								<a href="" class="ya-card__whole-card-link">
								<div data-card-identifier="HelpGateway" class="a-box ya-card--rich"><div class="a-box-inner">
									<div class="a-row">
										<div class="a-column a-span3">
											<img alt="Ayuda" src="https://images-na.ssl-images-amazon.com/images/G/30/x-locale/cs/ya/images/help_gateway._CB424635796_.png">
										</div>
										<div class="a-column a-span9 a-span-last">
											<h2 class="a-spacing-none ya-card__heading--rich a-text-normal">
												Ayuda
											</h2>
											<div><span class="a-color-secondary">Examinar los temas de ayuda disponibles</span></div>
											
										</div>
									</div>
								</div></div>
								</a>
							</div>
						</div>
					</div>
					</div>
					</center>
                </div>
            </div>
            <?php
                include __DIR__.'/../includes/estructura/pie.php';
            ?>
        </div>
    </body>
</html>
