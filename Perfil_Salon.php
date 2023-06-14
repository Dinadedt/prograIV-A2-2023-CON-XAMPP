<?php include("template\cabecera.php")?>

<?php
    include "loginUsuario/clases/Auth.php";

    $Auth = new Auth();

    if (isset($_GET['id'])) {
        $salon = $Auth->conseguirSalon($_GET['id']);
    }

    $departamentos = [
        'Ahuachapán', 'Cabañas', 'Chalatenango', 'Cuscatlán', 'La Libertad', 'Morazán', 'La Paz', 'Santa Ana', 'San Miguel', 'San Salvador', 'San Vicente', 'Sonsonate', 'La Unión', 'Usulután'
    ];

    $municipios = [
        [ "Ahuachapán", "Apaneca", "Atiquizaya", "Concepción de Ataco", "El Refugio", "Guaymango", "Jujutla", "San Francisco Menéndez", "San Lorenzo", "San Pedro Puxtla", "Tacuba", "Turín"],
        [ "Cinquera", "Dolores", "Guacotecti", "Ilobasco", "Jutiapa", "San Isidro", "Sensuntepeque", "Tejutepeque", "Victoria"],
        [ "Agua Caliente", "Arcatao", "Azacualpa", "Chalatenango", "Citalá", "Comalapa", "Concepción Quezaltepeque", "Dulce Nombre de María", "El Carrizal", "El Paraíso", "La Laguna", "La Palma", "La Reina", "Las Flores", "Las Vueltas", "Nombre de Jesús", "Nueva Concepción", "Nueva Trinidad", "Ojos de Agua", "Potonico", "San Antonio de la Cruz", "San Antonio Los Ranchos", "San Fernando", "San Francisco Lempa", "San Francisco Morazán", "San Ignacio", "San Isidro Labrador", "San José Cancasque", "San José Las Flores", "San Luis del Carmen", "San Miguel de Mercedes", "San Rafael", "Santa Rita", "Tejutla"],
        [ "Candelaria", "Cojutepeque", "El Carmen", "El Rosario", "Monte San Juan", "Oratorio de Concepción", "San Bartolomé Perulapía", "San Cristóbal", "San José Guayabal", "San Pedro Perulapán", "San Rafael Cedros", "San Ramón", "Santa Cruz Analquito", "Santa Cruz Michapa", "Suchitoto", "Tenancingo"],
        [ "Antiguo Cuscatlán", "Chiltiupán", "Ciudad Arce", "Colón", "Comasagua", "Huizúcar", "Jayaque", "Jicalapa", "La Libertad", "Nuevo Cuscatlán", "Quezaltepeque", "San José Villanueva", "San Matías", "San Pablo Tacachico", "Talnique", "Tamanique", "Teotepeque", "Tepecoyo", "Zaragoza"],
        [ "Arambala", "Cacaopera", "Chilanga", "Corinto", "Delicias de Concepción", "El Divisadero", "El Rosario", "Gualococti", "Guatajiagua", "Joateca", "Jocoaitique", "Jocoro", "Lolotique", "Meanguera", "Osicala", "Perquín", "San Carlos", "San Fernando", "San Francisco Gotera", "San Isidro", "San Simón", "Sensembra", "Sociedad", "Torola", "Yamabal", "Yoloaiquín"],
        [ "Cuyultitán", "El Rosario", "Jerusalén", "Mercedes La Ceiba", "Olocuilta", "Paraíso de Osorio", "San Antonio Masahuat", "San Emigdio", "San Francisco Chinameca", "San Juan Nonualco", "San Juan Talpa", "San Juan Tepezontes", "San Luis Talpa", "San Luis La Herradura", "San Miguel Tepezontes", "San Pedro Masahuat", "San Pedro Nonualco", "San Rafael Obrajuelo", "Santa María Ostuma", "Santiago Nonualco", "Tapalhuaca", "Zacatecoluca"],
        [ "Candelaria de la Frontera", "Chalchuapa", "Coatepeque", "El Congo", "El Porvenir", "Masahuat", "Metapán", "San Antonio Pajonal", "San Sebastián Salitrillo", "Santa Ana", "Santa Rosa Guachipilín", "Santiago de la Frontera", "Texistepeque"],
        [ "Carolina", "Chapeltique", "Chinameca", "Chirilagua", "Ciudad Barrios", "Comacarán", "El Tránsito", "Lolotique", "Moncagua", "Nueva Guadalupe", "Nuevo Edén de San Juan", "Quelepa", "San Antonio", "San Gerardo", "San Jorge", "San Luis de la Reina", "San Miguel", "San Rafael Oriente", "Sesori", "Uluazapa"],
        [ "Aguilares", "Apopa", "Ayutuxtepeque", "Cuscatancingo", "Delgado", "El Paisnal", "Guazapa", "Ilopango", "Mejicanos", "Nejapa", "Panchimalco", "Rosario de Mora", "San Marcos", "San Martín", "San Salvador", "Santiago Texacuangos", "Santo Tomás", "Soyapango", "Tonacatepeque"],
        [ "Apastepeque", "Guadalupe", "San Cayetano Istepeque", "San Esteban Catarina", "San Ildefonso", "San Lorenzo", "San Sebastián", "San Vicente", "Santa Clara", "Santo Domingo", "Tecoluca", "Tepetitán", "Verapaz"],
        [ "Acajutla", "Armenia", "Caluco", "Cuisnahuat", "Izalco", "Juayúa", "Nahuizalco", "Nahulingo", "Salcoatitán", "San Antonio del Monte", "San Julián", "Santa Catarina Masahuat", "Santa Isabel Ishuatán", "Santo Domingo de Guzmán", "Sonsonate", "Sonzacate"],
        [ "Anamorós", "Bolívar", "Concepción de Oriente", "Conchagua", "El Carmen", "El Sauce", "Intipucá", "La Unión", "Lislique", "Meanguera del Golfo", "Nueva Esparta", "Pasaquina", "Polorós", "San Alejo", "San José", "Santa Rosa de Lima", "Yayantique", "Yucuaiquín"],
        [ "Alegría", "Berlín", "California", "Concepción Batres", "El Triunfo", "Ereguayquín", "Estanzuelas", "Jiquilisco", "Jucuapa", "Jucuarán", "Mercedes Umaña", "Nueva Granada", "Ozatlán", "Puerto El Triunfo", "San Agustín", "San Buenaventura", "San Dionisio", "San Francisco Javier", "Santa Elena", "Santa María", "Santiago de María", "Tecapán", "Usulután"]
    ];
?>
 
    <section class="perfil-usuario">
        <div class="contenedor-perfil">
            <div class="portada-perfil" style="background-image: url('images/R (1).jpeg');">
                <div class="sombra"></div>
                <div class="avatar-perfil">
                    <img src="img/logos/<?php echo $salon['logos'] ?>" alt="img">
                    <a href="#" class="cambiar-foto">
                        <i class="fas fa-camera"></i> 
                        <span>Cambiar foto</span>
                    </a>
                </div>
                <div class="datos-perfil">
                    <h4 class="titulo-usuario"><?php if (isset($_GET['id'])) { echo $salon['nombre']; } ?></h4>
                    <p class="bio-usuario"><?php if (isset($_GET['id'])) { echo $salon['eslogan']; } ?></p>
                    <ul class="lista-perfil">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </ul>
                </div>
                <div class="opcciones-perfil">
                    <button type="">Cambiar portada</button>
                    <button type=""><i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <div class="linki">
                            <a href="loginUsuario/servidor/login/logout.php">Cerrar sesion</a>
                        </div>
                    </button>
                </div>
            </div>
            <div class="menu-perfil">
                <ul>
                    <li><a href="#" title=""> Servicios</a></li>
                    <li><a href="#" title=""> Productos</a></li>
                    <li><a href="#" title=""> Cursos</a></li>
                    
                </ul>
            </div>
        </div>
    </section>
    <div class="contactUs">
        <div class="box">
            <div class="contacto form">
            
                <form>
                    <div class="formBox">
                        <div class="row50">
                           <div class="inputBox">
                               
                                <select name="Horario" id="horario">
                                    
                                    <option value="">Horarios de atencion</option>
                                    <option value="ahuachapan">Sabado   ----------- 8:00 a 12:00</option>
                                    <option value="cabana">Domingo      --------- cerrado </option>
                                    <option value="chalatenango">Lunes  ------------- 8:00 a 3:00</option>
                                    <option value="cuscatlan">Martes    ------------ 8:00 a 3:00</option>
                                    <option value="lalibertad">Miercoles--------- 8:00 a 3:00</option>
                                    <option value="lalibertad">Jueves   ----------- 8:00 a 3:00</option>
                                    <option value="lalibertad">Viernes  ---------- 8:00 a 3:00</option>
            
                                </select>
                           </div>
                        
                        </div>
                        <div class="row50">
                            <div class="inputBox">
                                
                                <select name="Horario" id="horario">
                                    <option value="">Servicios que ofrece</option>
                                    <option value="ahuachapan">Cuidado de uñas</option>
                                    <option value="cabana">Cuidado de piel</option>
                                    <option value="chalatenango">Depilación</option>
                                    <option value="cuscatlan">Maquillaje</option>
            
                                </select>
                            </div>
                            
                        </div>
        
                        <div class="row100">
                            <span id="Publi">PUBLICACIONES</span>
                            <div id="div_file" method="post">
                                <p id="text">Publicar</p>
                                <input type="file"  id="btn_agregar1" name="file" >
                            </div>
                            <div id="preview1" class="styleimage">
                            </div>
                        </div>
                        
                        <div style="width: 100%; display: flex; flex-direction: column; gap: 10px;">
                            <?php 
                                if (isset($_GET['id'])) {
                                    $publicaciones = $salon['imagenes'];
                                    if (strpos($publicaciones, ',') !== false) {
                                        $imagenes = explode(',', $publicaciones);

                                        foreach ($imagenes as $imagen) {
                                            echo  "<img src='img/imagenes/" . $imagen . "' style='width: 100%'> <br>";
                                        }

                                    } else {
                                        echo "<img src='img/imagenes/" . $publicaciones . "' style='width: 100%'> <br>";
                                    }
                                }    
                            ?>
                        </div>
                    </div>
                </form>
           </div>
           <div class="contacto info">
                <h3>Desripcion</h3>
                <p>
                    <?php if (isset($_GET['id'])) { echo $salon['descripcion']; } ?>
                </p>
                <h3>Informacion de contacto</h3>
                <div class="infoBox">
                    <div>
                    <span><i class="fa-solid fa-location-dot"></i></span>
                    <p>  <?php if (isset($_GET['id'])) { echo $departamentos[$salon['departamento']]; } ?> - <?php if (isset($_GET['id'])) { echo $municipios[$salon['departamento']][$salon['municipio']]; } ?> </p>
                    </div>
                    <div>
                    <span>
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <a href="#"><?php if (isset($_GET['id'])) { echo $salon['correo']; } ?></a>
                    
                    </div>
                    <div>
                    <span>
                        <i class="fa-brands fa-whatsapp"></i>
                    </span>
                    <a href="#"><?php if (isset($_GET['id'])) { echo $salon['telefono']; } ?></a>
                    </div>
                    
                </div>
           </div>
          <div class="map">
            <?php 
            if (isset($_GET['id'])) {
                echo $salon['direccion'];
            }    
            ?>
          </div>
          
        </div>
    
      
    </div>
<?php include("template\pie.php")?>
