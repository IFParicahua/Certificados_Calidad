
    <div class="sm:max-w-7xl sm:mx-auto">
        <div class="flex flex-col mt-5 border">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="pt-4 px-5 bg-gray-50">
                    <div class="grid grid-cols-12 gap-4 px-3">
                        <div class="col-start-4 col-span-6">
                            <input type="text" class="text-sm block w-full shadow-sm border-gray-300 rounded-md" wire:model="search" placeholder="Buscar...">
                        </div>
                        <div class="col-start-12 col-span-1">
                            <a href="{{ route('save.certify') }}"  class="border border-green-500 bg-green-500 text-sm w-30 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline ">
                                Crear
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pb-4 px-5 bg-gray-50">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                Identificador
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                Nº Pedido
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                Nº Orden
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                Peso Neto
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                Cliente
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                Generado
                            </th>
                            <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($certificates as $certify)
                              <tr>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $certify->n_certificado }}</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $certify->n_pedido }}</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $certify->n_orden }}</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $certify->peso_neto }}</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $certify->user_id }}</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $certify->date }}</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <a href="{{ route('certificado_pdf',$certify->id) }}" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                                  </td>
                              </tr>
                            @empty
                              <tr>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">----</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">----</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">---</div>
                                  </td>
                              </tr>
                            @endforelse
                      </tbody>
                    </table>
                </div>
                <div class="bg-gray-100 px-6 py-4 border-t border-gray-200">
                    {{ $certificates->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
