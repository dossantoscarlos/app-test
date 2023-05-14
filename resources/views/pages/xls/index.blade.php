<x-app-layout>
    <div class="w-3/4 mx-auto my-4 flex flex-row justify-center p-10 bg-white">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="py-3 px-4 border-b border-gray-200 font-bold">Arquivo</th>
                    <th class="py-3 px-4 border-b border-gray-200 font-bold">Cep lidos</th>
                    <th class="py-3 px-4 border-b border-gray-200 font-bold">Cep validos</th>
                    <th class="py-3 px-4 border-b border-gray-200 font-bold">Cep invalidos</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($results as $result)
                    <tr>
                        <td>{{$result['url']}}</td>
                        @if($result['quantidade_lida'] === $result['quantidade_valida'])
                            <td class="bg-green-900 text-white">{{ $result['quantidade_lida'] }}</td>
                            <td class="bg-green-900 text-white">{{ $result['quantidade_valida'] }}</td>
                        @elseif ($result['quantidade_lida'] !== $result['quantidade_valida']) 
                            <td class="bg-red-900 text-white">{{ $result['quantidade_lida'] }}</td>
                            <td class="bg-yellow-600 text-white">{{ $result['quantidade_valida'] }}</td>
                        @endif
                            <td>{{ $result['quantidade_lida'] - $result['quantidade_valida'] }} </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>