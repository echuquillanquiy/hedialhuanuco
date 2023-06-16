<div style="font-family: Arial,sans-serif; text-transform: uppercase; margin: 0px auto;width: 100%; border: black 2px solid; padding: 5px;">
    <table >

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
            <td style="border: #0a0c0d solid 1px; font-size: 0.9rem; font-weight: bold">8181-23-0000{{ $order->n_fua }}</td>
            <td></td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;" border="1px">
        <tr style="border: #0a0c0d solid 1px; background: #A8A8A8; font-size: 0.5rem; font-weight: bold">
            <td style="height: 15px; width: 150px">CODIGO IPRESS</td>
            <td style="width: 300px">NOMBRE DE IPRESS QUE REALIZA LA ATENCION</td>
            <td style="width: 180px;">SUBSANACION</td>
            <td style="background: white; padding: 2px"></td>
        </tr>

        <tr>
            <td rowspan="2" style="font-size: 0.7rem; font-weight: bold">8181</td>
            <td rowspan="2" style="font-size: 0.7rem; font-weight: bold">H&S OCCUPATIONAL SAC</td>
            <td colspan="2" style="font-size: 0.5rem; font-weight: bold">N° FORMATO ATENCION PARA SUBSANACION</td>
        </tr>

        <tr>

            <td colspan="2" style="padding: 8px"></td>
        </tr>

    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;" border="1px">
        <tr>
            <td colspan="3" style="height: 10px; font-size: 0.5rem; font-weight: bold; background: #A8A8A8;">FECHA DE ATENCION</td>
            <td style="height: 10px; font-size: 0.5rem; font-weight: bold; background: #A8A8A8">HORA</td>
            <td style="height: 10px; font-size: 0.5rem; font-weight: bold; background: #A8A8A8">N° HISTORIA CLINICA</td>
            <td colspan="4" style="height: 15px; font-size: 0.5rem; font-weight: bold; background: #A8A8A8">IDENTIFICACION</td>
            <td colspan="2" style="height: 15px; font-size: 0.5rem; font-weight: bold; background: #A8A8A8">REGIMEN</td>
        </tr>

        <tr>
            <td style="height: 10px; font-size: 0.6rem; background: #BEBEBE">DIA</td>
            <td style="height: 10px; font-size: 0.6rem; background: #BEBEBE">MES</td>
            <td style="height: 10px; font-size: 0.6rem; background: #BEBEBE">AÑO</td>
            <td rowspan="2" style="font-size: 0.7rem; font-weight: bold">{{ $order->created_at->format('G:i') }}</td>
            <td rowspan="2" style="font-size: 0.6rem; font-weight: bold">{{ $order->patient->dni }}</td>
            <td rowspan="2" style="font-size: 0.5rem; background: #BEBEBE">TD</td>
            <td rowspan="2" style="font-size: 0.6rem; font-weight: bold">2</td>
            <td rowspan="2" style="font-size: 0.5rem; background: #BEBEBE">N° DOCUMENTO</td>
            <td rowspan="2" style="font-size: 0.6rem; font-weight: bold">{{ $order->patient->dni }}</td>
            <td style="font-size: 0.4rem; background: #BEBEBE">SUBSIDIADO</td>
            <td style="font-size: 0.5rem; font-weight: bold;">X</td>
        </tr>

        <tr>
            <td style="height: 10px; font-size: 0.6rem;  font-weight: bold">{{ $order->created_at->format('d') }}</td>
            <td style="height: 10px; font-size: 0.6rem;  font-weight: bold">{{ $order->created_at->format('m') }}</td>
            <td style="height: 10px; font-size: 0.6rem;  font-weight: bold">{{ $order->created_at->format('Y') }}</td>
            <td style="font-size: 0.4rem; background: #BEBEBE">SEMICONTRIBUTIVO</td>
            <td style="font-size: 0.5rem; font-weight: bold;"></td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;" border="1px">
        <tr style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8;">
            <td style="height: 15px">APELLIDO PATERNO</td>
            <td style="height: 15px">APELLIDO MATERNO</td>
        </tr>

        <tr style="font-size: 0.6rem; font-weight: bold;">
            <td style="height: 15px">{{ $order->patient->surname }}</td>
            <td style="height: 15px">{{ $order->patient->lastname }}</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8;">
            <td  style="height: 15px">PRIMER NOMBRE</td>
            <td  style="height: 15px">OTROS NOMBRES</td>
        </tr>

        <tr style="font-size: 0.6rem; font-weight: bold;">
            <td style="height: 15px">{{ $order->patient->firstname }}</td>
            <td style="height: 15px">{{ $order->patient->othername }}</td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;" border="1px">
        <tr style="font-size: 0.6rem; font-weight: bold; background: #A8A8A8">
            <td colspan="4" style="height: 20px">TIPO DE PRESTACION</td>
        </tr>

        <tr>
            <td style="font-size: 0.6rem; background: #BEBEBE; text-align: left; height: 20px"> Consulta externa</td>
            <td></td>
            <td style="font-size: 0.6rem; background: #BEBEBE; text-align: left"> Atencion de procedimientos ambulatorios</td>
            <td style="font-size: 0.6rem; font-weight: bold;">X</td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;" border="1px">
        <tr style="font-size: 0.6rem; font-weight: bold; background: #A8A8A8">
            <td rowspan="2" style="width: 15px">N°</td>
            <td colspan="5" style="height: 15px">DIAGNOSTICOS</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold; background: #BEBEBE">
            <td style="width: 490px; height: 20px">DESCRIPCION</td>
            <td style="width: 90px">CIE - 10</td>
            <td colspan="3">TIPO Dx</td>
        </tr>

        <tr style="font-size: 0.6rem; font-weight: bold;">
            <td style="height: 25px">1</td>
            <td style="text-align: left">ENFERMEDAD RENAL CRONICA 5 EN HEMODIALISIS</td>
            <td style="font-size: 0.6rem">N18.0</td>
            <td></td>
            <td>D</td>
            <td></td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="height: 25px">2</td>
            <td style="text-align: left"></td>
            <td></td>
            <td>P</td>
            <td>D</td>
            <td>R</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="height: 25px">3</td>
            <td style="text-align: left"></td>
            <td></td>
            <td>P</td>
            <td>D</td>
            <td>R</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="height: 25px">4</td>
            <td style="text-align: left"></td>
            <td></td>
            <td>P</td>
            <td>D</td>
            <td>R</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="height: 25px">5</td>
            <td style="text-align: left"></td>
            <td></td>
            <td>P</td>
            <td>D</td>
            <td>R</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td style="height: 25px">6</td>
            <td style="text-align: left"></td>
            <td></td>
            <td>P</td>
            <td>D</td>
            <td>R</td>
        </tr>

    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:5px;" border="1px">
        <tr style="font-size: 0.5rem; font-weight: bold; background: #A8A8A8">
            <td style="width: 130px; height: 15px">N° DNI</td>
            <td> NOMBRE DEL RESPONSABLE DE LA ATENCION</td>
            <td style="width: 130px;">N° COLEGIATURA</td>
        </tr>

        <tr style="font-size: 0.5rem; font-weight: bold;">
            @if($order->medical->user_id)
                <td style="height: 15px">{{ $order->medical->user->dni }}</td>
                <td style="height: 15px">{{ $order->medical->user->name }}</td>
                <td style="height: 15px">{{ $order->medical->user->code_specialty }}</td>
            @else
                <td style="height: 15px">aun no se registra medidco</td>
                <td style="height: 15px">aun no se registra medidco</td>
                <td style="height: 15px">aun no se registra medidco</td>
            @endif
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

            <td rowspan="3" style="border: #000000 1px solid; width: 200px;">

            </td>
        </tr>

        <tr style="font-size: 0.4rem; text-align: left;">
            <td colspan="5" style="border: black 1px solid; height: 25px">1= MÉDICO; 2=FARMACÉUTICO; 3=ODONTOLOGO; 4=BIÓLOGO; 5=OBSTETRIZ; 6= ENFERMERA;
                7= TRABAJADORA SOCIAL; 8=PSICÓLOGO; 9=TECNÓLOGO MÉDICO;
                10=NUTRICIONISTA; 11= TÉCNICO ENFERMERÍA; 12=AUXILIAR DE ENFERMERÍA
            </td>

            <td style="border: white"></td>
        </tr>

        <tr>
            <td style="height: 150px" colspan="5"></td>
        </tr>

    </table>

    <table width="100%" style="border-collapse:collapse; margin-bottom: 50px">
        <tr style="font-weight: bold;">

            @if($order->medical->user_id)
                <td style="text-align: center;">
                    <img src="{{ asset($order->medical->user->image) }}" style="width: 180px;height: 90px">
                </td>
            @else
                <td>
                    Aqui va firma del medico
                </td>
            @endif

            <td style="text-align: center; font-size: 0.5rem; width: 250px">Firma del asegurado o apoderado</td>

            <td style="text-align: center; font-size: 0.5rem; width: 200px">Huella digital del Asegurado o Apoderado</td>
        </tr>
    </table>


    <table width="100%">
        <tr>
            <br>
            <br>
            <td style="font-size: 0.4rem; text-align:center;">FORMATO DE ATENCION</td>
        </tr>
        <tr>
            <td style="font-size: 0.4rem; text-align:left;">(CARA POSTERIOR)</td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center;margin-top: -30px" border="1px">
        <tr style="font-size: 0.5rem; font-weight: bold; background: #000000">
            <td colspan="8" style="height: 10px; color: white;">MEDICAMENTOS</td>
        </tr>
        <tr style="font-size: 0.5rem; font-weight: bold; background: #BEBEBE">
            <td>CODIGO</td>
            <td>DESCRIPCION</td>
            <td>C. PRESCRITA</td>
            <td>C. ENTREGADA</td>
            <td>CODIGO</td>
            <td>DESCRIPCION</td>
            <td>C. PRESCRITA</td>
            <td>C. ENTREGADA</td>
        </tr>


            @if($order->medical->epo > 0)
                <tr style="font-size: 0.4rem;">
                    <td>3107</td>
                    <td style="text-align: left">EPOETINA ALFA (ERITROPOYETINA) 1 ML 2000 UI/ML INY</td>
                    <td>{{ $order->medical->epo }}</td>
                    <td>{{ $order->medical->epo }}</td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                </tr>
            @endif
            @if($order->medical->epo4000 > 0)
                <tr style="font-size: 0.4rem;">
                    <td>3113</td>
                    <td style="text-align: left">EPOETINA ALFA (ERITROPOYETINA) 4000 UI/ML INY 1 ML</td>
                    <td>{{ $order->medical->epo4000 }}</td>
                    <td>{{ $order->medical->epo4000 }}</td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                </tr>
           @endif
            @if($order->medical->vitb12 > 0)
                <tr style="font-size: 0.4rem;">
                    <td>3979</td>
                    <td style="text-align: left">VITAMINA B12 HIDROXICOBALAMINA 1MG/ML INY 1ML</td>
                    <td>{{ $order->medical->vitb12 }}</td>
                    <td>{{ $order->medical->vitb12 }}</td>

                    <td style="font-size: 0.5rem; height: 10px"></td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                </tr>
            @endif
        </tr>

            @if($order->medical->iron > 0)
                <tr style="font-size: 0.4rem;">
                    <td>19238</td>
                    <td style="text-align: left">HIERRO (COMO SACARATO) 5 ML 20 MG FE/ML INY</td>
                    <td>{{ $order->medical->iron }}</td>
                    <td>{{ $order->medical->iron }}</td>

                    <td style="font-size: 0.5rem; height: 10px"></td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                    <td style="font-size: 0.5rem; height: 10px"></td>
                </tr>
             @endif
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>
         <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
            <td style="font-size: 0.5rem; height: 10px"></td>
         </tr>

    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center;margin-top: 5px" border="1px">
        <tr style="font-size: 0.5rem; font-weight: bold; background: #000000">
            <td colspan="8" style="height: 10px; color: white;">PROCEDIMIENTOS: SESIONES DE HEMODIALISIS / EXAMENES AUXILIARES / CONSULTAS</td>
        </tr>
        <tr style="font-size: 0.5rem; font-weight: bold; background: #BEBEBE">
            <td>CODIGO</td>
            <td>DESCRIPCION</td>
            <td>C. PRESCRITA</td>
            <td>C. EJECUTADA</td>
            <td>CODIGO</td>
            <td>DESCRIPCION</td>
            <td>C. PRESCRITA</td>
            <td>C. EJECUTADA</td>
        </tr>

        <tr style="font-size: 0.4rem;">

            <td>90937</td>
            <td style="text-align: left">HEMODIÁLISIS (2DA. SESIÓN)</td>
            <td>1</td>
            <td>1</td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>

        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>

        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>

        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>


        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
        <tr style="font-size: 0.5rem;">
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
            <td style="font-size: 0.5rem; height: 15px"></td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse;text-align:center;margin-top: 5px" border="1px">
        <tr style="font-size: 0.5rem; font-weight: bold; background: #000000">
            <td colspan="8" style="height: 10px; color: white;">OBSERVACIONES</td>
        </tr>
        <tr style="font-size: 0.5rem; font-weight: bold;">
            <td colspan="8" style="text-align: left"></td>
        </tr>

    </table>

    <table width="100%" style="margin-top: 10px; margin-top: 10px">
        <tr>
            @if($order->medical->user_id)
                <td rowspan="6" style="text-align: center;">
                    <img src="{{ asset($order->medical->user->image) }}" style="width: 180px;height: 90px">
                </td>
            @else
                <td>
                    Aqui va firma del medico
                </td>
            @endif
        </tr>

        <tr>
            <td style="text-align: center; font-size: 0.5rem; width: 250px">
                <p style="margin-top: 100px">Firma del asegurado o apoderado</p>
            </td>

            <td style="text-align: center; font-size: 0.5rem; width: 200px; border: #000000 1px solid;">
                <p style="margin-top: 120px">Huella digital del Asegurado o Apoderado</p>
            </td>
        </tr>
    </table>

</div>


