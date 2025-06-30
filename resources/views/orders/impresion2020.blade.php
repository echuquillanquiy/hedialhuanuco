<style>
    @page {
        margin: 0cm;
        margin-left: 35px; /* Mueve todo hacia la derecha */
    }

    body {
        margin: 0;
        padding: 20px; /* Ajustar según sea necesario */
        font-family: Arial, sans-serif;
    }

    .contenido {
        width: 100%;
        height: 100%;
        overflow: hidden;
        page-break-inside: avoid;
        transform: scale(0.8); /* Ajustar el contenido para que quepa en una página */
        transform-origin: top left;
    }
</style>

<div style="font-family: 'Arial Narrow',sans-serif ">
    <table style="margin-top: 0px; width: 100%">
        <tr>
            <td colspan="10" style="font-size: 0.9rem; text-align: center">
                <img src="{{ asset('img/brand/logo_superior.jpg') }}" width="400px">
                <hr style="margin-top: -15px";>
            </td>
        </tr>

    </table>

    <table style="margin-top: -18px; width: 100%">
        <tr>
            <td colspan="12" style="font-size: 0.9rem; text-align: center">
                <h4 style="margin-top: 0px;">FORMATO DE PROCEDIMIENTO DE HEMODIÁLISIS (HD)</h4>
            </td>
        </tr>
    </table>

        <table style="margin-top:-22px;">
          <tr>
            <th style="font-size: 0.8rem; text-align: right;"><strong>Paciente: </strong></th>
            <td style="font-size: 0.8rem; text-transform:uppercase; width: 340px"><strong>{{$order->patient->firstname}} {{$order->patient->othername}} {{$order->patient->surname}} {{$order->patient->lastname}}</strong></td>

              <td style="font-size: 0.8rem; text-align: right;"><strong>H.CL N°: </strong></td>
              <td style="font-size: 0.8rem; text-transform:uppercase; width: 80px"><strong>{{ $order->nurse->dni }}</strong></td>

              <td style="font-size: 0.8rem; text-align: center">Fecha: </td>
              <td style="font-size: 0.8rem; text-align: left" width="70px"> <strong>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $order->date_order)->format('d-m-Y') }}</strong></td>

            <td>

            </td>
          </tr>
        </table>

        <table style="margin-top:-3px;">
            <tr>
                <td colspan="5" style="font-size: 0.8rem;"><strong>N° Autogenerado</strong> {{ $order->patient->code }}</td>

                <td colspan="2" style="font-size: 0.8rem; margin-left: 15px !important; text-align: right"><strong>N° de HD: </strong> {{ $order->nurse->nhd }}</td>

                <td colspan="3" style="font-size:0.8rem; margin-left: 30px !important;"><strong>Frecuencia HD (veces/sem):</strong> {{ $order->nurse->frequency }}</td>

                <td colspan="2" style="font-size:0.8rem; margin-left: 35px !important;"><strong>Turno: </strong> {{ $order->shift->name}}</td>


            </tr>
        </table>

        <table width="100%" style="border:1px solid; border-collapse: collapse;margin-top: 0px">
          <tr>
            <td style="font-size: 0.8rem; text-align: left;" colspan="2"><strong>I. PARTE MÉDICO: EVALUACIÓN MÉDICA INICIAL</strong></td>
              <td style="font-size: 0.8rem; text-align: center;" colspan="2">
                  <strong>
                      {{ $order->medical->start_hour }} {{ $order->medical->start_hour < '12:00' ? 'a.m' : 'p.m' }}
                  </strong>
              </td>
            <td style="text-align: center;font-size: 0.7rem;"> Atención en condiciones COVID 19: <strong>{{ $order->covid }}</strong> </td>
          </tr>


            <table width="100%" style="border:1px solid; border-collapse: collapse; border-top: none; margin-top: -2px">
                <tr>
                    <td style="font-size: 0.8rem; text-align: left;" colspan="11" width="590px"><strong>EVOLUCIÓN: Signos y síntomas  </strong></td>

                    <td style="font-size: 0.7rem; text-align: left" ><strong> PA:</strong> {{ $order->medical->start_pa }} mmHg</td>

                </tr>

                <tr>
                    <td style="font-size: 0.7rem" colspan="11">{{ $order->medical->signal }}</td>
                    <td style="font-size: 0.7rem;text-align: left" ><strong>FC:</strong> {{ $order->medical->fc }} L x min</td>
                </tr>

            </table>

            <table width="100%" style="border:1px solid; border-collapse: collapse; margin-top: -2px;">

                <tr>
                    <td style="font-size: 0.7rem; width: 95%; " colspan="12"> <strong>PROBLEMAS CLINICOS:</strong> {{ $order->medical->clinical_trouble }} </td>
                </tr>

                <tr>
                    <td style="font-size: 0.6rem; width: 10%; text-transform:uppercase;" colspan="12"> <strong></strong> </td>
                </tr>

                <tr>
                    <td style="font-size: 0.6rem; width: 10%; text-transform:uppercase;" colspan="12"> <strong></strong> </td>
                </tr>

                <tr>
                    <td colspan="12"></td>
                </tr>


            </table>

        </table>

        <table width="100%" style="border:1px solid; border-collapse: collapse; border-top: none;">
          <tr>
            <td style="font-size: 0.7rem; margin-bottom: 5px; font-weight: bold" colspan="12">PRESCRIPCIÓN DEL TRATAMIENTO DE HEMODIALISIS:</td>
          </tr>
          <tr>
            <td style="font-size: 0.7rem;" colspan="3">Hrs. HD: {{ $order->medical->hour_hd }}</td>
            <td style="font-size: 0.7rem;" colspan="2">QB (ml/min): {{ $order->medical->qb }}</td>
            <td style="font-size: 0.7rem;" colspan="2">CND: {{ $order->medical->cnd }}</td>
              <td style="font-size: 0.7rem;" colspan="5">Area de dializador: {{ $order->medical->area_filter }} m2</td>
          </tr>
          <tr>
              <td style="font-size: 0.7rem;" colspan="3">Heparina (Ul): {{ $order->medical->heparin }}</td>
            <td style="font-size: 0.7rem;" colspan="2">QD (ml/min): {{ $order->medical->qd }}</td>
            <td style="font-size: 0.7rem;" colspan="2">Na+ Inicial: {{ $order->medical->start_na }}</td>
              <td style="font-size: 0.7rem;" colspan="5"> Membrana de dializador: {{ $order->medical->membrane }}</td>

          </tr>

            <tr>
                <td style="font-size: 0.7rem;" colspan="3">Peso Seco (Kg): {{ $order->medical->dry_weight }}</td>
                <td style="font-size: 0.7rem;" colspan="2">Buffer: {{ $order->medical->bicarbonat }}</td>
                <td style="font-size: 0.7rem;" colspan="2">Na+ Final: {{ $order->medical->end_na }}</td>
                <td style="font-size: 0.7rem;" colspan="5">Condición serológica: Negativo</td>

            </tr>

            <tr>
                <td style="font-size: 0.7rem;" colspan="3">Peso Inicial (Kg): {{ $order->nurse->start_weight }}</td>
                <td style="font-size: 0.7rem;"  colspan="2"> Perfil de UF: 0 </td>
                <td style="font-size: 0.7rem;" colspan="7">Perfil Na+: {{ $order->medical->profile_na }}</td>

            </tr>

            <tr>
                <td style="font-size: 0.6rem;" colspan="12">UF (ml): {{ $order->medical->uf }}</td>

            </tr>

            <tr>
                <td style="font-size: 0.7rem;" colspan="8"> <stron style="text-decoration: underline; font-size: 0.8rem !important;">Observaciones:</stron>  {{ $order->medical->fua_observacion }}</td>
                <td colspan="4"></td>
            </tr>

            <tr>
                <td colspan="8"></td>
                <td colspan="4">
                    <br>
                    <br>
                </td>
            </tr>


            <tr style="margin-top: 60px !important;">

                @if($order->medical->user_id)
                    <td colspan="9">
                    </td>
                    <td colspan="3" style="text-align: center; font-size: 0.6rem; font-weight: bold;">
                        Dr(a): {{ $order->medical->user->name }}
                        <br>
                        <strong>Médico que inicia HD</strong>
                    </td>
                @else
                    <td colspan="8"></td>
                    <td colspan="4" style="text-align: center; font-size: 0.6rem; font-weight: bold">
                         <p>ha</p>Dr(a): {{ $order->medical->user->name }}
                        <br>
                        <strong>Médico que inicia HD</strong>
                    </td>
                @endif
            </tr>
        </table>

    <table style="border: 1px solid; border-collapse: collapse; margin-top: -2px" width="100%">
        <tr>
            <td style="font-size: 0.8rem;font-weight: bold" colspan="4">EVALUACION MEDICA FINAL: </td>
            <td style="font-size: 0.8rem;font-weight: bold; text-align: left" colspan="8">{{ $order->medical->end_hour }} {{ $order->medical->end_hour < '12:00' ? 'a.m' : 'p.m' }}</td>
        </tr>
        <tr>
            <td style="font-size: 0.7rem;" colspan="8">Condición clinica del paciente al finalizar HD: {{ $order->medical->end_evaluation }}</td>
            <td colspan="4"></td>
        </tr>

        <tr>
            <td colspan="8"></td>
            <td colspan="4">
                <br>
                <br>
            </td>
        </tr>

        <tr>
            @if($order->medical->user_id)
                <td colspan="8"></td>
                <td colspan="4" style="text-align: center; font-size: 0.6rem; font-weight: bold">
                    Dr(a): {{ $order->medical->user->name }}
                    <br>
                    <strong>Médico que finaliza HD</strong>
                </td>
            @else
                <td colspan="8"></td>
                <td colspan="4" style="text-align: center; font-size: 0.6rem; font-weight: bold">
                    Dr(a): {{ $order->medical->user->name }}
                    <br>
                    <strong>Médico que finaliza HD</strong>
                </td>
            @endif
        </tr>

    </table>

        <table width="100%" style="border: solid 1px; border-collapse: collapse; margin-top: -2px">
          <tr>
            <th style="font-size: 0.8rem; text-align: left;"><strong>II. PARTE DE ENFERMERIA</strong></th>
          </tr>

        </table>

    <table style="border: 1px solid; border-collapse: collapse; margin-top: -2px" width="100%">

        <tr>
            <td style="font-size: 0.7rem; margin-bottom: 5px; font-weight: bold" colspan="12">VALORACION DE ENFERMERIA</td>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; text-align: left" colspan="12" > {{ $order->nurse->s }}</td>
        </tr>
    </table>

        <table style="border: 1px solid; border-collapse: collapse; margin-top: -2px" width="100%">
              <tr>
                  <td style="font-size: 0.7rem; text-align: left" colspan="4">PA Inicial: {{ $order->nurse->start_pa }} mmHg</td>
                  <td style="font-size: 0.7rem; text-align: left" colspan="3">N° de puesto de HD: {{ $order->nurse->position }}</td>
                  <td style="font-size: 0.7rem; text-align: left" colspan="5">Area de dializador: {{ $order->medical->area_filter }}</td>

              </tr>

            <tr>
                <td style="font-size: 0.7rem; text-align: left" colspan="4">Peso Inicial (Kg): {{ $order->medical->start_weight }}</td>
                <td style="font-size: 0.7rem; text-align: left" colspan="3">N° de máquina de HD: {{ $order->nurse->machine }}</td>
                <td style="font-size: 0.7rem; text-align: left" colspan="5">Membrana de dializador: {{ $order->medical->membrane }}</td>
            </tr>

            <tr>
                <td style="font-size: 0.7rem;" colspan="4">UF (ml): {{ $order->medical->uf }}</td>
                <td style="font-size: 0.7rem; text-align: left" colspan="4">Marca/Modelo de maquina: {{ $order->nurse->brand_model }}</td>
                <td colspan="4"></td>
            </tr>

            <tr>
                <td style="font-size: 0.7rem; text-align: left;" colspan="4"> Acceso vascular Arterial: {{ $order->nurse->access_arterial }}</td>
                <td style="font-size: 0.7rem; text-align: left;" colspan="3">Acceso vascular Venoso: {{ $order->nurse->access_venoso }}</td>
                <td colspan="5"></td>
            </tr>
        </table>

    <table style="border: 1px solid; border-collapse: collapse; margin-top: -3px" width="100%" border="1px">

        <tr>
            <td style="font-size: 0.7rem; margin-bottom: 5px; font-weight: bold" colspan="12">ADMINISTRACIÓN DE MEDICAMENTOS</td>
        </tr>

        <tr>
            <td style="font-size: 0.6rem; text-align: center; font-weight: bold" colspan="2">PRESENTACION </td>
            <td style="font-size: 0.6rem; text-align: center; font-weight: bold" colspan="1">CANT.</td>

            <td style="font-size: 0.6rem; text-align: center; font-weight: bold" colspan="2">PRESENTACION </td>
            <td style="font-size: 0.6rem; text-align: center; font-weight: bold" colspan="1">CANT.</td>

            <td style="font-size: 0.6rem; text-align: center; font-weight: bold" colspan="1">PRESENTACION</td>
            <td style="font-size: 0.6rem; text-align: center; font-weight: bold" colspan="1">CANT.</td>

            <td style="font-size: 0.6rem; text-align: center; font-weight: bold" colspan="1">PRESENTACION</td>
            <td style="font-size: 0.6rem; text-align: center; font-weight: bold" colspan="1">CANT.</td>

            <td style="font-size: 0.6rem; text-align: center; font-weight: bold" colspan="1">PRESENTACION</td>
            <td style="font-size: 0.6rem; text-align: center; font-weight: bold" colspan="1">CANT.</td>
        </tr>

        <tr>
            <td style="font-size: 0.6rem; text-align: center" colspan="2">Epoetina alfa (EPO) 2000 Ul/ml </td>
            <td style="font-size: 0.7rem; text-align: center" colspan="1">{{ $order->nurse->epo2000 }}</td>

            <td style="font-size: 0.6rem; text-align: center" colspan="2">Epoetina alfa (EPO) 4000 Ul/ml </td>
            <td style="font-size: 0.7rem; text-align: center" colspan="1">{{ $order->nurse->epo4000 }}</td>

            <td style="font-size: 0.6rem; text-align: center" colspan="1">Hierro 20 mg Fe/ml INY 5ml</td>
            <td style="font-size: 0.7rem; text-align: center" colspan="1">{{ $order->nurse->iron }}</td>

            <td style="font-size: 0.6rem; text-align: center" colspan="1">Hidroxicobalamina 1 mg/ml. INY 1 ml.</td>
            <td style="font-size: 0.7rem; text-align: center" colspan="1">{{ $order->nurse->hidroxi }}</td>

            <td style="font-size: 0.6rem; text-align: center" colspan="1">Calcitriol 1mcg/ml. INY</td>
            <td style="font-size: 0.7rem; text-align: center" colspan="1">{{ $order->nurse->calcitriol }}</td>
        </tr>
    </table>

    <table width="100%" style="border-collapse: collapse; text-align: center; margin-top: -2px; table-layout: fixed;" border="1">
        <tr>
            <th style="font-size: 0.8rem; text-align: left; width: 500px" colspan="12"><strong>EVOLUCIÓN DE TRATAMIENTO</strong></th>
        </tr>

        <tr style="font-size: 0.7rem;">
            <th style="width: 10%;">HORA</th>
            <th style="width: 10%;">P.A.</th>
            <th style="width: 8%;">FC</th>
            <th style="width: 8%;">QB</th>
            <th style="width: 8%;">CND</th>
            <th style="width: 8%;">RA</th>
            <th style="width: 8%;">RV</th>
            <th style="width: 8%;">PTM</th>
            <th style="width: 60%;" colspan="4">SOL / HEMODERIVADOS / OBSERVACIONES</th>
        </tr>

        @for ($i = 1; $i <= 5; $i++)
            <tr style="font-size: 0.7rem;">
                <td style="height: 14px; white-space: nowrap; overflow: hidden;">{{ $order->nurse->{'hr' . $i} }}</td>
                <td style="height: 14px; white-space: nowrap; overflow: hidden;">{{ $order->nurse->{'pa' . $i} }}</td>
                <td style="height: 14px; white-space: nowrap; overflow: hidden;">{{ $order->nurse->{'fc' . $i} }}</td>
                <td style="height: 14px; white-space: nowrap; overflow: hidden;">{{ $order->nurse->{'qb' . $i} }}</td>
                <td style="height: 14px; white-space: nowrap; overflow: hidden;">{{ $order->nurse->{'cnd' . $i} }}</td>
                <td style="height: 14px; white-space: nowrap; overflow: hidden;">{{ $order->nurse->{'ra' . $i} }}</td>
                <td style="height: 14px; white-space: nowrap; overflow: hidden;">{{ $order->nurse->{'rv' . $i} }}</td>
                <td style="height: 14px; white-space: nowrap; overflow: hidden;">{{ $order->nurse->{'ptm' . $i} }}</td>
                <td style="height: 14px; font-size: 0.7rem !important; text-align: left; white-space: nowrap; overflow: hidden;" colspan="4">
                    {{ $order->nurse->{'obs' . $i} }}
                </td>
            </tr>
        @endfor
    </table>

    <table style="border: solid 1px; margin-top: -2px;" width="100%">
        <tr>
            <td style="font-size: 0.7rem; text-align: left;" colspan="12"><strong>P.A Final:</strong> {{ $order->nurse->pa5 }} mmHg  <strong style="margin-left: 25px">Peso Final (Kg):</strong>  {{ $order->nurse->end_weight }}</td>
        </tr>

        <tr>
            <td colspan="12" style="font-size:0.7rem; text-align: left;"><strong>OBSERVACION FINAL:</strong> {{ $order->nurse->end_observation }}</td>
        </tr>

        <tr>
            <td colspan="12" style="font-size:0.7rem; text-align: left"><strong>Aspecto de filtro:</strong> {{ $order->nurse->aspect_dializer == 0 ? 'Aspecto 0 - Dializador blanco, escasa fibras oscuras.' : ''}}</td>
        </tr>
    </table>

    <table width="100%" style="margin-top: -3px">
        <tr style="font-size: 0.5rem">
            <td style="width: 90px">PA:Presión Arterial</td>
            <td style="width: 90px">FC: Frec. Cardiaca</td>
            <td style="width: 40px">P: Pulso</td>
            <td style="width: 70px">UF: Ultrafiltrado</td>
            <td style="width: 60px">Na: Sodio</td>
            <td style="width: 120px">FAV: Fístula arteriovenosa</td>
            <td style="width: 120px">CVC: Catéter venoso central</td>
            <td style="width: 90px">CND: Conductividad</td>
        </tr>
    </table>

    <table width="100%" style="margin-top: -6px">
        <tr style="font-size: 0.5rem">
            <td style="width: 70px">RA: Resistencia arterial</td>
            <td style="width: 70px">RV: Resistencia venosa</td>
            <td style="width: 100px">PTM: Presión transmembrana</td>
            <td style="width: 120px">CVCT: Catéter venoso central temporal</td>
            <td style="width: 160px">CVCLP: Catéter venoso central Larga permanencia</td>
        </tr>
    </table>

    <table width="100%" style="margin-top: -6px">
        <tr style="font-size: 0.5rem;">
            <td style="width: 130px">QB: Flujo de bomba de sangre</td>
            <td style="width: 100px">QD: Flujo de dializado</td>
            <td colspan="6"></td>
        </tr>
    </table>



    <table width="100%" style="margin-top:-3px">
      <tr>
        <td colspan="4" style="font-size: 0.5rem; text-align: left">
            ENF. Inicia HD: {{ $order->nurse->user->name }}
            <br>
            CEP: {{ $order->nurse->user->code_specialty }}
        </td>

          <td colspan="4" style="font-size: 0.5rem; text-align: center; color:white">
            sjdhjksdhjksfhjkdshfjkdshfjkhdsjfhsdjkfdasd
          </td>

          <td colspan="4" style="font-size: 0.5rem; text-align: left">
              ENF. Finaliza HD: {{ $order->nurse->user->name }}
              <br>
              CEP: {{ $order->nurse->user->code_specialty }}
          </td>

      </tr>
    </table>

    <table  width="100%" style="text-align:center; margin-top:70px; font-size: 0.6rem">
        <tr>
            <td colspan="4">____________________________</td>
            <td colspan="4">_______________________________</td>
            <td colspan="4">____________________________</td>
        </tr>

        <tr>
            <td colspan="4">Firma / Sello</td>
            <td colspan="4">Firma del Paciente o Apoderado</td>
            <td colspan="4">Firma / Sello</td>
        </tr>
    </table>
</div>
