<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Finalizar Compra') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Detalhes do Plano -->
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $plano->nome }}</h3>
                    <p class="text-gray-700 mb-4"><strong>Preço:</strong> R$
                        {{ number_format($plano->preco, 2, ',', '.') }}</p>

                    <!-- Formulário para finalizar a compra -->
                    <form method="POST" action="{{ route('confirmar.compra', $plano->id) }}">
                        @csrf

                        <!-- Campo oculto para enviar o preço -->
                        <input type="hidden" name="preco" value="{{ $plano->preco }}" />

                        <!-- Detalhes do comprador -->
                        <div class="mb-4">
                            <x-input-label for="nome" :value="__('Nome Completo')" />
                            <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="endereco" :value="__('Endereço')" />
                            <x-text-input id="endereco" name="endereco" type="text" class="mt-1 block w-full"
                                required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="cidade" :value="__('Cidade')" />
                            <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" required />
                        </div>

                        <button type="submit"
                            class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-lg">
                            Confirmar Compra
                        </button>
                    </form>

                    <!-- Botão para voltar -->
                    <a href="{{ route('comprar.planos') }}"
                        class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-lg">
                        Voltar para Planos
                    </a>

                    <!-- Exibição de Benefícios (Cobertura) -->
                    <div class="text-lg">
                        <strong class="text-teal-800">Benefícios:</strong>
                        <ul class="list-disc pl-5 text-gray-800">
                            @php
                                // Tenta decodificar como JSON
                                $beneficios = json_decode($plano->cobertura, true);
                                // Se não for JSON válido, divide por vírgulas
                                if (is_null($beneficios)) {
                                    $beneficios = explode(',', $plano->cobertura);
                                }
                            @endphp
                            @foreach ($beneficios as $beneficio)
                                <li>{{ trim($beneficio) }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>