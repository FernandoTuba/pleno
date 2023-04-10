<div style="overflow-x:auto;">
    <div class="tabela">
        <table tabindex="2">
            <caption class="hidden">{{ $table['title'] }}</caption>
            <thead class="t_head">
                <tr class="grid-cols-12">
                    @foreach ($table['headers'] as $key => $header)
                        <th class="th cols_{{ $table['cols'][$key] }}" id="coluna_{{ $key }}">{{ $header }}</th>
                    @endforeach
                    @if (isset($table['cols']['opcoes']))
                        <th class="th_opcoes cols_{{ $table['cols']['opcoes'] }}" id="coluna_opcoes">Opções</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($table['rows'] as $key => $row)
                    <tr class="grid-cols-12 @if($key % 2 == 0) bg-cinza04 @endif">
                        @foreach ($row as $key => $columnItem)
                            @if (!in_array($key, $systemKeys))
                                <td class="td_geral cols_{{ $table['cols'][$key] }}">
                                    <span>{!! $columnItem !!}</span>
                                </td>
                            @endif
                        @endforeach
                        @if (isset($table['cols']['opcoes']))
                            <td class="td_opcoes cols_{{ $table['cols']['opcoes'] }}">
                                @if (isset($table['metodos']['editar']) && $table['metodos']['editar'])
                                    <button tabindex="2" class="icones2" wire:click="$emit('editarDados', {{ $row['id'] }})" title="Editar">
                                        <i class="ri-pencil-line"></i>
                                    </button>
                                @endif
                                @if (isset($table['metodos']['deletar']) && $table['metodos']['deletar'])
                                    <button tabindex="2" class="icones2" wire:click="$emit('deletarItem', {{ $row['id'] }})" title="Excluir">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                @endif
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td class="nenhum-registro" colspan="{{ count($table['headers']) }}">Nenhum registro encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


