<div>
    <h1 class="subtitulo">Cadastro de pessoa</h1>
    <div class="separador"></div>

    <div class="input-form">
        <label>Nome
            <div id="div-nome">
                <input tabindex="1" wire:model.defer="nome" type="text" id="nome" class="form-control" required autofocus>
                @error('nome') <x-form-error :message="$message"/> @enderror
                <ul class="lista-regras">
                    <li><small>Insira pelo menos 2 nomes</small></li>
                    <li><small>Cada nome deve ter a primeira letra maiúscula e o restante minúsculo</small></li>
                </ul>
            </div>
        </label>
    </div>
    <div class="input-form">
        <label>CPF
            <div id="div-cpf">
                <input tabindex="1" wire:model.defer="cpf" type="text" id="cpf" class="form-control" placeholder="000.000.000-00">
                @error('cpf') <x-form-error :message="$message"/> @enderror
            </div>
        </label>
    </div>
    <div class="input-form">
        <label>Data nascimento
            <div id="div-nascimento">
                <input tabindex="1" wire:model.defer="nascimento" type="text" id="nascimento" class="form-control" placeholder="00/00/0000">
                @error('nascimento2') <x-form-error :message="$message"/> @enderror
                <ul class="lista-regras">
                    <li><small>Deve ser anterior a hoje</small></li>
                </ul>
            </div>
        </label>
    </div>

    <div class="cadastro-endereco">
        <div class="box-label">Endereço</div>
        <div class="input-form">
            <label>CEP
                <div id="div-cep">
                    <input tabindex="1" wire:model="cep" type="text" id="cep" class="form-control" placeholder="00000-000">
                    @error('cep') <x-form-error :message="$message"/> @enderror
                </div>
            </label>
        </div>

        <div class="campo-endereco">
            <div class="double">
                <div class="input-form filll-available">
                    <label id="label-rua">Rua
                        <div id="div-rua">
                            <input tabindex="1" wire:model.defer="rua" type="text" class="form-control">
                            @error('rua') <x-form-error :message="$message"/> @enderror
                        </div>
                    </label>
                </div>
                <div class="input-form">
                    <label id="label-numero">Número
                        <div id="div-numero">
                            <input tabindex="1" wire:model.defer="numero" type="text" id="numero" class="form-control">
                            @error('numero') <x-form-error :message="$message"/> @enderror
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="campo-endereco">
            <div class="double">
                <div class="input-form filll-available">
                    <label id="label-cidade">Cidade
                        <div id="div-cidade">
                            <input tabindex="1" wire:model.defer="cidade" type="text" class="form-control">
                            @error('cidade') <x-form-error :message="$message"/> @enderror
                        </div>
                    </label>
                </div>
                <div class="input-form">
                    <label id="label-estado">Estado
                        <div id="div-estado">
                            <input tabindex="1" wire:model.defer="estado" type="text" class="form-control">
                            @error('estado') <x-form-error :message="$message"/> @enderror
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="botoes">
        <button class="btn-salvar" wire:click="salvar()">Salvar</button>
        <button class="btn-salvar" wire:click="limpar()">Limpar</button>
        <button class="btn-voltar" onclick="location.href = '{{ route('home') }}'">Voltar</button>
    </div>

    <h1 class="subtitulo">Pessoas cadastradas</h1>
    <div class="separador"></div>

    <div>
        <livewire:table :dataTable="$dataTable" key="{{ now() }}" />
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            applyCepMask();
            applyMask('cpf',document.querySelector('#cpf'));
            applyMask('data',document.querySelector('#nascimento'));
            applyMask('numero',document.querySelector('#numero'));
        })
    </script>
</div>
