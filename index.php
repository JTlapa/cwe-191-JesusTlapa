<?php
session_start();
$precio = 5000;

if (!isset($_SESSION['total'])) {
    $total = 0;
    $cantidad = 0;
} else {
    $total = $_SESSION['total'];
    $cantidad = $_SESSION['cantidad'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnAgregar']) && is_numeric($_POST['cantidad'])) { // Valida que sea numero
        $total = $total + ($precio * $_POST['cantidad']);
        $cantidad = $cantidad + abs($_POST['cantidad']);
    } else if (isset($_POST['btnQuitar'])) {
        $total = 0;
        $cantidad = 0;
    }
}
$_SESSION['total'] = $total;
$_SESSION['cantidad'] = $cantidad;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Libre | Programación segura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <nav class="navbar bg-mercadolibre">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/logo.png" alt="logo" class="img-fluid logo">
            </a>
        </div>
    </nav>
    <div class="container mt-3">
        <h2>Tienda en linea <small class="text-muted fs-5">Programación segura</small></h2>
        <div class="mt-4">
            <div class="row">
                <div class="col">
                    <img src="images/cel.jpg" alt="Celular" class="img-fluid mt-4">
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            oferta
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Samsung Galaxy S24 Plus 5G Dual SIM 512 GB negro 12 GB RAM</h5>
                            <p class="fs-4"><b><?php echo number_format($precio, 2); ?></b></p>
                            <ul>
                                <li>Dispositivo desbloqueado para que elijas la compañía telefónica que prefieras.</li>
                                <li>Compatible con redes 5G.</li>
                                <li>Tiene la Cámara trasera de 50Mpx/12Mpx/10Mpx.</li>
                                <li>This may still come in handy in some situations.</li>
                            </ul>
                            <form method="post" action="index.php">
                                <div class="mb-3">
                                    <label for="cantidad" class="form-label">Cantidad:</label>
                                    <select class="form-select form-select-sm" aria-label="Small select example" name="cantidad" id="cantidad">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="btnAgregar">Agregar al total</button>
                                <button type="submit" class="btn btn-secondary" name="btnQuitar">Quitar todo</button>
                            </form>
                        </div>
                        <div class="card-footer text-body-secondary">
                            <span class="fw-bold text-end">
                                Cantidad:
                                <span class="fs-4"><?php echo number_format($cantidad); ?></span>
                            </span>
                            <span class="fw-bold text-end">
                                Total a pagar:
                                <span class="fs-4"><?php echo number_format($total, 2); ?></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>