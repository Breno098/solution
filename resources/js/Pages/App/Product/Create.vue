<template>
    <app-layout>
         <!-- <Head title="Produtos"/> -->

        <p class="font-weight-regular mb-5 text-h5">
            Novo produto
        </p>

         <form @submit.prevent="save">
            <v-row class="mb-2">
                <v-col cols="6" md="10">

                </v-col>

                <v-col cols="6" md="2">
                    <v-btn
                        color="primary"
                        class="rounded-lg"
                        block
                        small
                        dark
                        type="submit"
                    >
                        Salvar <v-icon class="ml-2">mdi-content-save</v-icon>
                    </v-btn>
                </v-col>
            </v-row>

            <v-card >
                <v-card-text class="px-5 py-5">
                    <v-row>
                        <v-col cols="12" md="6">
                            <v-text-field
                                label="Nome"
                                filled
                                dense
                                v-model="product.name"
                                :rules="[rules.required]"
                                :error="errors.name && !product.name"
                                @input="product.name = product.name.toUpperCase()"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-select
                                v-model="product.categories"
                                :items="categories"
                                item-text="name"
                                item-value="id"
                                label="Categorias"
                                filled
                                dense
                                multiple
                                no-data-text="Nenhuma categoria encontrada"
                            ></v-select>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-text-field
                                label="Marca"
                                filled
                                dense
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
                                label="Un. Medida"
                                filled
                                dense
                            ></v-select>
                        </v-col>

                        <v-col cols="12">
                            <v-textarea
                                label="Descrição"
                                filled
                                dense
                                v-model="product.description"
                                hint="Detalhes do produto"
                                @input="product.description = product.description.toUpperCase()"
                            ></v-textarea>
                        </v-col>

                        <v-col cols="12" md="4">
                            <v-text-field
                                type="number"
                                prefix="R$"
                                label="Valor"
                                filled
                                dense
                                v-model="product.default_value"
                                hint="Valor padrão"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="4">
                            <v-text-field
                                type="number"
                                prefix="R$"
                                label="Custo"
                                filled
                                dense
                                v-model="product.cost"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="4">
                            <v-text-field
                                type="number"
                                prefix="R$"
                                label="Lucro"
                                filled
                                dense
                                :value="(product.default_value - product.cost).toFixed(2)"
                                color="black"
                                readonly
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="2">
                            <v-text-field
                                label="Dias de Garantia"
                                type="number"
                                filled
                                dense
                                v-model="product.warranty_days"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="10">
                            <v-textarea
                                label="Condição de Garantia"
                                filled
                                dense
                                v-model="product.warranty_conditions"
                                hint="Termos de garantia do produto"
                                @input="product.warranty_conditions = product.warranty_conditions.toUpperCase()"
                            ></v-textarea>
                        </v-col>
                    </v-row>
                </v-card-text>

                <!-- <v-card-actions>
                    <v-spacer></v-spacer>
                </v-card-actions> -->
            </v-card>
         </form>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default {
        components: {
            AppLayout,
        },
        props: {
            categories: Array,
        },
        data() {
            return {
                errors: {
                    name: false,
                },
                product: {
                    description: null,
                    name: null,
                    brand: null,
                    cost: null,
                    default_value: null,
                    type: null,
                    unit_measure: null,
                    warranty_conditions: null,
                    warranty_days: null,
                    bar_code: null,
                    categories: [],
                },
                rules: {
                    required: value => !!value || 'Campo obrigatório.',
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
                }]
            }
        },
        methods: {
            save() {
                this.$inertia.post(route('tenant.product.store'), this.product)
            },
        },
    };
</script>
