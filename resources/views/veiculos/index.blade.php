<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa Fofinhos</title>

    <!-- Estilizacao dos ecras de view -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            cursor: pointer;  /* Para destacar que a linha é clicável */
        }
        th {
            background-color: #f2f2f2;
        }
        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .conteudo_pop-up {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            text-align: left;
        }
        .fechar {
            color: #aaa;
            float: right;
            font-size: 10px;
            font-weight: italic;
        }
        .fechar:hover,
        .fechar:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .botoes {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }
        .editar, .destruir, .detalhe {
            padding: 8px 12px;
            cursor: pointer;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .editar {
            background-color: #4CAF50;
        }
        .destruir {
            background-color: #f44336;
        }
        .detalhe {
            background-color: #008CBA;
        }
    </style>
</head>
<body>
    <h1>Lista de Veiculos</h1>

    <form action="{{ route('veiculos.criar') }}" method="GET">
        <button type="submit" class="botoes">Novo Veiculo</button>
    </form>

    <form action="{{ route('veiculos.seed') }}" method="GET">
        <button type="submit" class="botoes">Gerar 10 Novos Veiculos</button>
    </form>

    
    </class>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matrícula</th>
                <th>Ano</th>
                <th>Tipo de Combustível</th>
                <th>Cor</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($veiculos as $veiculo)
            <tr  onclick="mostrarPopUp({{ $veiculo->id }})">
                <td>{{ $veiculo->marca }}</td>
                <td>{{ $veiculo->modelo }}</td>
                <td>{{ $veiculo->matricula }}</td>
                <td>{{ $veiculo->ano }}</td>
                <td>{{ $veiculo->tipo_combustivel }}</td>
                <td>{{ $veiculo->cor }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

    @foreach ($veiculos as $veiculo)
    <div id="popup-{{ $veiculo->id }}" class="popup">
        <div class="conteudo_pop-up">

        <!-- Who knew ! https://www.w3schools.com/charsets/ref_html_entities_4.asp  -->
        <button class="fechar"><span onclick="fecharPopUp({{ $veiculo->id }})">Anular</span></button>

            <h2>Ações para o Veículo da matricula :  <!--  {{ $veiculo->id }}  -->{{ $veiculo->matricula }}</h2>
            <div class="botoes">


                <form action="{{ route('veiculos.editar', $veiculo->id) }}" method="GET">
                    <button type="submit" class="editar">Editar</button>
                </form>


                <form action="{{ route('veiculos.destruir', $veiculo->id) }}" method="POST">
                    @method('DELETE')
                    <button type="submit" class="destruir">Destruir</button>
                </form>

                <form action="{{ route('veiculos.mostrar', $veiculo->id) }}" method="GET">
                    <button type="submit" class="detalhe">Detalhe</button>
                </form>

            </div>

        
            </div>
    </div>
    @endforeach

    <!-- reacoes esperadas para a pop up reagir -->

    <script>
        function mostrarPopUp(id) {
            document.getElementById(`popup-${id}`).style.display = "block";
        }
        function fecharPopUp(id) {
            document.getElementById(`popup-${id}`).style.display = "none";
        }
    </script>

</body>
</html>
