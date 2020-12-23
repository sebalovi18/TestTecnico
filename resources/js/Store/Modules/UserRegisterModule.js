import router from "../../Router/index";
const UserRegisterModule = {
    namespaced: true,
    state: {
        errors: {
            name: [],
            email: [],
            password: []
        }
    },
    getters: {
        getErrors(state) {
            return state.errors;
        }
    },
    actions: {
        async registerUser({ state }, user) {
            await axios(`${window.location.origin}/api/register`, {
                method: "post",
                data: {
                    name: user.name,
                    email: user.email,
                    password: user.password
                },
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json"
                }
            })
                .then(resp => {
                    if (resp.status === 201) {
                        state.errors = {
                            name: [],
                            email: [],
                            password: []
                        };
                        router.push("/");
                    }
                })
                .catch(err => {
                    if (err.response.status === 409) {
                        state.errors.email = [
                            "El correo con el que quiere registrarse ya existe"
                        ];
                    }
                    if (err.response.status === 422) {
                        state.errors = err.response.data.errors;
                    }
                });
        }
    }
};

export default UserRegisterModule;
