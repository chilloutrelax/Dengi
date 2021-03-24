export default {
    data() {
        return {
            errors: null
        };
    },
    methods: {
        errorFor(field) {
            return null !== this.errors && this.error[field]
                ? this.errors[field]
                : null;
        }
    }
};
