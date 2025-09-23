@extends('layouts.app')

@section('title', 'Propriétés disponibles')

@section('content')
    <!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-blue-900 via-purple-800 to-indigo-900 text-white py-24 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white to-transparent transform -skew-y-6">
            </div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-white bg-opacity-10 rounded-full animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-16 h-16 bg-white bg-opacity-5 rounded-full animate-bounce"></div>
        <div class="absolute top-1/2 left-1/4 w-8 h-8 bg-white bg-opacity-20 rounded-full animate-ping"></div>

        <div class="container mx-auto text-center px-4 relative z-10">
            <div class="max-w-4xl mx-auto">
                <h1
                    class="text-5xl md:text-7xl font-black mb-6 bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100 leading-tight">
                    Trouvez votre havre de paix
                </h1>
                <p class="text-xl md:text-2xl mb-10 text-blue-100 font-light leading-relaxed">
                    Réservez des propriétés uniques, partout dans le monde, pour des expériences inoubliables
                </p>



                <!-- Stats -->
                <div class="flex justify-center gap-8 text-center">
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl px-6 py-4">
                        <div class="text-2xl font-bold">1000+</div>
                        <div class="text-blue-100 text-sm">Propriétés</div>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl px-6 py-4">
                        <div class="text-2xl font-bold">50+</div>
                        <div class="text-blue-100 text-sm">Pays</div>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl px-6 py-4">
                        <div class="text-2xl font-bold">4.9★</div>
                        <div class="text-blue-100 text-sm">Note moyenne</div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- PROPERTIES GRID -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2
                    class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Nos Propriétés Populaires
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Découvrez une sélection exclusive de propriétés soigneusement choisies pour vous offrir des expériences
                    exceptionnelles
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($properties as $property)
                    <div
                        class="group bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 hover:rotate-1 border border-gray-50">



                        <div class="p-6">
                            <div class="flex items-start justify-between mb-3">
                                <h3
                                    class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors line-clamp-1">
                                    {{ $property->name }}
                                </h3>

                            </div>

                            <p class="text-gray-600 mb-4 line-clamp-2 text-sm leading-relaxed">
                                {{ Str::limit($property->description, 80) }}
                            </p>




                            <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                                <div>
                                    <div class="flex items-baseline gap-1">
                                        <span class="text-2xl font-black text-gray-800">
                                            {{ number_format($property->price_per_night, 0, ',', ' ') }}
                                        </span>
                                        <span class="text-gray-500 text-sm">€</span>
                                        <span class="text-gray-400 text-xs">/nuit</span>
                                    </div>
                                    <div class="text-xs text-gray-500 mt-1">
                                        Taxes incluses
                                    </div>
                                </div>
                                <a href="{{ route('property.booking', $property) }}"
                                    class="bg-primary text-white px-6 py-3 rounded-2xl font-semibold  transition-all transform  shadow-lg hover:shadow-xl relative overflow-hidden group/button">
                                    <span class="relative z-10">Réserver</span>

                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </section>



@endsection
