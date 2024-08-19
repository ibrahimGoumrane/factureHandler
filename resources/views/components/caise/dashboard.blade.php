@props(['caisses'])

@php
    $styles = [
        'active' => 'bg-slate-500/60 text-black',
        'inactive' => 'bg-gray-200 text-gray-500',
    ];
@endphp

<div class="rounded-t-lg max-w-[90vw] overflow-hidden flex-1 self-start ">
    <div class="flex items-start justify-start scrollable-container max-w-full max-h-[60vh]">
        <table class="display table-fixed dataTables_wrapper " id="table">
            <x-caise.C.caise-thead>
                <x-caise.C.caise-th style="width: 50px;">Libelle</x-caise.C.caise-th>
                <x-caise.C.caise-th style="width: 30px;">Nature</x-caise.C.caise-th>
                <x-caise.C.caise-th style="width: 40px;">Date</x-caise.C.caise-th>
                <x-caise.C.caise-th style="width: 40px;">Debit</x-caise.C.caise-th>
                <x-caise.C.caise-th style="width: 40px;">Credit</x-caise.C.caise-th>
                <x-caise.C.caise-th style="width: 50px;">Acheter Par</x-caise.C.caise-th>
                <x-caise.C.caise-th position="right" style="width: 50px; ">Piece Joint</x-caise.C.caise-th>
                <x-caise.C.caise-th position="right" style="width: 50px; ">Actions</x-caise.C.caise-th>
            </x-caise.C.caise-thead>
            <x-caise.C.caise-tbody>
                @if(isset($caisses) && $caisses->count() !== 0)
                    @foreach ($caisses as $caisse)
                        @php
                            $date = Carbon\Carbon::parse($caisse->date)->format('d/m/Y');
                            $fmt = new NumberFormatter("en_US", NumberFormatter::DECIMAL);
                            $fmt->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 2);
                            $fmt->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 2);
                            $credit = $fmt->format($caisse->credit);
                            $debit = $fmt->format($caisse->debit);
                            $openModalButton = 'openModalButton'.$caisse->id+3;
                        @endphp
                        <tr>
                            <x-caise.C.caise-td class="dt-body-left" :bold="true">{{ $caisse->libelle }}</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left" :bold="true">{{ $caisse->nature }}</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left">{{ $date }}</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left">{{ $debit }} DH</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left">{{ $credit }} DH</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left" :bold="true">{{ $caisse->AcheterPar }}</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left">
                                @if(isset($caisse->pieceJointe))
                                    <div class="flex items-center justify-center gap-5">
                                            <a href="{{ asset($caisse->pieceJointe) }}" class="text-black hover:bg-white h-12 w-12 font-bold flex items-center justify-center    rounded-md px-3 py-1.5 text-sm  leading-6  shadow-sm  hover:bg-blue-400/90 focus:outline-none" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </a>
                                        <a href="{{route('caisse.upload' , $caisse->id)}}" class="text-black  hover:bg-white h-12 w-12 font-bold flex items-center justify-center    rounded-md px-3 py-1.5 text-sm  leading-6  shadow-sm  hover:bg-blue-400/90 focus:outline-none">
                                            <i class='bx bx-upload' ></i>
                                        </a>
                                    </div>
                                @endif
                            </x-caise.C.caise-td>
                            <x-caise.C.caise-td class=" flex items-center justify-center gap-10">
                                <div class="hidden">
                                    <x-form id="delete"  action="{{ route('caisse.delete' , $caisse->id) }}" method="POST"/>
                                </div>
                                <x-caisse-update :id="$caisse->id+3" :libelle="$caisse->libelle" :date="$caisse->date" :debit="$caisse->debit" :credit="$caisse->credit" :AcheterPar="$caisse->AcheterPar" :nature="$caisse->nature" :pieceJointe="$caisse->pieceJointe">
                                    <x-slot:buttonName>
                                        <button id="{{$openModalButton}}" class="text-black hover:bg-white h-12 w-12 font-bold flex items-center justify-center    rounded-md px-3 py-1.5 text-sm  leading-6  shadow-sm  hover:bg-blue-400/90 focus:outline-none" >
                                            <i class='bx bx-message-square-add'></i>
                                        </button >
                                    </x-slot:buttonName>
                                </x-caisse-update>
                                <button type="submit" form="delete" class="text-black hover:bg-white h-12 w-12 font-bold flex items-center justify-center    rounded-md px-3 py-1.5 text-sm  leading-6  shadow-sm  hover:bg-blue-400/90 focus:outline-none" >
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
