@props(['cellules'])

<div class="rounded-t-lg max-w-[90vw] overflow-hidden flex-1 self-start ">
    <div class="flex items-start justify-start scrollable-container max-w-full max-h-[60vh]">
        <table class="display table-fixed dataTables_wrapper ">
            <x-caise.C.caise-thead>
                <x-caise.C.caise-th >id</x-caise.C.caise-th>
                <x-caise.C.caise-th >Cellule Name</x-caise.C.caise-th>
                <x-caise.C.caise-th position="right" style="width: 60px; ">Modifier</x-caise.C.caise-th>
            </x-caise.C.caise-thead>
            <x-caise.C.caise-tbody>
                @if(isset($cellules) && $cellules->count() !== 0)
                    @foreach ($cellules as $cellule)
                        @php
                            $openModalButton = 'openAdminCelluleButton'.$cellule->id+2;
                        @endphp
                        <tr>
                            <x-caise.C.caise-td class="dt-body-left" >{{ $cellule->id }}</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left" >{{ $cellule->libelle }}</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="flex items-center justify-center gap-10">
                                <div class="hidden">
                                    <x-form id="delete" action="{{ route('cellule.delete', $cellule->id) }}" method="POST"/>
                                </div>
                                <x-adminUpdateRole :id="$cellule->id" :libelle="$cellule->libelle">
                                    <x-slot:buttonName>
                                        <button id="{{$openModalButton}}" class="text-black hover:bg-white h-12 w-12 font-bold flex items-center justify-center rounded-md px-3 py-1.5 text-sm leading-6 shadow-sm hover:bg-blue-400/90 focus:outline-none">
                                            <i class='bx bx-message-square-add'></i>
                                        </button>
                                    </x-slot:buttonName>
                                </x-adminUpdateRole>
                                <button type="submit" form="delete" class="text-black hover:bg-white h-12 w-12 font-bold flex items-center justify-center rounded-md px-3 py-1.5 text-sm leading-6 shadow-sm hover:bg-blue-400/90 focus:outline-none">
                                    <i class='bx bxs-trash'></i>
                                </button>
                            </x-caise.C.caise-td>
                        </tr>
                    @endforeach
                @endif
            </x-caise.C.caise-tbody>
        </table>
    </div>
</div>
