import router from "../../Router/index";
const AuthModule = {
    namespaced: true,
    state: {
        errorMessageSignin: ""
    },
    getters: {
        getErrorMessagesSignIn(state) {
            return state.errorMessageSignin;
        }
    },
    actions: {
        async signIn({ state }, user) {
            await axios(`${window.location.origin}/api/login`, {
                method: "post",
                data: {
                    email: user.email,
                    password: user.password
                }
            })
                .then(resp => {
                    if (resp.status === 200) {
                        window.localStorage.setItem(
                            "access_token",
                            resp.data.access_token
                        );
                        state.errorMessageSignin = "";
                        router.push("/news");
                    }
                })
                .catch(err => {
                    if (
                        err.response.status === 401 ||
                        err.response.status === 422
                    ) {
                        state.errorMessageSignin =
                            "El email o la contraseña son invalidos";
                    }
                });
        },
        async logOut({ state }) {
            await axios(`${window.location.origin}/api/logout`, {
                method: "post",
                headers: {
                    Authorization: `Bearer ${window.localStorage.getItem(
                        "access_token"
                    )}`,
                    Accept: "application/json",
                    "Content-Type": "application/json"
                }
            })
                .then(resp => {
                    if (resp.status === 200) {
                        window.localStorage.clear();
                        router.push({ name: "home" }).catch(() => {});
                    }
                })
                .catch(resp => {});
        }
    }
};

export default AuthModule;
