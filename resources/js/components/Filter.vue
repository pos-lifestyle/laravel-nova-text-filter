<template>
    <div>
        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">{{ filter.name }}</h3>

        <div class="p-2">
            <input
                type="text"
                class="w-full form-control form-control-sm form-input form-input-bordered"
                dusk="text-filter-input"
                :value="value"
                @input="handleChange"
            >
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            resourceName: {
                type: String,
                required: true,
            },
            filterKey: {
                type: String,
                required: true,
            },
        },

        methods: {
            handleChange: _.debounce(function (event) {
                this.$store.commit(`${this.resourceName}/updateFilterState`, {
                    filterClass: this.filterKey,
                    value: event.target.value,
                });

                this.$emit('change');
            }, 400),
        },

        computed: {
            filter: function () {
                return this.$store.getters[`${this.resourceName}/getFilter`](this.filterKey);
            },

            value: function () {
                return this.filter.currentValue;
            },
        },
    };
</script>
