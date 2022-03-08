<template>
    <app-layout>
        <Head title="Produtos"/>

        <p class="font-weight-regular mb-5 text-h5">
            Novo produto
        </p>

        <v-row class="mb-2">
            <v-col cols="6" md="10">

            </v-col>

            <v-col cols="6" md="2">
                <v-btn
                    rounded="lg"
                    color="deep-purple-accent-3"
                    block
                    size="small"
                >
                    Salvar <v-icon>mdi-plus</v-icon>
                </v-btn>
            </v-col>
        </v-row>

        <v-card contained-text>
            <v-card-header-text class="px-5 py-5">
                <v-row>
                    <v-col cols="12" md="6">
                        <v-text-field
                            label="NOME"
                            color="deep-purple-accent-3"
                            clearable
                            density="comfortable"
                            v-model="product.name"
                            @input="product.name = product.name.toUpperCase()"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            label="MARCA"
                            color="deep-purple-accent-3"
                            clearable
                            density="comfortable"
                            v-model="product.brand"
                            @input="product.brand = product.brand.toUpperCase()"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-select
                            v-model="product.unit_measure"
                            :items="unit_measures"
                            item-text="label"
                            item-value="value"
                            label="UN. MEDIDA"
                            outlined
                            dense

                        ></v-select>
                    </v-col>
                </v-row>
            </v-card-header-text>

            <v-card-actions>
                <v-spacer></v-spacer>
            </v-card-actions>
        </v-card>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            AppLayout,
            Head,
            Link,
        },
        props: {
        },
        data() {
            return {
                product: {
                    name: ''
                },
                unit_measures: [{
                    label: 'cm (centimetros)',
                    value: 'cm'
                }, {
                    label: 'cm² (centimetro quadrado)',
                    value: 'cm²'
                }, {
                    label: 'cm³ (centimetro cúbico)',
                    value: 'cm³'
                }, {
                    label: 'un. (unidade)',
                    value: 'un'
                }, {
                    label: 'l (litro)',
                    value: 'l'
                } , {
                    label: 'mg (miligrama)',
                    value: 'mg'
                }],
            }
        },
        methods: {
        },
    })
</script>
