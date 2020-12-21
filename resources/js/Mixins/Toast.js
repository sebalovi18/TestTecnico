const TOAST = {
    data(){
        return {
            toastConfig: {
                error: {
                  title: "",
                  toaster: "b-toaster-top-right",
                  variant: "danger",
                  autoHideDelay: 3000,
                },
                success: {
                  title: "",
                  toaster: "b-toaster-top-right",
                  variant: "success",
                  autoHideDelay: 3000,
                },
            },
        }
    },
    methods: {
        showToast(message, title, config) {
            config.title = title;
            this.$bvToast.toast(message, config);
        }
    }
};

export default TOAST;
