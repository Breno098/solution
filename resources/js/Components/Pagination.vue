<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1">
    <template
        v-for="(link, k) in links"
        :key="k"
    >
        <Link :href="link.url">
            <v-btn
                color="deep-purple-accent-3 mx-1"
                :disabled="link.active"
                size="small"
                :variant="link.active ? 'contained-text' : null"
                rounded="lg"
            >
                <v-icon v-if="labelOrIcon(link.label) === 'icon'">
                    {{ labelButton(link.label) }}
                </v-icon>
                <span v-else>
                     {{ labelButton(link.label) }}
                </span>
            </v-btn>
        </Link>
      </template>
    </div>
  </div>
</template>

<script>
    import { defineComponent } from 'vue';
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
        props: {
            links: Array,
        },
        methods: {
            labelOrIcon(value) {
                return value.includes('Previous') || value.includes('Next') ? 'icon' : 'label';
            },
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
    })
</script>
