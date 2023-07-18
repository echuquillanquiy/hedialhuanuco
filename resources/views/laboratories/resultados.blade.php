<div style="font-family: Arial,sans-serif; margin: 0px auto;width: 100%; padding: 5px;">
    <table style="width: 100%; text-align: center; margin-top: -70px">

        <h3 style="text-decoration: underline">RESULTADOS DE LABORATORIO</h3>
    </table>

    <table style="padding: 5px; width: 100%; text-align: center">
        <tr>
            <td style="font-size: 0.7rem;">PACIENTE:</td>
            <td style="font-size: 0.7rem; border-bottom: 1px solid; text-align: center">{{ $laboratory->patient->name }}</td>
            <td style="font-size: 0.7rem;">DNI:</td>
            <td style="font-size: 0.7rem; border-bottom: 1px solid; text-align: center">{{ $laboratory->patient->dni }}</td>
        </tr>

        <tr>
            <td style="font-size: 0.7rem;">PROCEDENCIA:</td>
            <td style="font-size: 0.7rem; border-bottom: 1px solid; text-align: center">FISSAL</td>
            <td style="font-size: 0.7rem;">FECHA:</td>
            <td style="font-size: 0.7rem; border-bottom: 1px solid; text-align: center">{{ $laboratory->updated_at }}</td>
        </tr>
    </table>

    <table style="width: 100%; text-align: center; margin-top: -20px;">
        <h5>AREA DE HEMATOLOGIA</h5>
    </table>

    <table style="width: 100%; text-align: center; padding: 7px; border: solid 1px #000000; border-collapse: collapse;" border="1">
        <tr style="background-color: #A8A8A8">
            <th style="font-size: 0.7rem; padding: 5px">ANALISIS</th>
            <th style="font-size: 0.7rem; padding: 5px">RESULTADOS</th>
            <th style="font-size: 0.7rem; padding: 5px">UNIDAD</th>
            <th style="font-size: 0.7rem; padding: 5px">VALORES REFERENCIALES</th>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; text-align: left; padding: 3px">{{ $laboratory->description2 }}</td>
            <td style="font-size: 0.7rem;">{{ $laboratory->result2 }}</td>
            <td style="font-size: 0.6rem;">%</td>
            <td style="font-size: 0.4rem;">VARONES: 42.0 - 54.0 / MUEJRES 37.0 - 48.0</td>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; text-align: left; padding: 3px">{{ $laboratory->description3 }}</td>
            <td style="font-size: 0.7rem;">{{ $laboratory->result3 }}</td>
            <td style="font-size: 0.6rem;">g/dl</td>
            <td style="font-size: 0.4rem;">VARONES: 14.0 - 18.0 / MUEJRES 12.0 - 16.0</td>
        </tr>
    </table>

    <table style="width: 100%; text-align: center; margin-top: -20px;">
        <h5>AREA DE BIOQUIMICA</h5>
    </table>

    <table style="width: 100%; text-align: center; padding: 7px; border: solid 1px #000000; border-collapse: collapse;" border="1">
        <tr style="background-color: #A8A8A8">
            <th style="font-size: 0.7rem; padding: 5px">ANALISIS</th>
            <th style="font-size: 0.7rem; padding: 5px">RESULTADOS</th>
            <th style="font-size: 0.7rem; padding: 5px">UNIDAD</th>
            <th style="font-size: 0.7rem; padding: 5px">VALORES REFERENCIALES</th>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; text-align: left; padding: 3px">UREA PRE</td>
            <td style="font-size: 0.7rem;">{{ $laboratory->pre }}</td>
            <td style="font-size: 0.6rem;">mg/dl</td>
            <td style="font-size: 0.4rem;">10 - 50</td>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; text-align: left; padding: 3px">UREA POST</td>
            <td style="font-size: 0.7rem;">{{ $laboratory->post }}</td>
            <td style="font-size: 0.6rem;">mg/dl</td>
            <td style="font-size: 0.4rem;">10 - 50</td>
        </tr>

        <tr>
            <tH colspan="4" style="font-size: 0.7rem; text-align: left; padding: 3px">{{ $laboratory->description4 }}</tH>
        </tr>

        <tr style="background-color: #BEBEBE">
            <td style="font-size: 0.7rem; text-align: left; padding: 3px">Cloro</td>
            <td style="font-size: 0.7rem;">{{ $laboratory->cloro }}</td>
            <td style="font-size: 0.6rem;">mmol/L</td>
            <td style="font-size: 0.6rem;">98 - 107</td>
        </tr>

        <tr style="background-color: #BEBEBE">
            <td style="font-size: 0.7rem; text-align: left; padding: 3px">Sodio</td>
            <td style="font-size: 0.7rem;">{{ $laboratory->sodio }}</td>
            <td style="font-size: 0.6rem;">mmol/L</td>
            <td style="font-size: 0.6rem;">135 - 148</td>
        </tr>

        <tr style="background-color: #BEBEBE">
            <td style="font-size: 0.7rem; text-align: left; padding: 3px">Potasio</td>
            <td style="font-size: 0.7rem;">{{ $laboratory->potasio }}</td>
            <td style="font-size: 0.6rem;">mmol/L</td>
            <td style="font-size: 0.6rem;">3.5 - 5.3</td>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; text-align: left; padding: 3px">{{ $laboratory->description5 }}</td>
            <td style="font-size: 0.7rem;">{{ $laboratory->result5 }}</td>
            <td style="font-size: 0.6rem;">mg/dl</td>
            <td style="font-size: 0.4rem;">10 - 50</td>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; text-align: left; padding: 3px">{{ $laboratory->description6 }}</td>
            <td style="font-size: 0.7rem;">{{ $laboratory->result6 }}</td>
            <td style="font-size: 0.6rem;">mg/dl</td>
            <td style="font-size: 0.4rem;">10 - 50</td>
        </tr>


    </table>

</div>
