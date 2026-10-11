<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escala de Folga</title>
    <!-- Importando o jQuery via CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            color: #333;
            padding: 30px 20px;
        }

        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            text-align: center;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 1.5rem;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 8px;
            font-weight: 600;
        }

        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            font-size: 1rem;
            color: #333;
            outline: none;
            transition: border-color 0.3s;
        }

        select:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* Estilos da Tabela (mesmo padrão visual do container) */
        .table-container {
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 650px;
            display: none; /* Inicialmente oculta até receber os dados */
        }

        .table-container h2 {
            font-size: 1.2rem;
            color: #2c3e50;
            margin-bottom: 15px;
            text-align: center;
        }

        .table-responsive {
            max-height: 350px;
            overflow-y: auto;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.95rem;
        }

        th, td {
            padding: 12px 15px;
        }

        th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        tr:nth-child(even) {
            background-color: #f8fafc;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        td {
            border-bottom: 1px solid #e2e8f0;
            color: #4a5568;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge-folga {
            background-color: #d4edda;
            color: #155724;
        }

        .badge-trabalho {
            background-color: #cce5ff;
            color: #004085;
        }
    </style>
</head>
<body>

    <!-- Bloco do Formulário -->
    <div class="container">
        <h1>Escala de Folga</h1>
        
        <form id="formEscala">
            <div class="form-group">
                <label for="escalaSelect">Selecione o dia da escala:</label>
                <select id="escalaSelect" name="dia_escala" required>
                    <option value="" disabled selected>Escolha uma opção...</option>
                    <option value="1_F">1º dia de Folga</option>
                    <option value="2_F">2º dia de Folga</option>
                    <option value="1_T">1º dia de Trabalho</option>
                    <option value="2_T">2º dia de Trabalho</option>
                    <option value="3_T">3º dia de Trabalho</option>
                    <option value="4_T">4º dia de Trabalho</option>
                </select>
            </div>

            <button type="submit">Enviar</button>
        </form>
    </div>

    <!-- Bloco da Tabela (Abaixo do container do formulário) -->
    <div class="table-container" id="containerTabela">
        <h2>Resultado da Escala</h2>
        <div class="table-responsive">
            <table id="tabelaEscala">
                <thead>
                    <tr>
                        <th>Dia</th>
                        <th>Mês</th>
                        <th>Ano</th>
                        <th>F/T</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Linhas injetadas dinamicamente via JS/jQuery -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let $dadosJSON = null;

            $('#formEscala').on('submit', function(event) {
                // Impede o envio padrão da página
                event.preventDefault();

                const formData = $(this).serialize();

                // Envia via AJAX para o arquivo escala.php
                $.ajax({
                    url: 'escala.php',
                    type: 'POST', // Altere para 'GET' se o seu PHP esperar parâmetros GET
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Armazena no objeto solicitado
                        $dadosJSON = response;
                        const $tbody =$('#tabelaEscala tbody');
                        $tbody.empty();

                        // Percorre o objeto JSON recebido e popula a tabela
                        $.each($dadosJSON, function(index, item) {

                        if (item && typeof item === 'object' && 'day' in item) {
                                const tipoTexto = item.type === 'F' ? 'Folga' : 'Trabalho';
                                const badgeClass = item.type === 'F' ? 'badge-folga' : 'badge-trabalho';
                                
                                const linha = `
                                    <tr>
                                        <td>${item.day}</td>
                                        <td>${item.month}</td>
                                        <td>${item.year}</td>
                                        <td>${item.dayFT}º</td>
                                        <td><span class="badge ${badgeClass}">${tipoTexto}</span></td>
                                    </tr>
                                `;
                                $tbody.append(linha);
                            }
                        });

                        // Exibe a tabela com uma animação suave após carregar os dados
                        $('#containerTabela').fadeIn(300);
                    },
                    error: function(xhr, status, error) {
                        alert('Erro ao carregar os dados da escala.');
                        console.error("Erro AJAX:", error);
                    }
                });
            });
        });
    </script>

</body>
</html>