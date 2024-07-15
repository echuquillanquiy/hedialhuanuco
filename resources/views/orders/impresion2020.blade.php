<div>
    <table style="margin-top: -35px; width: 100%">

        <tr>
            <td colspan="10" style="font-size: 0.9rem; text-align: center">
                <img src="{{ asset('img/brand/logo_superior.jpg') }}" width="400px">
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
              <td style="font-size: 0.8rem; text-align: left" width="70px"> <strong>{{ $order->date_order }}</strong></td>

            <td>

            </td>
          </tr>
        </table>

        <table style="margin-top:0px;">
            <tr>

                <td colspan="5" style="font-size: 0.8rem"><strong>N° AUTOGENERADO</strong></td>
                <td width="170px" style="font-size: 0.8rem; text-transform:uppercase;">{{ $order->patient->code }}</td>

                <td style="width: 6%; font-size: 0.8rem"><strong>N° de HD: </strong></td>
                <td style="text-align: center; font-size: 0.8rem;" width="50px">{{ $order->patient->hosp_origin }}</td>

                <td style="font-size:0.8rem;"><strong>Frecuencia HD (veces/sem):</strong></td>
                <td style="width: 30px; text-align: center; font-size:0.8rem;">{{ $order->nurse->frequency }} </td>

                <td style="width: 1%; font-size:0.8rem;"><strong>Turno: </strong></td>
                <td style="text-align: center; font-size:0.8rem;">{{ $order->shift->name}}</td>

            </tr>
        </table>

        <table width="100%" style="border:2px solid; border-collapse: collapse;">
          <tr>
            <td style="font-size: 0.8rem; text-align: left;" colspan="2"><strong>I. EVALUACIÓN MÉDICA </strong></td>
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
            <td style="font-size: 0.8rem; margin-bottom: 5px; font-weight: bold" colspan="12">PRESCRIPCIÓN</td>
          </tr>
          <tr>
            <td style="font-size: 0.7rem;" colspan="3">Hrs. HD: {{ $order->medical->hour_hd }}</td>
            <td style="font-size: 0.7rem;" colspan="3">Qb: {{ $order->medical->qb }} ml/min</td>
            <td style="font-size: 0.7rem;" colspan="3">CND: {{ $order->medical->cnd }}</td>
              <td style="font-size: 0.7rem;" colspan="3">Area de dializador: {{ $order->medical->area_filter }} m2</td>
          </tr>
          <tr>
              <td style="font-size: 0.7rem;" colspan="3">Heparina (Ul): {{ $order->medical->heparin }}</td>
            <td style="font-size: 0.7rem;" colspan="3">Qd: {{ $order->medical->qd }} ml/min</td>
            <td style="font-size: 0.7rem;" colspan="3">Na+ Inicial: {{ $order->medical->start_na }}</td>
              <td style="font-size: 0.7rem;" colspan="3"> Membrana de dializador: {{ $order->medical->membrane }}</td>

          </tr>

            <tr>
                <td style="font-size: 0.7rem;" colspan="3">Peso Seco: {{ $order->medical->dry_weight }}</td>
                <td style="font-size: 0.7rem;" colspan="3">Buffer: {{ $order->medical->bicarbonat }}</td>
                <td style="font-size: 0.7rem;" colspan="3">Na Final: {{ $order->medical->end_na }}</td>
                <td style="font-size: 0.7rem;" colspan="3">Condición serológica: Negativo</td>

            </tr>

            <tr>
                <td style="font-size: 0.7rem;" colspan="3">Peso Inicial (Kg): {{ $order->nurse->start_weight }}</td>
                <td style="font-size: 0.7rem;"  colspan="3"> Perfil de Uf: 0 </td>
                <td style="font-size: 0.7rem;" colspan="3">Perfil de Na: {{ $order->medical->profile_na }}</td>
                <td colspan="3"></td>
            </tr>

          <tr>
              <td style="font-size: 0.6rem;" colspan="3">UF (ml): {{ $order->medical->uf }}</td>
              <td colspan="9"></td>
          </tr>

            <tr>
                <td style="font-size: 0.7rem;" colspan="3">Peso Final (Kg): {{ $order->nurse->end_weight }}</td>
                <td colspan="9"></td>
            </tr>

            <tr>
                <td style="font-size: 0.7rem;" colspan="5">Condición clinica del paciente al finalizar HD: {{ $order->medical->end_evaluation }}</td>
                <td colspan="7"></td>
            </tr>

            <tr>
                @if($order->medical->user_id)
                    <td colspan="6" style="text-align: center">
                        <img src="{{ asset($order->medical->user->image) }}" width="140" height="65" alt="">
                    </td>
                @else
                    <p>AQUI VA SELLO DEL MEDICO</p>
                @endif



                    @if($order->medical->user_id)
                        <td colspan="6" style="text-align: center">
                            <img src="{{ asset($order->medical->user->image) }}" width="140" height="65" alt="">
                        </td>
                    @else
                        <p>AQUI VA SELLO DEL MEDICO</p>
                    @endif
            </tr>

          <tr>
            <td colspan="6" style="font-size: 0.6rem; text-align: center;">

              Médico que Inicia HD
            </td>
            <td colspan="6" style="font-size: 0.6rem; text-align: center">

              Médico que Finaliza HD
            </td>
          </tr>

        </table>

        <table width="100%" style="border: 2px solid ;border-collapse: collapse">
          <tr>
            <td style="font-size: 0.8rem; text-align: left;" colspan="12"><strong>II. PARTE DE ENFERMERIA</strong></td>
          </tr>
        </table>
        <table style="border: 1px solid; border-collapse: collapse" width="100%">
              <tr>
                  <td style="font-size: 0.7rem; text-align: left" colspan="3">PA Inicial: {{ $order->nurse->start_pa }}</td>
                  <td style="font-size: 0.7rem; text-align: left" colspan="3">N° de puesto de HD: {{ $order->nurse->position }}</td>
                  <td style="font-size: 0.7rem; text-align: left" colspan="3">Area/Membrana de filtro: {{ $order->medical->area_filter }} - {{ $order->medical->membrane }}</td>
                  <td style="font-size:0.7rem; text-align: left" colspan="3">P.A. Final: {{ $order->nurse->end_pa }}</td>
              </tr>

            <tr>
                <td style="font-size: 0.7rem; text-align: left" colspan="3">Peso Inicial: {{ $order->medical->start_weight }}</td>
                <td style="font-size: 0.7rem; text-align: left" colspan="3">N° de máquina de HD: {{ $order->nurse->machine }}</td>
                <td style="font-size: 0.7rem; text-align: left" colspan="3">Marca/Modelo de maquina: {{ $order->nurse->brand_model }}</td>
                <td style="font-size: 0.7rem;" colspan="3">UF (ml): {{ $order->medical->uf }}</td>
            </tr>

            <tr>
                <td style="font-size: 0.7rem; text-align: left" colspan="3"> Acc. Arterial: {{ $order->nurse->access_arterial }}</td>
                <td style="font-size: 0.7rem; text-align: left" colspan="3">Acc. Venoso: {{ $order->nurse->access_venoso }}</td>
                <td style="font-size:0.7rem; text-align: left" colspan="3">Peso Final: {{ $order->nurse->end_weight }} Kg</td>
                <td colspan="3"></td>
            </tr>
        </table>

    <table style="border: 1px solid; border-collapse: collapse" width="100%">

        <tr>
            <td style="font-size: 0.8rem; margin-bottom: 5px; font-weight: bold" colspan="12">VALORACION DE ENFERMERIA</td>
        </tr>

        <tr>
            <td style="font-size: 0.7rem; text-align: left"> {{ $order->nurse->s }}</td>
        </tr>
    </table>


        <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:0px" border="1px;">

          <tr>
            <td style="font-size: 0.8rem; text-align: left;" colspan="12"><strong>EVOLUCIÓN TRATAMIENTO</strong></td>
          </tr>

          <tr style="font-size:0.7rem;">
            <th colspan="1">HORA</th>
            <th>P.A.</th>
            <th>Pulso</th>
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

            <tr style="border: none">
                <td colspan="12"></td>
            </tr>

          <tr>
            <td colspan="12" style="font-size:0.7rem; text-align: left"><strong>E. OBSERVACION FINAL:</strong> {{ $order->nurse->end_observation }}</td>
          </tr>

          <tr>
            <td colspan="12" style="font-size:0.7rem; text-align: left"><strong>Aspecto de filtro:</strong> {{ $order->nurse->aspect_dializer == 0 ? 'Blanco' : ''}}</td>
          </tr>
        </table>

        <p style="font-size:0.5rem; margin-top:0px;margin-bottom: 10px">PA:Presión Arterial FC: Frec. Cardiaca P:Pulso UF: Ultrafiltrado QB: Flujo dializado Na: Sodio FAV: Fístula arteriovenosa CVC: Catéter venoso central CND:
            Conductividad RA: Resistenia arterial RV: Resistencia venosa PTM: Presión transmembrana Vp: Vena periférica Bic: Bicarbonato (-):Negativo (+):Positivo PS:
            Polisulfona PES: Polietersulfona
        </p>
        <br>

        <table width="100%" style="text-align:center; margin-top:0px">
      <tr>
        <td style="font-size: 0.4rem">ENFERMERA(O) QUE INICIA LA DIALISIS</td>

        <td style="font-size: 0.4rem">ENFERMERA(O) QUE FINALIZA LA DIALISIS</td>

      </tr>

            <tr>
                @if($order->nurse->user_id)
                    <td>
                        <img src="{{ asset($order->nurse->user->image) }}" width="145" height="65" alt="">
                    </td>
                @else
                    <td>aqui va firma del licenciado</td>
                @endif


                    @if($order->nurse->user_id)
                        <td>
                            <img src="{{ asset($order->nurse->user->image) }}" width="145" height="65" alt="">
                        </td>
                    @else
                        <td>aqui va firma del licenciado</td>
                    @endif
            </tr>

    </table>
</div>
