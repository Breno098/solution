<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap mb-1">
    <inertia-link
        v-for="(link, index) in links"
        :key="index"
        :href="route('tenant.product.create')"
    >
            <v-btn
                color="deep-purple-accent-3 mx-1"
                :disabled="link.active"
                small
            >
                <v-icon v-if="labelOrIcon(link.label) === 'icon'">
                    {{ link.label | labelButton }}
                </v-icon>
                <span v-else>
                     {{ link.label | labelButton }}
                </span>
            </v-btn>
      </inertia-link>
    </div>
  </div>
</template>

<script>

    export default {
        props: {
            links: Array,
        },
        methods: {
             labelOrIcon(value) {
                return value.includes('Previous') || value.includes('Next') ? 'icon' : 'label';
            },
        },
        filters: {

            labelButton(value) {
                if(value.includes('Previous')) {
                    return 'mdi-arrow-left-bold';
                }

                if(value.includes('Next')) {
                    return 'mdi-arrow-right-bold';
                }

                return value;
            }
        }
    }
</script>
