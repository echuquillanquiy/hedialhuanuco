<div style="font-family: 'Nunito', sans-serif;">
    <table style="width: 100%; border: #0a0c0d 2px solid; padding: 10px">
        <tr>
            <td>
                <img src="{{ asset('img/brand/logo_hs_occupational.png') }}" alt="" width="20%">
            </td>

            <td>
                <h2 style="text-align: left; width: 120%">RECETA MEDICA POR SESION</h2>
            </td>

            <td style="text-align: right">
                <img src="{{ asset('img/brand/logo_hs_occupational.png') }}" alt="" width="20%">
            </td>
        </tr>
    </table>

    <br>

    <table style="width: 100%;font-size: 0.8rem; border: #0a0c0d 2px solid;">
        <tr>

            <td>NOMBRES Y APELLIDOS: {{ $recipe->patient->name }}</td>
            <td>DNI: {{ $recipe->patient->dni }}</td>
            <td>H.CL: {{ $recipe->patient->dni }}</td>
            <td>FECHA: {{ $recipe->date_order }}</td>

        </tr>
    </table>
    <br>
    <table width="100%" style="border-collapse:collapse;text-align:center; margin-top:-10px; font-size: 0.8rem" border="1px;">

        <tr style="border: #0a0c0d 2px solid; brecipe-collapse: collapse">
            <th>CODIGO</th>
            <th>MEDICAMENTO</th>
            <th>PRESCRIPCION</th>
            <th>C. PRESCRITA</th>
            <th>C. PRESCRITA</th>
        </tr>

        @if($recipe->med1)
            <tr>
                <td>{{ $recipe->code1 }}</td>
                <td>{{ $recipe->med1 }}</td>
                <td>{{ $recipe->prescripcion1 }}</td>
                <td>{{ $recipe->prescrita1 }}</td>
                <td>{{ $recipe->entregada1 }}</td>
            </tr>
        @endif
        @if($recipe->med2)
        <tr>
            <td>{{ $recipe->code2 }}</td>
            <td>{{ $recipe->med2 }}</td>
            <td>{{ $recipe->prescripcion2 }}</td>
            <td>{{ $recipe->prescrita2 }}</td>
            <td>{{ $recipe->entregada2 }}</td>
        </tr>
        @endif
        @if($recipe->med3)
        <tr>
            <td>{{ $recipe->code3 }}</td>
            <td>{{ $recipe->med3 }}</td>
            <td>{{ $recipe->prescripcion3 }}</td>
            <td>{{ $recipe->prescrita3 }}</td>
            <td>{{ $recipe->entregada3 }}</td>
        </tr>
        @endif
        @if($recipe->med4)
        <tr>
            <td>{{ $recipe->code4 }}</td>
            <td>{{ $recipe->med4 }}</td>
            <td>{{ $recipe->prescripcion4 }}</td>
            <td>{{ $recipe->prescrita4 }}</td>
            <td>{{ $recipe->entregada4 }}</td>
        </tr>
        @endif
        @if($recipe->med5)
        <tr>
            <td>{{ $recipe->code5 }}</td>
            <td>{{ $recipe->med5 }}</td>
            <td>{{ $recipe->prescripcion5 }}</td>
            <td>{{ $recipe->prescrita5 }}</td>
            <td>{{ $recipe->entregada5 }}</td>
        </tr>
        @endif
        @if($recipe->med6)
        <tr>
            <td>{{ $recipe->code6 }}</td>
            <td>{{ $recipe->med6 }}</td>
            <td>{{ $recipe->prescripcion6 }}</td>
            <td>{{ $recipe->prescrita6 }}</td>
            <td>{{ $recipe->entregada6 }}</td>
        </tr>
        @endif
        @if($recipe->med7)
        <tr>
            <td>{{ $recipe->code7 }}</td>
            <td>{{ $recipe->med7 }}</td>
            <td>{{ $recipe->prescripcion7 }}</td>
            <td>{{ $recipe->prescrita7 }}</td>
            <td>{{ $recipe->entregada7 }}</td>
        </tr>
        @endif
        @if($recipe->med8)
        <tr>
            <td>{{ $recipe->code8 }}</td>
            <td>{{ $recipe->med8 }}</td>
            <td>{{ $recipe->prescripcion8 }}</td>
            <td>{{ $recipe->prescrita8 }}</td>
            <td>{{ $recipe->entregada8 }}</td>
        </tr>
        @endif
        @if($recipe->med9)
        <tr>
            <td>{{ $recipe->code9 }}</td>
            <td>{{ $recipe->med9 }}</td>
            <td>{{ $recipe->prescripcion9 }}</td>
            <td>{{ $recipe->prescrita9 }}</td>
            <td>{{ $recipe->entregada9 }}</td>
        </tr>
        @endif
        @if($recipe->med10)
        <tr>
            <td>{{ $recipe->code10 }}</td>
            <td>{{ $recipe->med10 }}</td>
            <td>{{ $recipe->prescripcion10 }}</td>
            <td>{{ $recipe->prescrita10 }}</td>
            <td>{{ $recipe->entregada10 }}</td>
        </tr>
        @endif
        @if($recipe->med11)
        <tr>
            <td>{{ $recipe->code11 }}</td>
            <td>{{ $recipe->med11 }}</td>
            <td>{{ $recipe->prescripcion11 }}</td>
            <td>{{ $recipe->prescrita11 }}</td>
            <td>{{ $recipe->entregada11 }}</td>
        </tr>
        @endif
        @if($recipe->med12)
        <tr>
            <td>{{ $recipe->code12 }}</td>
            <td>{{ $recipe->med12 }}</td>
            <td>{{ $recipe->prescripcion12 }}</td>
            <td>{{ $recipe->prescrita12 }}</td>
            <td>{{ $recipe->entregada12 }}</td>
        </tr>
        @endif
        @if($recipe->med13)
        <tr>
            <td>{{ $recipe->code13 }}</td>
            <td>{{ $recipe->med13 }}</td>
            <td>{{ $recipe->prescripcion13 }}</td>
            <td>{{ $recipe->prescrita13 }}</td>
            <td>{{ $recipe->entregada13 }}</td>
        </tr>
        @endif
        @if($recipe->med14)
        <tr>
            <td>{{ $recipe->code14 }}</td>
            <td>{{ $recipe->med14 }}</td>
            <td>{{ $recipe->prescripcion14 }}</td>
            <td>{{ $recipe->prescrita14 }}</td>
            <td>{{ $recipe->entregada14 }}</td>
        </tr>
        @endif

    </table>

    <table width="100%" style="border-collapse:collapse; margin-top:80px; font-size: 0.8rem;" border="1px">
         <tr>
             <td style="width: 50%">
                 @if($recipe->order->user_id)
                     <img src="{{ asset($recipe->order->user->image) }}" alt="" width="150px" height="80px">
                 @else
                     <p>AQUI VA SELLO DEL MEDICO</p>
                 @endif
             </td>

             <td style="width: 50%">
                 firma del paciente
             </td>
         </tr>
    </table>

</div>



