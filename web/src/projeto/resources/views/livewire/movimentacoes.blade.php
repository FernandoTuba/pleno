<div>
    <h1 class="subtitulo">Movimentações</h1>
    <div class="separador"></div>

    <div class="input-form">
        <label>Nome
            <div id="div-select-pessoa-movimentacao">
                <select tabindex="1" {{ empty($pessoas) ? 'disabled' : null }} wire:model="cpf" id="select-pessoa-movimentacao" class="campo-select" autofocus>
                    @if (!empty($pessoas))
                        <option>Selecione</option>
                        @foreach ($pessoas as $pessoa)
                            <option value="{{ $pessoa->cpf }}" {{ $pessoa->cpf == $cpf ? 'selected' : null }} wire:key="{{ $loop->index }}">{{ $pessoa->nome . ' / ' . Helper::formatCPFToHumans($pessoa->cpf)}}</option>
                        @endforeach
                    @endif
                </select>
                @error('cpf') <x-form-error :message="$message"/> @enderror
            </div>
        </label>
    </div>
    @if (isset($contas) && count($contas))
        <div class="input-form">
            <label>Conta
                <div id="div-select-conta">
                    <select tabindex="1" wire:model="id_conta" class="campo-select" id="select-conta">
                        @if (!empty($contas))
                            <option value="">Selecione</option>
                            @foreach ($contas as $conta)
                                @php
                                    if ($conta->movimentacoes) {
                                        $saldo = Helper::calculaSaldo($conta->movimentacoes);
                                    } else $saldo = '00,00';
                                @endphp
                                <option value="{{ $conta->id_conta }}" {{ $conta->id_conta == $id_conta ? 'selected' : null }} wire:key="{{ $loop->index }}">{{ $conta->conta . ' - Saldo R$ ' . $saldo}}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('id_conta') <x-form-error :message="$message"/> @enderror
                </div>
            </label>
        </div>
    @endif
    @if (!empty($cpf) && !empty($id_conta))
        <div class="input-form">
            <label>Ação
                <div id="div-select-acao">
                    <select tabindex="1" wire:model.defer="acao" id="select-acao" class="campo-select">
                        <option>Selecione</option>
                        <option value="Depositar" class="color-green">Depositar</option>
                        <option value="Retirar" class="color-red">Retirar</option>
                    </select>
                    @error('acao') <x-form-error :message="$message"/> @enderror
                </div>
            </label>
        </div>
        <div class="input-form">
            <label>Valor
                <div id="div-valor">
                    <input tabindex="1" wire:model.defer="valor" type="number" id="valor" class="form-control">
                    @error('valor') <x-form-error :message="$message"/> @enderror
                </div>
            </label>
        </div>
    @endif

    <div class="botoes">
        @if (!empty($cpf) && !empty($id_conta))
            <button class="btn-salvar" wire:click="salvar()">Salvar</button>
        @endif
        <button class="btn-salvar" wire:click="limpar()">Limpar</button>
        <button class="btn-voltar" onclick="location.href = '{{ route('home') }}'">Voltar</button>
    </div>

    @if (!empty($cpf) && !empty($id_conta))
        <h1 class="subtitulo">Extrato</h1>
        <div class="separador"></div>

        <div id="tabela-extrato">
            <livewire:table :dataTable="$dataTable" key="{{ now() }}" />
        </div>
    @endif

</div>
