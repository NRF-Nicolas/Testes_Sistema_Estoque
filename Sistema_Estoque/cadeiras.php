<?php
// Matriz representando o status das cadeiras (0 = livre, 1 = ocupada)
$cadeiras = array(
    array(0, 0, 0, 0),
    array(0, 0, 1, 0),
    array(0, 1, 1, 1),
    array(0, 0, 1, 0),
    array(0, 0, 0, 0)
);

// Verifica se a requisição foi feita para selecionar uma cadeira
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe o número da fileira e coluna selecionada
    $fileira = $_POST['fileira'];
    $coluna = $_POST['coluna'];

    // Verifica se a cadeira está livre
    if ($cadeiras[$fileira][$coluna] === 0) {
        // Atualiza o status da cadeira para ocupada
        $cadeiras[$fileira][$coluna] = 1;

        // Retorna uma resposta para atualizar a página
        echo json_encode(array('status' => 'success', 'message' => 'Cadeira selecionada com sucesso!'));
        exit;
    } else {
        // Retorna uma resposta para indicar que a cadeira está ocupada
        echo json_encode(array('status' => 'error', 'message' => 'Essa cadeira já está ocupada.'));
        exit;
    }
}

// Função para gerar o HTML dos slots
function gerarHTMLCadeiras($cadeiras)
{
    $html = '<table>';
    foreach ($cadeiras as $fileira) {
        $html .= '<tr>';
        foreach ($fileira as $cadeira) {
            if ($cadeira === 0) {
                $html .= '<td class="livre">L</td>'; // Slot livre
            } else {
                $html .= '<td class="ocupada">O</td>'; // Slot ocupado
            }
        }
        $html .= '</tr>';
    }
    $html .= '</table>';
    return $html;
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        html{
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        td {
            width: 50px;
            height: 30px;
            text-align: center;
            border: 1px solid black;
        }

        .livre {
            background-color: lightgreen ;
        }

        .ocupada {
            background-color: red;
        }
        
        .container {
            container:auto;
            border: 2px, solid black;
        }
    </style>
</head>
<body>
    <div class="container">    
        <h1>Estoque</h1>
        <select name="" id="">
            <option value="">Corredor 1</option>
            <option value="">Corredor 2</option>
            <option value="">Corredor 3</option>
            <option value="">Corredor 4</option>
            <option value="">Corredor 5</option>
        </select>
      
        <br><br>
    </div>  
    <?php echo gerarHTMLCadeiras($cadeiras); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('td').click(function() {
                var fileira = $(this).parent().index();
                var coluna = $(this).index();

                $.post(window.location.href, { fileira: fileira, coluna: coluna }, function(response) {
                    var data = JSON.parse(response);

                    if (data.status === 'success') {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                });
            });
        });
    </script>
</body>
