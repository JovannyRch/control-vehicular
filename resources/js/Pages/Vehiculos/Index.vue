<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';


defineProps({ vehiculos: Array });


const form = useForm({});

const deleteVehiculo = (id) => {
    if (confirm("¿Estás seguro de eliminar este vehículo?")) {
        form.delete(route("vehiculos.destroy", id));
    }
};


</script>




<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Vehículos</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <div class="flex items-center justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Lista de vehículos</h2>

                            <div class="mt-4 flex items-center gap-2">
                                <a :href="route('vehiculos.create')"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-700 hover:bg-green-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                    Agregar vehículo
                                </a>
                                <!-- Download pdf -->
                                <a :href="route('vehiculos.pdf')"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-700 hover:bg-blue-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                    Descargar PDF
                                </a>
                            </div>
                        </div>




                        <div v-if="vehiculos.length === 0" class="mt-4">
                            <p class="text-sm text-gray-600">No hay vehículos registrados.</p>
                        </div>
                        <div v-else>
                            <table class="min-w-full mt-4">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Número económico
                                        </th>
                                        <th
                                            class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Tipo
                                        </th>
                                        <th
                                            class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Modelo
                                        </th>
                                        <th
                                            class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Placa
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="vehiculo in vehiculos" :key="vehiculo.id">
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">{{ vehiculo.numero_economico }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">{{ vehiculo.placa }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">{{ vehiculo.tipo }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">{{ vehiculo.modelo }}</div>
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            <div class="flex items-center gap-4">
                                                <a :href="route('vehiculos.edit', vehiculo.id)"
                                                    class="text-indigo-600 hover:text-indigo-900">Editar</a>

                                                <button type="submit" @click="deleteVehiculo(vehiculo.id)"
                                                    class="text-red-600 hover:text-red-900">Eliminar</button>
                                            </div>


                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
