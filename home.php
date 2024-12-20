<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<div class="container mt-4">
    <!-- Header -->
    <div class="text-center mb-4">
        <h1>Bem-Vindo ao Sistema de Controle Clínico</h1>
        <p class="lead">Gerencie as informações da clínica com facilidade e eficiência</p>
    </div>

    <!-- Resumo em Cards -->
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pacientes Cadastrados</h5>
                    <p class="card-text display-6">
                        <?php
                        $sql = "SELECT COUNT(*) AS total FROM paciente";
                        $res = $conn->query($sql);
                        $row = $res->fetch_assoc();
                        echo $row['total'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Médicos Ativos</h5>
                    <p class="card-text display-6">
                        <?php
                        $sql = "SELECT COUNT(*) AS total FROM medico";
                        $res = $conn->query($sql);
                        $row = $res->fetch_assoc();
                        echo $row['total'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Consultas Hoje</h5>
                    <p class="card-text display-6">
                        <?php
                        $sql = "SELECT COUNT(*) AS total FROM consulta WHERE data_consulta = CURDATE()";
                        $res = $conn->query($sql);
                        $row = $res->fetch_assoc();
                        echo $row['total'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Agenda do Dia -->
    <div class="mt-4">
        <h2>Agenda do Dia</h2>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Horário</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Médico</th>
                    <th scope="col">Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT c.hora_consulta, p.nome_paciente, m.nome_medico, c.descricao_consulta
                        FROM consulta AS c
                        INNER JOIN paciente AS p ON c.paciente_id_paciente = p.id_paciente
                        INNER JOIN medico AS m ON c.medico_id_medico = m.id_medico
                        WHERE c.data_consulta = CURDATE()";
                $res = $conn->query($sql);
                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['hora_consulta']}</td>
                                <td>{$row['nome_paciente']}</td>
                                <td>{$row['nome_medico']}</td>
                                <td>{$row['descricao_consulta']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhuma consulta agendada para hoje</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Atalhos -->
    <div class="mt-4 text-center">
        <h2>Acesso Rápido</h2>
        <div class="d-flex justify-content-center gap-3">
            <a href="?page=cadastrar-paciente" class="btn btn-primary btn-lg">Cadastrar Paciente</a>
            <a href="?page=cadastrar-medico" class="btn btn-success btn-lg">Cadastrar Médico</a>
            <a href="?page=cadastrar-consulta" class="btn btn-warning btn-lg">Agendar Consulta</a>
        </div>
    </div>

    <!-- Alertas -->
    <div class="mt-4">
        <div class="alert alert-danger" role="alert">
            <strong>Atenção:</strong> Existem consultas pendentes de confirmação. <a href="listar-consulta.php" class="alert-link">Verificar agora</a>.
        </div>
    </div>
</div>