@php
    if ($services['image']) {
        $services['image'] = \Storage::url($services['image']);
    } else {
        $services['image'] = 'images/logo-ninacode-mx-1024.png';
    }
@endphp
<div data-section-id="Service">
    
    <div class="bg-neutral-100 mb-4 mx-auto px-4 py-10">
        <div class="container mx-auto">
            <div class="items-center gap-4 justify-between lg:flex">
                <div class="border border-neutral-300 h-40 lg:mb-0 lg:w-1/3 mb-4 rounded shadow">
                    <img alt="{{ $services['name'] }}" class="object-cover object-center h-full rounded w-full" src="{{ asset($services['image']) }}" title="{{ $services['name'] }}" />
                </div>

                {{--<div class="h-32 w-52">
                    <img alt="{{ $services['name'] }}" class="object-cover h-full rounded" src="{{ asset($services['image']) }}" title="{{ $services['name'] }}" />
                </div>--}}

                <h1>{{ $services['name'] }}</h1>
            </div>
        </div>
    </div>

    <div class="bg-neutral-50 container mx-auto rounded shadow">
        <div class="mx-auto px-4 py-10">
            <div class="container mx-auto">
                {!! $services['description'] !!}

                <div class="flex items-center justify-end gap-4">
                    <a class="button-cancel border font-bold inline-block lg:max-w-40 lg:w-auto mb-2 mr-0 px-4 py-2 rounded text-center text-slate-100 w-full"
                        href="{{ route(app()->getLocale() . '.services', ['locale' => app()->getLocale()]) }}">{{ __('Volver') }}</a>

                    <a class="button-secondary border font-bold inline-block lg:max-w-40 lg:w-auto mb-2 mr-0 px-4 py-2 rounded text-center text-slate-100 w-full"
                    href="{{ route(app()->getLocale() . '.pricing', ['locale' => app()->getLocale(), 'service' => $services['slug']]) }}">{{ __('Solicitar cotización') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    div[data-section-id="Service"] p {
        margin-bottom: 1.5rem;
    }

    div[data-section-id="Service"] ul {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        justify-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    div[data-section-id="Service"] ul li {
        background-color: rgba(110, 152, 50, 100);
        border: 1px solid #e5e7eb;
        border-radius: 0.25rem;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); 
        color: rgba(255, 255, 110, 100);
        cursor: default;
        display: block;
        font-weight: normal;
        padding: 0.5rem 1rem;
        width: 100%;
    }

    @media (min-width: 1024px) {
        div[data-section-id="Service"] ul li {
            width: calc(50% - 1rem);
        }
    }
</style>
@endpush 