
    <div class="sm:max-w-5xl sm:mx-auto">
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
                            <a href="{{ route('save') }}"  class="border border-green-500 bg-green-500 text-sm w-30 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline ">
                                Crear
                            </a>
                        </div>
                        <br>
                        <div class=" col-start-1 col-span-2 pt-2">
                            <label class="font-semibold">{{ $date }}</label>
                        </div>
                        <div class="col-span-2 pt-2">
                            <label class="font-semibold">{{ $turno }}</label>
                        </div>
                        <div class="col-span-5 pt-2">
                            <label class="font-semibold">{{ $mat }}</label>
                        </div>
                        <div class="col-span-3 pt-2">
                            <label class="font-semibold">{{ $resp }}</label>
                        </div>
                    </div>
                </div>
                <div class="pb-4 px-5 bg-gray-50">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                              LOTE
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                              PAQUETE
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                              PESO (Kg)
                            </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($packages as $package)
                              <tr>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $package->lote->code }}</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $package->package }}</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $package->peso }}</div>
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
                    {{ $packages->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
