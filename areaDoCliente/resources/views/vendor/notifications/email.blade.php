<x-mail::message>
{{-- Saudação --}}
# Olá!

{{-- Linhas de Introdução --}}
Você está recebendo este e-mail porque recebemos um pedido de redefinição de senha para sua conta na Meet Seguros.

{{-- Botão de Ação --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Linhas de Encerramento --}}
Se você não solicitou uma redefinição de senha, nenhuma ação adicional é necessária. Este link para redefinir a senha expirará em 60 minutos.

{{-- Saudação Final --}}
Atenciosamente,<br>
Equipe Meet Seguros

{{-- Subcópia --}}
@isset($actionText)
<x-slot:subcopy>
Se estiver tendo problemas para clicar no botão "{{ $actionText }}", copie e cole o URL abaixo no seu navegador:
<span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>
