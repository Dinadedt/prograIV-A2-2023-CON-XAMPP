<?php include("template\cabecera.php")?>

<?php
    include "loginUsuario/clases/Auth.php";

    $Auth = new Auth();

    $salones = $Auth->conseguirSalones();

    ## print_r($salones);

    if(isset($_SESSION['email'])) {
        $userEmail = $_SESSION['email'];
    } else {
        $userEmail = null;
    }

?>

<form class="d-flex" role="search" id="searchForm">
    
    <input class="form-control me-2" type="search" placeholder="Buscar salon" aria-label="Search" id="searchInput">
    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i> buscar</button>
    <br>
</form>
<br>
<br>

<?php if (!count($salones) == 0) { foreach ($salones as $salon): ?>
    <div class="col-md-3" data-search="<?php echo $salon['nombre'] ?>">
        <br>
        <div class="card">
            <img class="card-img-top" src="img/logos/<?php echo $salon['logos'] ?>"> 
            <div class="card-body">
                <h5 class="card-title"><?php echo $salon['nombre'] ?></h5>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <br>
                <h2></h2>
                <i class="fa fa-location-dot">
                    <a href="https://goo.gl/maps/LwyW15PZiy7CfYYs7">
                    <h7> 10 Avenida Norte, Usulutan</h7>
                    </a>
                </i>
                <br>
                <h2></h2>
                <a name="" id="<?php echo $salon['id'] ?>" class="btn btn-primary" href="Perfil_Salon.php?id=<?php echo $salon['id'] ?>" role="button">Visitar</a>
            </div>
        </div>
    </div>
<?php endforeach; } ?>

<h2></h2>
<h2></h2>

<script>
  document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío del formulario

    // Obtener el valor de búsqueda
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();

    // Realizar la lógica de búsqueda y mostrar/ocultar los resultados según corresponda
    const salonCards = document.querySelectorAll('[data-search]');

    salonCards.forEach(function(card) {
      const cardName = card.getAttribute('data-search').toLowerCase();
      if (cardName.includes(searchTerm)) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  });
</script>
<?php include("template\pie.php")?>

        