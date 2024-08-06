@props(['caisses'])

@php
    $styles = [
        'active' => 'bg-slate-500/60 text-black',
        'inactive' => 'bg-gray-200 text-gray-500',
    ];
@endphp
<div class="rounded-t-lg max-w-[90vw] overflow-hidden flex-1 self-start mt-20 ">
    <div class="flex items-start justify-start  scrollable-container max-w-full  max-h-[70vh]  ">
        <table  class="display table-fixed dataTables_wrapper " id="table">
            <x-caise.C.caise-thead>
                    <x-caise.C.caise-th position="left" style="width: 50px;">ID</x-caise.C.caise-th>
                    <x-caise.C.caise-th style="width: 75px;">Date</x-caise.C.caise-th>
                    <x-caise.C.caise-th >Libelle</x-caise.C.caise-th>
                    <x-caise.C.caise-th style="width: 50px;">Montant</x-caise.C.caise-th>
                    <x-caise.C.caise-th  position="right" style="width: 75px;">Acheter Par</x-caise.C.caise-th>
            </x-caise.C.caise-thead>
            <x-caise.C.caise-tbody>
                @if(isset($caisses) && $caisses->count()!==0)
                @foreach ($caisses as $caisse)
                    <tr>
                        <x-caise.C.caise-td class="dt-body-left">{{$caisse->id}}</x-caise.C.caise-td>
                        <x-caise.C.caise-td class="dt-body-right">{{$caisse->date}}</x-caise.C.caise-td>
                        <x-caise.C.caise-td class="dt-body-left">{{$caisse->libelle}}</x-caise.C.caise-td>
                        <x-caise.C.caise-td class="dt-body-right">{{$caisse->montant}}</x-caise.C.caise-td>
                        <x-caise.C.caise-td class="dt-body-left">{{$caisse->AcheterPar}}</x-caise.C.caise-td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <x-caise.C.caise-td colspan="5" class="text-center">Aucune caisse disponible</x-caise.C.caise-td>
                    </tr>
                @endif
            </x-caise.C.caise-tbody>
        </table>
        </div>
</div>
