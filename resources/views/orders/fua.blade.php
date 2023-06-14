<div style="font-family: Arial,sans-serif; text-transform: uppercase;">
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
            <td style="font-size: 0.6rem; background: #BEBEBE; text-align: left"> Consulta externa</td>
            <td></td>
            <td style="font-size: 0.6rem; background: #BEBEBE; text-align: left"> Atencion de procedimientos ambulatorios</td>
            <td style="font-size: 0.6rem; font-weight: bold;">X</td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;" border="1px">
        <tr style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8">
            <td rowspan="2" style="width: 20px">N°</td>
            <td colspan="5">DIAGNOSTICOS</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold; background: #BEBEBE">
            <td style="width: 490px">DESCRIPCION</td>
            <td style="width: 90px">CIE - 10</td>
            <td colspan="3">TIPO Dx</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="height: 20px">1</td>
            <td style="text-align: left">dfsff</td>
            <td style="">N18.0</td>
            <td></td>
            <td>D</td>
            <td></td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="height: 20px">2</td>
            <td style="text-align: left"></td>
            <td></td>
            <td>P</td>
            <td>D</td>
            <td>R</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="height: 20px">3</td>
            <td style="text-align: left"></td>
            <td></td>
            <td>P</td>
            <td>D</td>
            <td>R</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="height: 20px">4</td>
            <td style="text-align: left"></td>
            <td></td>
            <td>P</td>
            <td>D</td>
            <td>R</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="height: 20px">5</td>
            <td style="text-align: left"></td>
            <td></td>
            <td>P</td>
            <td>D</td>
            <td>R</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="height: 20px">6</td>
            <td style="text-align: left"></td>
            <td></td>
            <td>P</td>
            <td>D</td>
            <td>R</td>
        </tr>

    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;" border="1px">
        <tr style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8">
            <td style="width: 130px;">N° DNI</td>
            <td> NOMBRE DEL RESPONSABLE DE LA ATENCION</td>
            <td style="width: 130px;">N° COLEGIATURA</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="height: 20px">{{ $order->medical->user->dni }}</td>
            <td style="height: 20px">{{ $order->medical->user->name }}</td>
            <td style="height: 20px">{{ $order->medical->user->rne }}</td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;">
        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="background: #A8A8A8;border: #000000 1px solid; width: 150px; height: 20px">RESPONSABLE DE LA ATENCION</td>
            <td style="border: black 1px solid; width: 30px"> 1 </td>

            <td style="border: white;"></td>

            <td style="background: #A8A8A8;border: #000000 1px solid; width: 90px; height: 20px">ESPECIALIDAD</td>
            <td style="border: black 1px solid; width: 190px"> NEFROLOGIA </td>

            <td></td>

            <td style="border: white"></td>

            <td rowspan="5" style="border: #000000 1px solid; width: 200px;">
                <p></p>
            </td>
        </tr>

        <tr style="font-size: 0.4rem; text-align: left;">
            <td colspan="5" style="border: black 1px solid">1= MÉDICO; 2=FARMACÉUTICO; 3=ODONTOLOGO; 4=BIÓLOGO; 5=OBSTETRIZ; 6= ENFERMERA;
                7= TRABAJADORA SOCIAL; 8=PSICÓLOGO; 9=TECNÓLOGO MÉDICO;
                10=NUTRICIONISTA; 11= TÉCNICO ENFERMERÍA; 12=AUXILIAR DE ENFERMERÍA
            </td>

            <td style="border: white"></td>
        </tr>

        <tr>
            <td style="height: 50px" colspan="5"></td>
        </tr>


        <tr>
            <td style="height: 100px"></td>
        </tr>


        <tr style="font-size: 0.4rem; font-weight: bold;">


            @if($order->medical->user_id)
                <td colspan="3" style="text-align: center">
                    <img src="{{ asset($order->medical->user->image) }}" style="width: 30%">
                </td>
            @else
                <p>AQUI VA SELLO DEL MEDICO</p>
                @endif

            <td colspan="2">Firma del asegurado o apoderado</td>
        </tr>


    </table>

</div>
