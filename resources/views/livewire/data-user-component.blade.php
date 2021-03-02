
<div class="sm:mx-auto mt-5">
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-3">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <div class="pt-4 px-5 bg-gray-50 ">
                    <div class="grid grid-cols-8 gap-4">
                        <div class=" col-start-4 col-span-2">
                            <p class="text-center text-sm font-bold uppercase">Roles</p>
                        </div>
                        <div class="col-start-8 col-span-2">
                            <button onclick="document.getElementById('modal-create-rol').showModal()" class="border border-green-500 bg-green-500 text-sm w-30 text-white rounded-md px-3 py-1 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline ">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                  </div>
                  <div class="py-2 px-5 bg-gray-50">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                              <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                Rol
                              </th>
                              <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                Permisos
                              </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                              @forelse ($roles as $rol)
                                <tr>
                                  <td class="px-3 py-4 whitespace-nowrap">
                                      <div class="text-sm font-medium text-gray-900">
                                          {{ $rol->name }}
                                      </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                      <div class="text-sm text-gray-900">
                                          @for($i = 0; $i < $rol->rol_ops->count(); $i++)
                                              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                  {{ $rol->rol_ops[$i]->operations->name }}
                                              </span>
                                          @endfor
                                      </div>
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
                                    <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium w-2/12">
                                      ----
                                    </td>
                                </tr>
                              @endforelse
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-span-7">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <div class="pt-4 px-5 bg-gray-50">
                      <div class="grid grid-cols-12 gap-4 px-3">
                          <div class="col-start-4 col-span-6">
                              <input type="text" class="text-sm block w-full shadow-sm border-gray-300 rounded-md" wire:model="search" placeholder="Buscar...">
                          </div>
                          <div class="col-start-12 col-span-1">
                              <button onclick="document.getElementById('modal-create-user').showModal()" class="border border-green-500 bg-green-500 text-sm w-30 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline ">
                                <i class="fas fa-plus"></i>
                              </button>
                          </div>
                      </div>
                  </div>
                  <div class="py-0 px-5 bg-gray-50">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                              <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                Usuario
                              </th>
                              <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                Email
                              </th>
                              <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                Rol
                              </th>
                              <th scope="col" class="px-3 py-5 text-left text-sm font-bold uppercase tracking-wider"></th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                              @forelse ($users as $user)
                                <tr>
                                  <td class="px-3 py-4 whitespace-nowrap">
                                      <div class="text-sm font-medium text-gray-900">
                                          {{ $user->name }}
                                      </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                      <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                      <div class="text-sm text-gray-900">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $user->rol->name }}
                                        </span>
                                      </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium w-2/12">
                                        <a class="text-blue-600 hover:text-blue-900 text-lg px-3">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="text-blue-600 hover:text-blue-900 text-lg px-3">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
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
                                    <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium w-2/12">
                                      ----
                                    </td>
                                </tr>
                              @endforelse
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<dialog id="modal-create-rol" class=" w-11/12 md:w-3/12 p-5  bg-white rounded-md ">
    <div class="flex flex-col w-full h-auto ">
         <!-- Header -->
         <div class="flex w-full h-auto justify-center items-center">
           <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">CREAR ROL</div>
           <div onclick="document.getElementById('modal-create-rol').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
            <i class="fas fa-times"></i>
           </div>
           <!--Header End-->
         </div>
           <!-- Modal Content-->
            <div>
                @livewire('rol-create-model')
            </div>
           <!-- End of Modal Content-->
         </div>
 </dialog>
 <dialog id="modal-create-user" class=" w-11/12 md:w-3/12 p-5  bg-white rounded-md ">
    <div class="flex flex-col w-full h-auto ">
         <!-- Header -->
         <div class="flex w-full h-auto justify-center items-center">
           <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold"> </div>
           <div onclick="document.getElementById('modal-create-user').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
            <i class="fas fa-times"></i>
           </div>
           <!--Header End-->
         </div>
           <!-- Modal Content-->
            <div>
                @livewire('user-create-model')
            </div>
           <!-- End of Modal Content-->
         </div>
 </dialog>
 <script>
    window.addEventListener('closeModal', event =>{
        document.getElementById('modal-create-rol').close()
    })
</script>
