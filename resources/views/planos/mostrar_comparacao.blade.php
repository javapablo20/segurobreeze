<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ __('Resultado da Comparação de Planos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 bg-gradient-to-b from-blue-100 to-teal-50 rounded-lg">

        <br>
        <!-- Grid de planos selecionados -->
        <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($planosSelecionados as $plano)
                <div
                    class="bg-white shadow-lg rounded-lg p-6 border border-teal-200 transform transition duration-300 hover:scale-105">
                    <h2 class="text-3xl font-bold text-teal-700 mb-4">{{ $plano->nome }}</h2>
                    <p class="text-lg">
                        <strong class="text-teal-800">Tipo:</strong> <span class="text-gray-800">{{ $plano->tipo }}</span>
                    </p>
                    <p class="text-lg">
                        <strong class="text-teal-800">Benefícios:</strong> <span
                            class="text-gray-800">{{ $plano->cobertura }}</span>
                    </p>
                    <p class="text-lg">
                        <strong class="text-teal-800">Faixa Etária:</strong> <span
                            class="text-gray-800">{{ $plano->faixaetaria }}</span>
                    </p>
                    <p class="text-lg">
                        <strong class="text-teal-800">Preço:</strong> <span class="text-red-600 font-semibold">R$
                            {{ number_format($plano->preco, 2, ',', '.') }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>