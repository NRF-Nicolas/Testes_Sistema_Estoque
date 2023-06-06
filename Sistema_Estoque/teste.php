<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cinema-container {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        td {
            width: 30px;
            height: 30px;
            text-align: center;
            border: 1px solid black;
        }

        .cadeira {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .livre {
            background-color: green;
        }

        .ocupada {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="cinema-container">
        <h1>Estoque</h1>
        <label for="tabela-select">Selecione uma tabela:</label>
        <select id="tabela-select" onchange="mostrarTabelaSelecionada()">
            <option value="1">Tabela 1</option>
            <option value="2">Tabela 2</option>
            <option value="3">Tabela 3</option>
        </select>
        <br><br>

        <div id="tabela-container"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var tabelas = {
            1: [
                [0, 0, 0, 0, 0],
                [0, 0, 1, 0, 0],
                [0, 1, 1, 1, 0],
                [0, 0, 1, 0, 0],
                [0, 0, 0, 0, 0]
            ],
            2: [
                [1, 1, 0, 0, 1],
                [1, 1, 0, 0, 1],
                [0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0]
            ],
            3: [
                [1, 1, 1],
                [1, 0, 1],
                [1, 1, 1]
            ]
        };

        function gerarHTMLCadeiras(cadeiras) {
            var html = '<table>';

            for (var i = 0; i < cadeiras.length; i++) {
                html += '<tr>';
                for (var j = 0; j < cadeiras[i].length; j++) {
                    if (cadeiras[i][j] === 0) {
                        html += '<td class="livre">L</td>';
                    } else {
                        html += '<td class="ocupada">O</td>';
                    }
                }
                html += '</tr>';
            }

            html += '</table>';
            return html;
        }

        function mostrarTabelaSelecionada() {
            var tabelaSelect = document.getElementById('tabela-select');
            var tabelaContainer = document.getElementById('tabela-container');
            var tabelaSelecionada = tabelas[tabelaSelect.value];

            tabelaContainer.innerHTML = gerarHTMLCadeiras(tabelaSelecionada);
        }

        $(document).ready(function() {
            mostrarTabelaSelecionada(); // Exibir a tabela inicialmente selecionada
        });
    </script>
</body>
</html>