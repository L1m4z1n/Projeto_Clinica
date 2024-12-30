<?php
include('../config/config.php'); // Inclui a configuração para o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = $_POST['query']; // Obtém o termo pesquisado
    $query = $conn->real_escape_string($query); // Previne SQL Injection

    echo "<h2 class='mt-4'>Resultados para: <span class='text-primary'>" . htmlspecialchars($query) . "</span></h2>";

    // Consulta que une informações de consultas, médicos e pacientes
    $sql = "SELECT 
                c.descricao_consulta AS consulta, 
                m.nome_medico AS medico, 
                p.nome_paciente AS paciente 
            FROM consulta AS c
            INNER JOIN medico AS m ON c.medico_id_medico = m.id_medico
            INNER JOIN paciente AS p ON c.paciente_id_paciente = p.id_paciente
            WHERE c.descricao_consulta LIKE '%$query%'
               OR m.nome_medico LIKE '%$query%'
               OR p.nome_paciente LIKE '%$query%'";
    
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        echo "<table class='table table-striped mt-4'>
                <thead class='table-dark'>
                    <tr>
                        <th scope='col'>Consulta</th>
                        <th scope='col'>Médico</th>
                        <th scope='col'>Paciente</th>
                    </tr>
                </thead>
                <tbody>";
        
        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['consulta']}</td>
                    <td>{$row['medico']}</td>
                    <td>{$row['paciente']}</td>
                  </tr>";
        }
        
        echo "</tbody>
              </table>";
    } else {
        echo "<div class='alert alert-warning mt-4' role='alert'>
                Nenhum resultado encontrado para sua pesquisa.
              </div>";
    }
}
?>
