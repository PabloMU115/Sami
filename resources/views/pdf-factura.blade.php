<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EXPORTAR A PDF</title>

    <style>
        #emp {

            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100;
        }

        #emp td,
        #emp th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #emp th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: #fff;

        }
    </style>

</head>

<body>

    <Table id="emp">


        <thead>
            <tr>
                <th>Nombre</th>
                <th>Numero Factura</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Total</th>

            </tr>


        </thead>

        <tbody>


            @foreach ($ListaFacturas as $factura)
                <tr>

                    <td>{{ $factura->nombre_cliente }}</td>
                    <td>{{ $factura->numero_factura }}</td>
                    <td>{{ $factura->created_at }}</td>
                    <td>Aprobado</td>
                    <td>{{ $factura->total }}</td>

                </tr>
            @endforeach


        </tbody>

    </Table>


</body>

</html>
