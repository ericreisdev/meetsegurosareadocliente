<x-action-section>
    <x-slot name="title">
        {{ __('Sessões de Navegador') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Gerencie e saia de suas sessões ativas em outros navegadores e dispositivos.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Se necessário, você pode sair de todas as suas outras sessões de navegador em todos os seus dispositivos. Algumas de suas sessões recentes estão listadas abaixo; no entanto, esta lista pode não ser exaustiva. Se você achar que sua conta foi comprometida, você também deve atualizar sua senha.') }}
        </div>

        @if (count($this->sessions) > 0)
            <div class="mt-5 space-y-6">
                <!-- Outras Sessões de Navegador -->
                @foreach ($this->sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                <!-- ícone de desktop -->
                            @else
                                <!-- ícone de dispositivo móvel -->
                            @endif
                        </div>

                        <div class="ms-3">
                            <div class="text-sm text-gray-600">
                                {{ $session->agent->platform() ? $session->agent->platform() : __('Desconhecido') }} - {{ $session->agent->browser() ? $session->agent->browser() : __('Desconhecido') }}
                            </div>

                            <div>
                                <div class="text-xs text-gray-500">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">{{ __('Este dispositivo') }}</span>
                                    @else
                                        {{ __('Última atividade') }} {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex items-center mt-5">
            <x-button wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __('Sair de Outras Sessões de Navegador') }}
            </x-button>

            <x-action-message class="ms-3" on="loggedOut">
                {{ __('Concluído.') }}
            </x-action-message>
        </div>

        <!-- Modal de Confirmação para Sair de Outros Dispositivos -->
        <x-dialog-modal wire:model.live="confirmingLogout">
            <x-slot name="title">
                {{ __('Sair de Outras Sessões de Navegador') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Por favor, insira sua senha para confirmar que deseja sair de suas outras sessões de navegador em todos os seus dispositivos.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Senha') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-button class="ms-3"
                            wire:click="logoutOtherBrowserSessions"
                            wire:loading.attr="disabled">
                    {{ __('Sair de Outras Sessões de Navegador') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
