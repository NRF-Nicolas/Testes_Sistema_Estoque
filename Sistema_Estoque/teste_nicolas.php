<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <style>
        body {
            padding-top: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url("black_background.jpg") fixed center;
        }

        .cinema-container {
            text-align: center;
            border: 5px outset black;
            border-radius: 20px;
            box-shadow: 10px 10px 30px 20px black;
            background-color: white;
            width: 450px;
            height: 500px;
            padding-top: 40px;
            position: fixed center;
        }

        table {
            border-style: solid;
            border-color: black;
            border-width: 1px;
            border-radius: 5px;
            margin: 0 auto;
            background-color: black;
            width: 330px;
            height: 200px;
            position: fixed center;
        }

        td {
            width: 50px;
            height: 30px;
            text-align: center;
            border-style: solid;
            border-color: black;
            border-width: 1px;
            border-radius: 10px;
            
        }

        .cadeira {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .livre {
            background-color: forestgreen;
        }

        .ocupada {
            background-color: firebrick;
        }

        .custom-select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        height: 50px;
        padding: 10px 38px 10px 16px;
        background: #fff url("select-arrows.svg") no-repeat right 16px center;
        background-size: 10px;
        transition: border-color .1s ease-in-out,box-shadow .1s ease-in-out;
        border: 1px solid #ddd;
        border-radius: 10px;
        align-items: center;
        }

        .custom-select:hover {
            border: 1px solid #999;
        }

        .custom-select:focus {
            border: 1px solid #999;
            box-shadow: 0 3px 5px 0 rgba(0,0,0,.2);
            outline: none;
        }

        select::-ms-expand {
            display:none;
        }

    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link rel="icon" href="printer.png" type="image/png">
    </head>

<body>
    <div class="cinema-container">
        <h1>Estoque</h1>
        <select id="tabela-select" onchange="mostrarTabelaSelecionada()"class="custom-select">
            <option value="1"disabled selected>Selecione um corredor</option>
            <option value="1">Corredor 1</option>
            <option value="2">Corredor 2</option>
            <option value="3">Corredor 3</option>
            <option value="3">Corredor 4</option>
            <option value="3">Corredor 5</option>
            <option value="3">Corredor 6</option>
            <option value="3">Corredor 7</option>
            <option value="3">Corredor 3</option>
            <option value="3">Corredor 3</option>
            <option value="3">Corredor 8</option>
            <option value="3">Corredor 9</option>
            <option value="3">Corredor 10</option>
            <option value="3">Corredor 11</option>
            <option value="3">Corredor 12</option>
            <option value="3">Corredor 13</option>
            <option value="3">Corredor 14</option>
            <option value="3">Corredor 15</option>
            <option value="3">Corredor 16</option>
            <option value="3">Corredor 17</option>
        </select>
        <br><br>

        <div id="tabela-container"></div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var tabelas = {
            1: [
                [0, 0, 0, 0],
                [0, 1, 1, 0],
                [0, 1, 1, 0],
                [0, 1, 1, 0],
                [0, 0, 0, 0]
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
                        html += '<td class="livre"><i class="fas fa-solid fa-print"></i><br></td>';
                    } else {
                        html += '<td class="ocupada"><i class="fas fa-solid fa-print"></i><br>579</td>';
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