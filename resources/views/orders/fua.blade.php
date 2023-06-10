<div style="font-family: Arial,sans-serif">
    <table style="margin-top: -40px; margin-left: -20px;width: 100%">

        <tr>
            <td colspan="10" style="text-align: left">
                <img src="{{ asset('img/brand/logo-fissal.png') }}" alt="logo superior" style="width: 520px; height: 60px">
            </td>
        </tr>

    </table>

    <div width="100%" style="text-align: center; margin-top: -10px; font-size: 0.9rem">
        <h5>FORMATO DE ATENCION</h5>
    </div>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:-15px">
        <tr>
            <td style="border: none"></td>
            <td style="width: 200px; background: #A8A8A8; font-weight: bold; font-size: 0.6rem">NUMERO DE FORMATO</td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td style="border: #0a0c0d solid 1px; font-size: 0.9rem; font-weight: bold">8181-23-0000{{ $order->id }}</td>
            <td></td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;" border="1px">
        <tr style="border: #0a0c0d solid 1px; background: #A8A8A8; font-size: 0.6rem; font-weight: bold">
            <td>CODIGO IPRESS</td>
            <td>NOMBRE DE IPRESS QUE REALIZA LA ATENCION</td>
            <td>SUBSANACION</td>
            <td style="background: white; padding: 2px"></td>
        </tr>

        <tr>
            <td rowspan="2" style="font-size: 0.7rem;">8181</td>
            <td rowspan="2" style="font-size: 0.7rem;">H&S OCCUPATIONAL SAC</td>
            <td colspan="2" style="font-size: 0.5rem;">N° FORMATO ATENCION PARA SUBSANACION</td>
        </tr>

        <tr>

            <td colspan="2" style="padding: 8px"></td>
        </tr>

    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;" border="1px">
        <tr>
            <td colspan="3" style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8;">FECHA DE ATENCION</td>
            <td style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8">HORA</td>
            <td style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8">N° HISTORIA CLINICA</td>
            <td colspan="4" style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8">IDENTIFICACION</td>
            <td colspan="2" style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8">REGIMEN</td>
        </tr>

        <tr>
            <td style="font-size: 0.6rem; background: #BEBEBE">DIA</td>
            <td style="font-size: 0.6rem; background: #BEBEBE">MES</td>
            <td style="font-size: 0.6rem; background: #BEBEBE">AÑO</td>
            <td rowspan="2" style="font-size: 0.7rem; font-weight: bold">{{ $order->created_at->format('G:i') }}</td>
            <td rowspan="2" style="font-size: 0.6rem; font-weight: bold">{{ $order->patient->dni }}</td>
            <td rowspan="2" style="font-size: 0.5rem; background: #BEBEBE">TD</td>
            <td rowspan="2" style="font-size: 0.6rem; font-weight: bold">2</td>
            <td rowspan="2" style="font-size: 0.5rem; background: #BEBEBE">N° DOCUMENTO</td>
            <td rowspan="2" style="font-size: 0.6rem; font-weight: bold">{{ $order->patient->dni }}</td>
            <td style="font-size: 0.4rem; background: #BEBEBE">SUBSIDIADO</td>
            <td style="font-size: 0.5rem; font-weight: bold;"></td>
        </tr>

        <tr>
            <td style="font-size: 0.6rem;  font-weight: bold">{{ $order->created_at->format('d') }}</td>
            <td style="font-size: 0.6rem;  font-weight: bold">{{ $order->created_at->format('m') }}</td>
            <td style="font-size: 0.6rem;  font-weight: bold">{{ $order->created_at->format('Y') }}</td>
            <td style="font-size: 0.4rem; background: #BEBEBE">SEMICONTRIBUTIVO</td>
            <td style="font-size: 0.5rem; font-weight: bold;"></td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;" border="1px">
        <tr style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8">
            <td>APELLIDO PATERNO</td>
            <td>APELLIDO MATERNO</td>
        </tr>

        <tr style="font-size: 0.6rem; font-weight: bold;">
            <td style="padding: 5px">{{ $ap_pat }}</td>
            <td style="padding: 5px">{{ $ap_mat }}</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8;">
            <td>PRIMER NOMBRE</td>
            <td>OTROS NOMBRES</td>
        </tr>

        <tr style="font-size: 0.6rem; font-weight: bold;">
            <td style="padding: 5px">{{ $primeronom }}</td>
            <td style="padding: 5px">{{ $otrosnom }}</td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;" border="1px">
        <tr style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8">
            <td colspan="4">TIPO DE PRESTACION</td>
        </tr>

        <tr>
            <td style="font-size: 0.6rem; background: #BEBEBE; text-align: left">Consulta externa</td>
            <td></td>
            <td style="font-size: 0.6rem; background: #BEBEBE; text-align: left">Atencion de procedimientos ambulatorios</td>
            <td style="font-size: 0.6rem; font-weight: bold;">X</td>
        </tr>
    </table>

</div>
