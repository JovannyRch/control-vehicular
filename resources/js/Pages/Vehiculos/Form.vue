<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";
const props = defineProps({
    vehiculo: Object,
});

const vehiculo = props.vehiculo;
const isEditing = Boolean(vehiculo);

const defaultData = {
    numero_economico: "",
    tipo: "",
    modelo: "",
    placa: "",
    no_serie: "",
    no_motor: "",
    area_asignacion: "",
    resguardante: "",
    marca: "",
};

const form = useForm(vehiculo ? vehiculo : defaultData);
const submit = () => {
    if (isEditing) {
        form.put(route("vehiculos.update", vehiculo.id));
    } else {
        form.post(route("vehiculos.store"));
    }
};


</script>

<template>

    <Head title="Registrar vehículo" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo registro de vehículo</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class=" flex justify-center">
                            <form @submit.prevent="submit">

                                <div>
                                    <InputLabel for=" numero_economico" value="Número económico" />

                                    <TextInput id="numero_economico" type="text" class="mt-1 block w-full"
                                        v-model="form.numero_economico" required autofocus />

                                    <InputError class="mt-2" :message="form.errors.numero_economico" />
                                </div>

                                <div class="block mt-4">
                                    <InputLabel for="tipo" value="Tipo" />

                                    <TextInput id="tipo" type="text" class="mt-1 block w-full" v-model="form.tipo"
                                        required />

                                    <InputError class="mt-2" :message="form.errors.tipo" />
                                </div>

                                <div class="block mt-4">
                                    <InputLabel for="marca" value="Marca" />

                                    <TextInput id="marca" type="text" class="mt-1 block w-full" v-model="form.marca"
                                        required />

                                    <InputError class="mt-2" :message="form.errors.marca" />
                                </div>

                                <div class="block mt-4">
                                    <InputLabel for="modelo" value="Modelo" />

                                    <TextInput id="modelo" type="text" class="mt-1 block w-full" v-model="form.modelo"
                                        required />

                                    <InputError class="mt-2" :message="form.errors.modelo" />
                                </div>

                                <div class="block mt-4">
                                    <InputLabel for="placa" value="Placa" />

                                    <TextInput id="placa" type="text" class="mt-1 block w-full" v-model="form.placa"
                                        required />

                                    <InputError class="mt-2" :message="form.errors.placa" />
                                </div>

                                <div class="block mt-4">
                                    <InputLabel for="no_serie" value="Número de serie" />

                                    <TextInput id="no_serie" type="text" class="mt-1 block w-full"
                                        v-model="form.no_serie" required />

                                    <InputError class="mt-2" :message="form.errors.no_serie" />
                                </div>

                                <div class="block mt-4">
                                    <InputLabel for="no_motor" value="Número de motor" />

                                    <TextInput id="no_motor" type="text" class="mt-1 block w-full"
                                        v-model="form.no_motor" required />

                                    <InputError class="mt-2" :message="form.errors.no_motor" />
                                </div>

                                <div class="block mt-4">
                                    <InputLabel for="area_asignacion" value="Área de asignación" />

                                    <TextInput id="area_asignacion" type="text" class="mt-1 block w-full"
                                        v-model="form.area_asignacion" required />

                                    <InputError class="mt-2" :message="form.errors.area_asignacion" />
                                </div>

                                <div class="block mt-4">
                                    <InputLabel for="resguardante" value="Resguardante" />

                                    <TextInput id="resguardante" type="text" class="mt-1 block w-full"
                                        v-model="form.resguardante" required />

                                    <InputError class="mt-2" :message="form.errors.resguardante" />
                                </div>


                                <div class="flex items-center justify-end mt-4">

                                    <PrimaryButton type="submit" class="ms-4" :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing">
                                        {{ isEditing ? 'Actualizar' : 'Registrar' }}
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
