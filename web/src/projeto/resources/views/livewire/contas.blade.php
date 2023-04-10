<div>
    <h1 class="subtitulo">Cadastro de conta</h1>
    <div class="separador"></div>

    <div class="input-form">
        <label>Nome
            <div id="div-select-pessoa">
                <select tabindex="1" {{ empty($pessoas) ? 'disabled' : null }} wire:model.defer="cpf" id="select-pessoa" class="campo-select" autofocus>
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
    <div class="input-form">
        <label>Número da conta
            <div id="div-conta">
                <input tabindex="1" wire:model.defer="numero" type="text" id="numero" class="form-control" placeholder="000000-0">
                @error('numero') <x-form-error :message="$message"/> @enderror
            </div>
        </label>
    </div>

    <div class="botoes">
        <button class="btn-salvar" wire:click="salvar()">Salvar</button>
        <button class="btn-salvar" wire:click="limpar()">Limpar</button>
        <button class="btn-voltar" onclick="location.href = '{{ route('home') }}'">Voltar</button>
    </div>

    <h1 class="subtitulo">Contas cadastradas</h1>
    <div class="separador"></div>

    <div>
        <livewire:table :dataTable="$dataTable" key="{{ now() }}" />
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            applyMask('conta',document.querySelector('#numero'));
        })
    </script>
</div>
