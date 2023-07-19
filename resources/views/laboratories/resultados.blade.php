<div style="font-family: Arial,sans-serif; width: 100%; padding: 5px; box-sizing: border-box; margin: 0px -25px auto; padding: 20px; border: 1mm solid black;  height: 965px">

    <div style="width: 100%; margin-top: -25px">
        <figure>
            <img src="{{ asset('img/brand/logo_hs_occupational.png') }}" style="width: 30%">
        </figure>
    </div>

    <table style="width: 100%; text-align: center; margin-top: -40px">

        <h3 style="text-decoration: underline">RESULTADOS DE LABORATORIO</h3>
    </table>

    <table style="padding: 5px; width: 100%; text-align: center">
        <tr>
            <td style="font-size: 0.7rem; font-weight: bold">PACIENTE:</td>
            <td  colspan="3" style="font-size: 0.7rem; border-bottom: 1px solid; text-align: center">{{ $laboratory->patient->name }}</td>
            <td style="font-size: 0.7rem; font-weight: bold">DNI:</td>
            <td style="font-size: 0.7rem; border-bottom: 1px solid; text-align: center">{{ $laboratory->patient->dni }}</td>
            <td style="font-size: 0.7rem; font-weight: bold">PROCEDENCIA:</td>
            <td style="font-size: 0.7rem; border-bottom: 1px solid; text-align: center">FISSAL</td>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; font-weight: bold">FECHA:</td>
            <td colspan="2" style="font-size: 0.7rem; border-bottom: 1px solid; text-align: center">{{ $laboratory->updated_at }}</td>
            <td style="font-size: 0.7rem; font-weight: bold">MEDICO:</td>
            <td colspan="3" style="font-size: 0.7rem; border-bottom: 1px solid; text-align: center">{{ $laboratory->order->user->name }}</td>
        </tr>
    </table>

    <table style="width: 100%; text-align: center; margin-top: -40px;">
        <h5 style="text-decoration: underline">AREA DE HEMATOLOGIA</h5>
    </table>

    <table style="width: 100%; text-align: center; padding: 7px; border: solid 1px #000000; border-collapse: collapse;" border="1">
        <tr style="background-color: #A8A8A8">
            <th style="font-size: 0.7rem; padding: 5px">ANALISIS</th>
            <th style="font-size: 0.7rem; padding: 5px">RESULTADOS</th>
            <th style="font-size: 0.7rem; padding: 5px">UNIDAD</th>
            <th style="font-size: 0.7rem; padding: 5px">VALORES REFERENCIALES</th>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; text-align: left; padding: 3px">HEMATOCRITO</td>
            <td style="font-size: 0.7rem;">{{ $laboratory->result2 }}</td>
            <td style="font-size: 0.6rem;">%</td>
            <td style="font-size: 0.4rem;">VARONES: 42.0 - 54.0 / MUEJRES 37.0 - 48.0</td>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; text-align: left; padding: 3px">HEMOGLOBINA</td>
            <td style="font-size: 0.7rem;">{{ $laboratory->result3 }}</td>
            <td style="font-size: 0.6rem;">g/dl</td>
            <td style="font-size: 0.4rem;">VARONES: 14.0 - 18.0 / MUEJRES 12.0 - 16.0</td>
        </tr>
    </table>

    <table style="width: 100%; text-align: center; margin-top: -45px;">
        <h5 style="text-decoration: underline">AREA DE BIOQUIMICA</h5>
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
            <td style="font-size: 0.6rem;">mg/dL</td>
            <td style="font-size: 0.4rem;">10 - 50</td>
        </tr>

        <tr>
            <th colspan="4" style="font-size: 0.7rem; text-align: left; padding: 3px">{{ $laboratory->description4 }}</th>
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
            <td style="font-size: 0.6rem;">2.5 - 5.6</td>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; text-align: left; padding: 3px">{{ $laboratory->description6 }}</td>
            <td style="font-size: 0.7rem;">{{ $laboratory->result6 }}</td>
            <td style="font-size: 0.6rem;">mg/dL</td>
            <td style="font-size: 0.5rem;">
                <strong>
                    Niños 02-12 años: 8.8 - 10.8 /
                    Niños 12-18 años: 8.4 - 10.2 /
                    Adultos 18-60 años: 8.6 - 10.0 /
                    Adultos 60-90 años: 8.8 - 10.2 /
                    Adultos >90 años: 8.2 - 9.6
                </strong>
            </td>
        </tr>
    </table>

    <table style="width: 100%; margin-top: 200px">
        <tr>
            <td style="text-align: center">
                <img src="{{ asset('img/sellos/ivan-cerron.jpg') }}" style="text-align: center">
            </td>
        </tr>
    </table>

</div>
