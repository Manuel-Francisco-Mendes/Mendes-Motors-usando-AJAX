<?php
include 'Operacoes/baseDeDados.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parque Mendes Motors</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>
</head>

<body>
    <div class="container-fluid">
	<nav class="navbar navbar-default" style="background: #5560A5">
            <div class="container-fluid" style="display:flex; justify-content:center;">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                    <ul class="nav navbar-nav" style="font-size:25px; font-weight:bold; color:#FFFFFF; margin-top:5px;">
                        Mendes Motors
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container" style="display:flex; justify-content:center;">
            <li class="btn btn-success" style="width:110px;"><a href="index.php">Parque <span
                        class="sr-only">(current)</span></a></li>
            <li class="btn btn-info"><a href="Administrador.php">Administrador</a></li>
        </div>
        <p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <!-- <div class="col-sm-6">
						<h2><b>Cliente</b></h2>
					</div> -->
                    <div class="input-group">
                        <input type="text" id="search" class="form-control" placeholder="Pesquisar...">
                        <input type="hidden" value="5" name="type">
                    </div><!-- /input-group -->
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <!-- <span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span> -->
                        </th>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
				$result = mysqli_query($conn,"SELECT * FROM cars");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
                    <tr id="<?php echo $row["id"]; ?>">
                        <td>
                            <!-- <span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
								<label for="checkbox2"></label>
							</span> -->
                        </td>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["marca"]; ?></td>
                        <td><?php echo $row["modelo"]; ?></td>
                    </tr>
                    <?php
				$i++;
				}
				?>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>