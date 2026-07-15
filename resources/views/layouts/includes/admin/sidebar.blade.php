  @php
      $links = [
           [
              'header' => 'Principal',
          ], 
          [
              'name' => 'Dashboard',
              'icon' => 'fa-solid fa-gauge',
              'href' => route('admin.dashboard'),
              'active' => request()->routeIs('admin.dashboard'),
          ],
          [
              'name' => 'Inventario',
              'icon' => 'fa-solid fa-boxes-stacked',
              'active' => request()->routeIs([
                        'admin.categories.*',
                        'admin.products.*',
                        'admin.warehouses.*',
              ]),
              'submenu' => [
                  [
                      'name' => 'Categorias',
                      'href' => route('admin.categories.index'),
                      'active' => request()->routeIs('admin.categories.*'),
                  ],
                  [
                      'name' => 'Productos',
                      'href' => route('admin.products.index'),
                      'active' => request()->routeIs('admin.products.*'),
                  ],
                  [
                    'name' => 'Almacenes',
                    'icon' => 'fa-solid fa-warehouse',
                    'href' => route('admin.warehouses.index'),
                    'active' => request()->routeIs('admin.warehouses.*'),
                  ],
              ]
          ],
          [
                'name' => 'Compras',
                'icon' => 'fa-solid fa-cart-shopping',
                'active' => request()->routeIs([
                    'admin.suppliers.*',
                    'admin.purchase-orders.*',
                ]),
                'submenu' => [
                    [
                        'name' => 'Proveedores',
                        'href' => route('admin.suppliers.index'),
                        'active' => request()->routeIs('admin.suppliers.*'),
                    ],
                    [
                        'name' => 'Ordenes de Compra',
                        'href' => route('admin.purchase-orders.index'),
                        'active' => request()->routeIs('admin.purchase-orders.*'),
                    ],
                     [
                        'name' => 'Compras',
                        'href' => '#',
                        'active' => false,
                    ],
                ],
            ],
            [
                    'name' => 'Ventas',
                    'icon' => 'fa-solid fa-cash-register',
                    'active' => request()->routeIs([
                        'admin.customers.*',
                    ]),
                    'submenu' => [
                        [
                            'name' => 'Clientes',
                            'href' => route('admin.customers.index'),
                            'active' => request()->routeIs('admin.customers.*'),
                        ],
                        [
                            'name' => 'Cotizaciones',
                            'href' => '#',
                            'active' => false,
                        ],
                         [
                            'name' => 'Ventas',
                            'href' => '#',
                            'active' => false,
                        ],
                    ],
                ],
                [
                    'name' => 'Movimientos',
                    'icon' => 'fa-solid fa-arrows-rotate',
                    'active' => false,
                    'submenu' => [
                        [
                            'name' => 'Entradas y Salidas',
                            'href' => '#',
                            'active' => false,
                        ],
                        [
                            'name' => 'Transferencias',
                            'href' => '#',
                            'active' => false,
                        ],
                       
                    ],
                ],
                [
                    'name' => 'Reportes',
                    'icon' => 'fa-solid fa-chart-simple',
                    'href' => '#',
                    'active' => false, 
                ],
                [
                    'header' => 'Configuracion',
                ],
                [
                    'name' => 'Usuarios',
                    'icon' => 'fa-solid fa-users',
                    'href' => '#',
                    'active' => request()->routeIs('admin.users.*'),
                ],
                [
                    'name' => 'Roles y Permisos',
                    'icon' => 'fa-solid fa-user-shield',
                    'href' => '#',
                    'active' => request()->routeIs('admin.roles.*'),
                ],
                       
          
        
      ];
  @endphp



  <aside id="top-bar-sidebar"
      class="fixed top-0 left-0 z-40 w-64 h-full bg-white transition-transform -translate-x-full sm:translate-x-0"
      aria-label="Sidebar">
      <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft border-e border-default">
          <ul class="mt-20 space-y-2 font-medium">
              @foreach ($links as $link)
                  <li>
                      @isset($link['header'])
                          <div class="px-2 py-2 text-xs font-semibold text-gray-500">
                              {{ $link['header'] }}
                          </div>
                      @else
                          @isset($link['submenu'])
                            <div x-data="{
                                open: {{ ($link['active'] ?? false) ? 'true' :'false'}}
                            }">
                              <button 
                                  type="button"
                                  @click="open = !open"
                                  class="flex items-center w-full justify-between px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group"
                                  >
                                    <span class="inline-flex justify-between items-center text-gray-600">
                                      <i class="{{ $link['icon'] }}  text-2xl "></i>
                                    </span>
                                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{ $link['name'] }}</span>
                                    {{-- <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                      height="24" fill="none" viewBox="0 0 24 24"> --}}

                                    <i class="text-sm" :class="{
                                        'fa-solid fa-chevron-up' : open,
                                        'fa-solid fa-chevron-down' : !open,

                                    }"></i>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m19 9-7 7-7-7" />
                                  </svg>
                              </button>
                              <ul x-show="open" x-cloaak  class=" py-2 space-y-2">
                                @foreach ( $link['submenu'] as $item)
                                    
                                <li>
                                    <a href="{{ $item['href'] }}"
                                    class="pl-10 flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group {{ ($item['active'] ?? false) ? 'bg-blue-300' : 'bg-white' }}">
                                    {{ $item['name'] }}
                                    </a>
                                </li>
                                @endforeach
                               
                              </ul>
                            </div>
                          @else
                              <a href="{{ $link['href'] }}"
                                  class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group {{ ($link['active'] ?? false) ? 'bg-blue-300' : '' }}">
                                  <span class="inline-flex justify-between items-center text-gray-600">
                                      <i class="{{ $link['icon'] }}  text-2xl "></i>
                                  </span>
                                  <span class="ms-3">{{ $link['name'] }}</span>
                              </a>
                          @endisset
                      @endisset
                  </li>
              @endforeach

              </li>

          </ul>
      </div>
  </aside>
