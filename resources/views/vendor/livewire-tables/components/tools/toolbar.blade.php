@aware([ 'tableName','isTailwind','isBootstrap'])
@props([])
@php($toolBarAttributes = $this->getToolBarAttributesBag)

<div
    {{
        $toolBarAttributes->merge()
        ->class([
            'flex text-blue-500 justify-between  mb-4 px-4 md:p-0 gap-4 black:bg-gray-400 black:text-white' => $isTailwind && ($toolBarAttributes['default-styling'] ?? true),
            'd-md-flex mb-3' => $isBootstrap && ($toolBarAttributes['default-styling'] ?? true),
            
        ])
        ->except(['default','default-styling','default-colors'])
    }}
>
    <div @class([
            'flex w-auto  space-x-2 gap-y-2' => $isTailwind,
        ])
    >
        @if ($this->hasConfigurableAreaFor('toolbar-left-start'))
            <div x-cloak x-show="!currentlyReorderingStatus" @class([
                'mb-3 mb-md-0 input-group' => $isBootstrap,
                'flex rounded-md shadow-sm' => $isTailwind,
            ])>
                @include($this->getConfigurableAreaFor('toolbar-left-start'), $this->getParametersForConfigurableArea('toolbar-left-start'))
            </div>
        @endif

        @if ($this->showReorderButton())
            <x-livewire-tables::tools.toolbar.items.reorder-buttons />
        @endif

        @if ($this->showSearchField())
            <div class="w-full md:flex-1 md:min-w-0">
                <x-livewire-tables::tools.toolbar.items.search-field />
            </div>
        @endif

        <div @class([
                'flex flex-wrap items-center space-x-2 w-full md:w-auto bg-gray-100 black:bg-gray-200' => $isTailwind,
            ])
        >
            @if ($this->showFiltersButton())
                <x-livewire-tables::tools.toolbar.items.filter-button />
            @endif

            @if ($this->columnSelectIsEnabled)
                <x-livewire-tables::tools.toolbar.items.column-select />
            @endif
        </div>

        @if($this->showActionsInToolbarLeft())
            <x-livewire-tables::includes.actions/>
        @endif

        @if ($this->hasConfigurableAreaFor('toolbar-left-end'))
            <div x-cloak x-show="!currentlyReorderingStatus" @class([
                'mb-3 mb-md-0 input-group' => $isBootstrap,
                'flex rounded-md shadow-sm' => $isTailwind,
            ])>
                @include($this->getConfigurableAreaFor('toolbar-left-end'), $this->getParametersForConfigurableArea('toolbar-left-end'))
            </div>
        @endif
    </div>

    <div x-cloak x-show="!currentlyReorderingStatus"
        @class([
            'md:flex md:items-center space-y-4 md:space-y-0 md:space-x-2' => $isTailwind,
        ])
    >
        @includeWhen($this->hasConfigurableAreaFor('toolbar-right-start'), $this->getConfigurableAreaFor('toolbar-right-start'), $this->getParametersForConfigurableArea('toolbar-right-start'))

        @if($this->showActionsInToolbarRight())
            <x-livewire-tables::includes.actions/>
        @endif

        @if ($this->showBulkActionsDropdownAlpine() && $this->shouldAlwaysHideBulkActionsDropdownOption != true)
            <x-livewire-tables::tools.toolbar.items.bulk-actions />
        @endif

        @if ($this->showPaginationDropdown())
            <x-livewire-tables::tools.toolbar.items.pagination-dropdown />
        @endif

        @includeWhen($this->hasConfigurableAreaFor('toolbar-right-end'), $this->getConfigurableAreaFor('toolbar-right-end'), $this->getParametersForConfigurableArea('toolbar-right-end'))
    </div>
</div>
