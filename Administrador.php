<?php
include 'Operacoes/baseDeDados.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mendes Motors</title>
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
            <li class="btn btn-success" style="width:110px;"><a href="index.php">Parque <span class="sr-only">(current)</span></a></li>
            <li class="btn btn-info"><a href="Administrador.php">Administrador</a></li>
        </div>

        <p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <!-- <div class="col-sm-6">
						<h2><b>Gerente</b></h2>
					</div> -->
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-primary" data-toggle="modal"><span>Cadastrar
                                Carro</span></a>
                        <!-- <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Remover Viatura</span></a>						 -->
                    </div>
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
                        <!-- <th>Acção</th> -->
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
                        <td>
                            <a href="#editEmployeeModal" class="btn btn-warning" style="width:70px;"
                                data-toggle="modal">
                                <span class="material-icons update" data-toggle="tooltip"
                                    data-id="<?php echo $row["id"]; ?>" data-name="<?php echo $row["marca"]; ?>"
                                    data-email="<?php echo $row["modelo"]; ?>" title="Editar">Editar</span>
                            </a>
                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-id="<?php echo $row["id"]; ?>"
                                data-toggle="modal"><span data-toggle="tooltip">Apagar</span></i></a>
                        </td>
                    </tr>
                    <?php
				$i++;
				}
				?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="user_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Cadastro de Carros</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" id="name" name="marca" class="form-control" placeholder="Marca" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="email" name="modelo" class="form-control" placeholder="Modelo"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="1" name="type">
                        <button type="button" class="btn btn-primary" id="btn-add">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="update_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Alterar dados do Carro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_u" name="id" class="form-control" required>
                        <div class="form-group">
                            <input type="text" id="name_u" name="marca" class="form-control" placeholder="Marca"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email_u" name="modelo" class="form-control" placeholder="Modelo"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="2" name="type">
                        <button type="button" class="btn btn-success" id="update">Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>

                    <div class="modal-header">
                        <h4 class="modal-title">Apagar o registo do Carro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_d" name="id" class="form-control">
                        <p>Pretende apagar o registo do carro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="delete">Apagar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>