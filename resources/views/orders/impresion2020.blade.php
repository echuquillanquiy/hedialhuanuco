<div style="font-family: 'Arial Narrow',sans-serif ">
    <table style="margin-top: -35px; width: 100%">

        <tr>
            <td colspan="10" style="font-size: 0.9rem; text-align: center">
                <img src="{{ asset('img/brand/logo_superior.jpg') }}" width="400px">
                <hr>
                <h4 style="margin-top: 0px">FORMATO DE PROCEDIMIENTO DE HEMODIÁLISIS (HD)</h4>
            </td>
        </tr>

    </table>

        <table style="margin-top:-10px;">
          <tr>

            <th style="font-size: 0.8rem; text-align: right;"><strong>PACIENTE: </strong></th>
            <td style="font-size: 0.8rem; text-transform:uppercase; width: 340px"><strong>{{ $order->patient->name }}</strong></td>

              <td style="font-size: 0.8rem; text-align: right;"><strong>H.CL N°: </strong></td>
              <td style="font-size: 0.8rem; text-transform:uppercase; width: 80px"><strong>{{ $order->nurse->hcl }}</strong></td>

              <td style="font-size: 0.8rem; text-align: center">Fecha: </td>
              <td style="font-size: 0.8rem; text-align: left" width="70px"> <strong>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $order->date_order)->format('d-m-Y') }}</strong></td>

            <td>

            </td>
          </tr>
        </table>

        <table style="margin-top:0px;">
            <tr>
                <td colspan="5" style="font-size: 0.8rem;"><strong>N° AUTOGENERADO</strong> {{ $order->patient->code }}</td>

                <td colspan="2" style="font-size: 0.8rem; margin-left: 15px !important; text-align: right"><strong>N° de HD: </strong> {{ $order->patient->hosp_origin }}</td>

                <td colspan="3" style="font-size:0.8rem; margin-left: 30px !important;"><strong>Frecuencia HD (veces/sem):</strong> {{ $order->nurse->frequency }}</td>

                <td colspan="2" style="font-size:0.8rem; margin-left: 35px !important;"><strong>Turno: </strong> {{ $order->shift->name}}</td>


            </tr>
        </table>

        <table width="100%" style="border:2px solid; border-collapse: collapse;">
          <tr>
            <td style="font-size: 0.8rem; text-align: left;" colspan="2"><strong>I. PARTE MÉDICO: EVALUACIÓN MÉDICA INICIAL</strong></td>
            <td style="text-align: center;font-size: 0.7rem;"> Atención en condiciones COVID 19: <strong>{{ $order->covid }}</strong> </td>
          </tr>


            <table width="100%" style="border:2px solid; border-collapse: collapse; border-top: none; margin-top: -2px">
                <tr>
                    <td style="font-size: 0.8rem; text-align: left;" colspan="12"><strong>EVOLUCIÓN: Signos y síntomas </strong></td>
                </tr>
                <tr>
                    <td style="font-size: 0.6rem; text-transform:uppercase;" colspan="12"> {{ $order->medical->signal }}</td>
                </tr>
                <tr>
                    <td style="font-size: 0.7rem; text-align: right" colspan="7"><strong> PA:</strong> {{ $order->medical->start_pa }} mmHg</td>
                    <td style="font-size: 0.7rem;text-align: center" colspan="5"><strong>FC:</strong> {{ $order->medical->fc }} x'</td>
                </tr>



            </table>

            <table width="100%" style="border:2px solid; border-collapse: collapse; margin-top: -3px;">

                <tr>
                    <td style="font-size: 0.7rem; width: 95%; text-transform:uppercase;" colspan="12"> <strong>PROBLEMAS CLINICOS:</strong> {{ $order->medical->clinical_trouble }} </td>
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

        <table width="100%" style="border:2px solid; border-collapse: collapse; border-top: none;">
          <tr>
            <td style="font-size: 0.7rem; margin-bottom: 5px; font-weight: bold" colspan="12">PRESCRIPCIÓN DEL TRATAMIENTO DE HEMODIALISIS:</td>
          </tr>
          <tr>
            <td style="font-size: 0.7rem;" colspan="3">Hrs. HD: {{ $order->medical->hour_hd }}</td>
            <td style="font-size: 0.7rem;" colspan="3">QB (ml/min): {{ $order->medical->qb }}</td>
            <td style="font-size: 0.7rem;" colspan="3">CND: {{ $order->medical->cnd }}</td>
              <td style="font-size: 0.7rem;" colspan="3">Area de dializador: {{ $order->medical->area_filter }} m2</td>
          </tr>
          <tr>
              <td style="font-size: 0.7rem;" colspan="3">Heparina (Ul): {{ $order->medical->heparin }}</td>
            <td style="font-size: 0.7rem;" colspan="3">QD (ml/min): {{ $order->medical->qd }} ml/min</td>
            <td style="font-size: 0.7rem;" colspan="3">Na+ Inicial: {{ $order->medical->start_na }}</td>
              <td style="font-size: 0.7rem;" colspan="3"> Membrana de dializador: {{ $order->medical->membrane }}</td>

          </tr>

            <tr>
                <td style="font-size: 0.7rem;" colspan="3">Peso Seco: {{ $order->medical->dry_weight }}</td>
                <td style="font-size: 0.7rem;" colspan="3">Buffer: {{ $order->medical->bicarbonat }}</td>
                <td style="font-size: 0.7rem;" colspan="3">Na+ Final: {{ $order->medical->end_na }}</td>
                <td style="font-size: 0.7rem;" colspan="3">Condición serológica: Negativo</td>

            </tr>

            <tr>
                <td style="font-size: 0.7rem;" colspan="3">Peso Inicial (Kg): {{ $order->nurse->start_weight }}</td>
                <td style="font-size: 0.6rem;" colspan="3">UF (ml): {{ $order->medical->uf }}</td>
                <td style="font-size: 0.7rem;"  colspan="3"> Perfil de Uf: 0 </td>
                <td style="font-size: 0.7rem;" colspan="3">Perfil Na+: {{ $order->medical->profile_na }}</td>
            </tr>

            <tr>
                <td style="font-size: 0.7rem;" colspan="8"> <stron style="text-decoration: underline; font-size: 0.8rem !important;">Observaciones:</stron>  {{ $order->medical->fua_observacion }}</td>
                <td colspan="4">
                    <br>
                    <br>
                    <br>
                </td>
            </tr>


            <tr style="margin-top: 20px;">

                @if($order->medical->user_id)
                    <td colspan="8"></td>
                    <td colspan="4" style="text-align: center; font-size: 0.6rem; font-weight: bold">
                        Dr(a): {{ $order->medical->user->name }}
                        <br>
                        <strong>Médico que inicia HD</strong>
                    </td>
                @else
                    <td colspan="8"></td>
                    <td colspan="4" style="text-align: center; font-size: 0.6rem; font-weight: bold">
                        Dr(a): {{ $order->medical->user->name }}
                        <br>
                        <strong>Médico que inicia HD</strong>
                    </td>
                @endif
            </tr>
        </table>

    <table style="border: 2px solid; border-collapse: collapse; margin-top: -4px" width="100%">
        <tr>
            <td style="font-size: 0.8rem;font-weight: bold" colspan="12">EVALUACION MEDICA FINAL:</td>
        </tr>
        <tr>
            <td style="font-size: 0.7rem;" colspan="8">Condición clinica del paciente al finalizar HD: {{ $order->medical->end_evaluation }}</td>
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
                    <strong>Médico que inicia HD</strong>
                </td>
            @else
                <td colspan="8"></td>
                <td colspan="4" style="text-align: center; font-size: 0.6rem; font-weight: bold">
                    Dr(a): {{ $order->medical->user->name }}
                    <br>
                    <strong>Médico que inicia HD</strong>
                </td>
            @endif
        </tr>

    </table>

        <table width="100%" style="border: solid 2px; border-collapse: collapse; margin-top: -5px">
          <tr>
            <th style="font-size: 0.7rem; text-align: left;"><strong>II. PARTE DE ENFERMERIA</strong></th>
          </tr>

        </table>

    <table style="border: 1px solid; border-collapse: collapse; margin-top: -4px" width="100%">

        <tr>
            <td style="font-size: 0.8rem; margin-bottom: 5px; font-weight: bold" colspan="12">VALORACION DE ENFERMERIA</td>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; text-align: left" colspan="12" > {{ $order->nurse->s }}</td>
        </tr>
    </table>

        <table style="border: 1px solid; border-collapse: collapse; margin-top: -3px" width="100%">
              <tr>
                  <td style="font-size: 0.7rem; text-align: left" colspan="3">PA Inicial: {{ $order->nurse->start_pa }}</td>
                  <td style="font-size: 0.7rem; text-align: left" colspan="3">N° de puesto de HD: {{ $order->nurse->position }}</td>
                  <td style="font-size: 0.7rem; text-align: left" colspan="6">Area de dializador: {{ $order->medical->area_filter }}</td>
              </tr>

            <tr>
                <td style="font-size: 0.7rem; text-align: left" colspan="3">Peso Inicial: {{ $order->medical->start_weight }}</td>
                <td style="font-size: 0.7rem; text-align: left" colspan="3">N° de máquina de HD: {{ $order->nurse->machine }}</td>
                <td style="font-size: 0.7rem; text-align: left" colspan="6">Membrana de dializador: {{ $order->nurse->membrane }}</td>
            </tr>

            <tr>
                <td style="font-size: 0.7rem;" colspan="3">UF (ml): {{ $order->medical->uf }}</td>
                <td style="font-size: 0.7rem; text-align: left" colspan="3">Marca/Modelo de maquina: {{ $order->nurse->brand_model }}</td>
                <td colspan="6"></td>
            </tr>

            <tr>
                <td style="font-size: 0.7rem; text-align: left; font-weight: bold" colspan="3"> Acceso vascular Arterial: {{ $order->nurse->access_arterial }}</td>
                <td style="font-size: 0.7rem; text-align: left; font-weight: bold" colspan="3">Acceso vascular Venoso: {{ $order->nurse->access_venoso }}</td>
                <td colspan="6"></td>
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
            <td style="font-size: 0.7rem; text-align: center" colspan="1">{{ $order->nurse->epo2000 }}</td>

            <td style="font-size: 0.6rem; text-align: center" colspan="1">Hierro 20 mg Fe/ml INY 5ml</td>
            <td style="font-size: 0.7rem; text-align: center" colspan="1">{{ $order->nurse->iron }}</td>

            <td style="font-size: 0.6rem; text-align: center" colspan="1">Hidroxicobalamina 1 mg/ml. INY 1 ml.</td>
            <td style="font-size: 0.7rem; text-align: center" colspan="1">{{ $order->nurse->hidroxi }}</td>

            <td style="font-size: 0.6rem; text-align: center" colspan="1">Calcitriol 1mcg/ml. INY</td>
            <td style="font-size: 0.7rem; text-align: center" colspan="1">{{ $order->nurse->calcitriol }}</td>
        </tr>
    </table>


        <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:0px" border="1px;">

          <tr>
            <td style="font-size: 0.8rem; text-align: left;" colspan="12"><strong>EVOLUCIÓN DE TRATAMIENTO</strong></td>
          </tr>

          <tr style="font-size:0.7rem;">
            <th colspan="1">HORA</th>
            <th>P.A.</th>
            <th>FC</th>
            <th>QB</th>
            <th>CND</th>
            <th>RA</th>
            <th>RV</th>
            <th>PTM</th>
            <th colspan="4">SOL / HEMODERIVADOS / OBSERVACIONES</th>
          </tr>
          <tr style="font-size:0.7rem;">
            <td height="14" colspan="1">{{ $order->nurse->hr }}</td>
            <td height="14">{{ $order->nurse->pa }}</td>
            <td height="14">{{ $order->nurse->fc1 }}</td>
            <td height="14">{{ $order->nurse->qb }}</td>
            <td height="14">{{ $order->nurse->cnd }}</td>
            <td height="14">{{ $order->nurse->ra }}</td>
            <td height="14">{{ $order->nurse->rv }}</td>
            <td height="14">{{ $order->nurse->ptm }}</td>

            <td height="14" style="font-size:0.7rem !important" colspan="4">{{ $order->nurse->obs }}</td>
          </tr>

          <tr style="font-size:0.7rem;">
            <td height="14" colspan="1">{{ $order->nurse->hr2 }}</td>
            <td height="14">{{ $order->nurse->pa2 }}</td>
            <td height="14">{{ $order->nurse->fc2 }}</td>
            <td height="14">{{ $order->nurse->qb2 }}</td>
            <td height="14">{{ $order->nurse->cnd2 }}</td>
            <td height="14">{{ $order->nurse->ra2 }}</td>
            <td height="14">{{ $order->nurse->rv2 }}</td>
            <td height="14">{{ $order->nurse->ptm2 }}</td>
            <td height="14" style="font-size:0.7rem !important" colspan="4">{{ $order->nurse->obs2 }}</td>
          </tr>

          <tr style="font-size:0.7rem;">
            <td height="14" colspan="1">{{ $order->nurse->hr3 }}</td>
            <td height="14">{{ $order->nurse->pa3 }}</td>
            <td height="14">{{ $order->nurse->fc3 }}</td>
            <td height="14">{{ $order->nurse->qb3 }}</td>
            <td height="14">{{ $order->nurse->cnd3 }}</td>
            <td height="14">{{ $order->nurse->ra3 }}</td>
            <td height="14">{{ $order->nurse->rv3 }}</td>
            <td height="14">{{ $order->nurse->ptm3 }}</td>
            <td height="14" style="font-size:0.7rem !important" colspan="4" {{ $order->nurse->obs3 }}</td>
          </tr>

          <tr style="font-size:0.7rem;">
            <td height="14" colspan="1">{{ $order->nurse->hr4 }}</td>
            <td height="14">{{ $order->nurse->pa4 }}</td>
            <td height="14">{{ $order->nurse->fc4 }}</td>
            <td height="14">{{ $order->nurse->qb4 }}</td>
            <td height="14">{{ $order->nurse->cnd4 }}</td>
            <td height="14">{{ $order->nurse->ra4 }}</td>
            <td height="14">{{ $order->nurse->rv4 }}</td>
            <td height="14">{{ $order->nurse->ptm4 }}</td>
            <td height="14" style="font-size:0.7rem !important" colspan="4">{{ $order->nurse->obs4 }}</td>
          </tr>

          <tr style="font-size:0.7rem;">
            <td height="14" colspan="1">{{ $order->nurse->hr5 }}</td>
            <td height="14">{{ $order->nurse->pa5 }}</td>
            <td height="14">{{ $order->nurse->fc5 }}</td>
            <td height="14">{{ $order->nurse->qb5 }}</td>
            <td height="14">{{ $order->nurse->cnd5 }}</td>
            <td height="14">{{ $order->nurse->ra5 }}</td>
            <td height="14">{{ $order->nurse->rv5 }}</td>
            <td height="14">{{ $order->nurse->ptm5 }}</td>
            <td height="14" style="font-size:0.7rem !important" colspan="4">{{ $order->nurse->obs5 }}</td>
          </tr>
        </table>

    <table style="border: solid 1px" width="100%">
        <tr>
            <td style="font-size: 0.7rem; text-align: left;" colspan="12"><strong>P.A Final:</strong> {{ $order->nurse->end_pa }} mmHg  <strong style="margin-left: 25px">Peso Final (Kg):</strong>  {{ $order->nurse->end_weight }}</td>
        </tr>

        <tr>
            <td colspan="12" style="font-size:0.7rem; text-align: left;"><strong>E. OBSERVACION FINAL:</strong> {{ $order->nurse->end_observation }}</td>
        </tr>

        <tr>
            <td colspan="12" style="font-size:0.7rem; text-align: left"><strong>Aspecto de filtro:</strong> {{ $order->nurse->aspect_dializer == 0 ? 'Blanco' : ''}}</td>
        </tr>
    </table>

        <p style="font-size:0.5rem; margin-top:0px;margin-bottom: 10px">PA:Presión Arterial FC: Frec. Cardiaca P:Pulso UF: Ultrafiltrado QB: Flujo dializado Na: Sodio FAV: Fístula arteriovenosa CVC: Catéter venoso central CND:
            Conductividad RA: Resistenia arterial RV: Resistencia venosa PTM: Presión transmembrana <strong style="color: red; margin-right: 10px">CVCT: Catéter venoso central temporal</strong> <strong style="color: red">CVCLP: Catéter venoso central Larga permanencia</strong>
        </p>
        <br>

        <table width="100%" style="text-align:left; margin-top:-25px">
      <tr>
        <td colspan="6" style="font-size: 0.7rem">
            ENF. Inicia HD: {{ $order->nurse->user->name }}
            <br>
            CEP: {{ $order->nurse->user->code_specialty }}
        </td>
          <td colspan="6" style="font-size: 0.7rem">
              ENF. Finaliza HD: {{ $order->nurse->user->name }}
              <br>
              CEP: {{ $order->nurse->user->code_specialty }}
          </td>
      </tr>
    </table>
</div>
